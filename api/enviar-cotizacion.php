<?php
declare(strict_types=1);

/**
 * Recibe el formulario de cotización (JSON) y lo reenvía a Web3Forms (correo)
 * y al CRM. Las credenciales viven en config.php; el navegador nunca las ve.
 * Respuesta: { ok: bool, error?: string, errores?: {campo: mensaje} }
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

header('Content-Type: application/json; charset=UTF-8');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store');

function responder(int $codigo, array $datos): void {
    http_response_code($codigo);
    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    responder(405, ['ok' => false, 'error' => 'Método no permitido.']);
}

$entrada = json_decode(file_get_contents('php://input'), true);
if (!is_array($entrada)) {
    $entrada = $_POST; // fallback si el form se envía sin JavaScript
}

$campo = function (string $clave) use ($entrada): string {
    return trim((string) ($entrada[$clave] ?? ''));
};

// Honeypot: los bots lo rellenan; respondemos éxito sin hacer nada.
if ($campo('botcheck') !== '') {
    responder(200, ['ok' => true]);
}

if (!validar_csrf($campo('csrf'))) {
    responder(419, ['ok' => false, 'error' => 'La sesión expiró. Recarga la página e inténtalo de nuevo.']);
}

$nombre   = $campo('nombre');
$empresa  = $campo('empresa');
$email    = $campo('email');
$telefono = $campo('telefono');
$servicio = $campo('servicio');
$cantidad = $campo('cantidad');
$plazo    = $campo('plazo');
$mensaje  = $campo('mensaje');
$privacy  = filter_var($entrada['privacy'] ?? false, FILTER_VALIDATE_BOOLEAN);

$servicios_validos = [
    'Bordado sobre mis prendas',
    'Bordado + prendas del catálogo',
    'Estampado DTF',
    'Estampado Vinilo Textil',
    'Sublimación',
    'Ropa corporativa con personalización',
    'Otro / No sé todavía',
];

$errores = [];
if (mb_strlen($nombre) < 2 || mb_strlen($nombre) > 80) {
    $errores['nombre'] = 'Indícanos tu nombre.';
}
$solo_digitos = preg_replace('/\D/', '', $telefono);
if (strlen($solo_digitos) < 8 || strlen($solo_digitos) > 15) {
    $errores['telefono'] = 'Escribe un teléfono válido (ej: +56 9 1234 5678).';
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Ese correo no parece válido.';
}
if (!in_array($servicio, $servicios_validos, true)) {
    $errores['servicio'] = 'Selecciona el servicio que necesitas.';
}
if ($cantidad !== '' && (!ctype_digit($cantidad) || (int) $cantidad < 1)) {
    $errores['cantidad'] = 'La cantidad debe ser un número mayor a 0.';
}
if (mb_strlen($mensaje) > 3000) {
    $errores['mensaje'] = 'El mensaje es demasiado largo (máx. 3000 caracteres).';
}
if (!$privacy) {
    $errores['privacy'] = 'Necesitamos tu autorización para contactarte.';
}

if ($errores) {
    responder(422, ['ok' => false, 'errores' => $errores]);
}

/* ── Envío a Web3Forms (correo) ── */
$web3_ok = false;
if (WEB3FORMS_KEY !== '') {
    $r = http_post_json('https://api.web3forms.com/submit', [
        'access_key' => WEB3FORMS_KEY,
        'subject'    => "Nueva cotización de {$nombre} — {$servicio}",
        'from_name'  => $nombre,
        'nombre'     => $nombre,
        'empresa'    => $empresa,
        'email'      => $email !== '' ? $email : 'no-indicado',
        'telefono'   => $telefono,
        'servicio'   => $servicio,
        'cantidad'   => $cantidad,
        'plazo'      => $plazo,
        'mensaje'    => $mensaje,
    ]);
    $json = json_decode($r['body'], true);
    // Web3Forms puede responder 200 con success:false (cuota agotada, spam…)
    $web3_ok = $r['status'] === 200 && is_array($json) && ($json['success'] ?? false) === true;
    if (!$web3_ok) {
        error_log("[cotizacion] Web3Forms falló (HTTP {$r['status']}): " . substr($r['body'], 0, 300));
    }
}

/* ── Envío al CRM ── */
$crm_ok = false;
if (CRM_WEBHOOK_URL !== '') {
    $headers = CRM_WEBHOOK_TOKEN !== '' ? ['X-Webhook-Token: ' . CRM_WEBHOOK_TOKEN] : [];
    $detalle = array_filter([
        "Servicio: {$servicio}",
        $cantidad !== '' ? "Cantidad: {$cantidad}" : '',
        $plazo !== '' ? "Plazo: {$plazo}" : '',
        $mensaje !== '' ? "Mensaje: {$mensaje}" : '',
    ]);
    $r = http_post_json(CRM_WEBHOOK_URL, [
        'name'    => $nombre,
        'email'   => $email,
        'phone'   => $telefono,
        'company' => $empresa,
        'source'  => 'web',
        'message' => implode("\n", $detalle),
    ], $headers);
    $crm_ok = $r['status'] >= 200 && $r['status'] < 300;
    if (!$crm_ok) {
        error_log("[cotizacion] CRM falló (HTTP {$r['status']}): " . substr($r['body'], 0, 300));
    }
}

if ($web3_ok || $crm_ok) {
    if (!$web3_ok || !$crm_ok) {
        error_log('[cotizacion] Envío parcial: web3=' . var_export($web3_ok, true) . ' crm=' . var_export($crm_ok, true));
    }
    responder(200, ['ok' => true]);
}

responder(502, [
    'ok'    => false,
    'error' => 'No pudimos registrar tu solicitud. Inténtalo de nuevo o escríbenos por WhatsApp al ' . BUSINESS_PHONE_HUMAN . '.',
]);
