<?php
declare(strict_types=1);

/**
 * Sanitiza un string para output HTML seguro.
 */
function sanitizar(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

/**
 * URL de WhatsApp del negocio, con mensaje opcional prellenado.
 */
function url_whatsapp(string $texto = ''): string {
    $base = 'https://wa.me/' . preg_replace('/\D/', '', BUSINESS_PHONE);
    return $texto === '' ? $base : $base . '?text=' . rawurlencode($texto);
}

/**
 * Genera (una vez por sesión) y devuelve el token CSRF.
 */
function generar_csrf(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valida que el token CSRF enviado coincida con el de la sesión.
 */
function validar_csrf(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * POST JSON a una URL externa vía cURL. Devuelve
 * ['status' => int, 'body' => string]; status 0 = error de conexión.
 */
function http_post_json(string $url, array $datos, array $headers = [], int $timeout = 8): array {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($datos),
        CURLOPT_HTTPHEADER     => array_merge(['Content-Type: application/json', 'Accept: application/json'], $headers),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => $timeout,
        CURLOPT_CONNECTTIMEOUT => 5,
    ]);
    $body   = curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    if ($body === false) {
        $body = curl_error($ch);
        $status = 0;
    }
    curl_close($ch);
    return ['status' => $status, 'body' => (string) $body];
}

/**
 * Imprime un <img> con dimensiones y lazy-loading por defecto.
 * $attrs admite overrides: ['loading' => 'eager', 'fetchpriority' => 'high', 'class' => '…'].
 */
function imagen(string $ruta, string $alt, int $ancho, int $alto, array $attrs = []): void {
    $attrs = array_merge(['loading' => 'lazy', 'decoding' => 'async'], $attrs);
    if (($attrs['loading'] ?? '') === 'eager') {
        unset($attrs['loading']);
    }
    $extra = '';
    foreach ($attrs as $k => $v) {
        $extra .= ' ' . $k . '="' . sanitizar((string) $v) . '"';
    }
    echo '<img src="' . sanitizar($ruta) . '" alt="' . sanitizar($alt) . '" width="' . $ancho . '" height="' . $alto . '"' . $extra . '>';
}

/**
 * Icono del sprite SVG compartido (símbolos definidos en header.php).
 */
function icono(string $id, int $px = 16, string $clase = ''): string {
    $c = $clase !== '' ? ' class="' . sanitizar($clase) . '"' : '';
    return '<svg width="' . $px . '" height="' . $px . '" aria-hidden="true" focusable="false"' . $c . '><use href="#' . sanitizar($id) . '"></use></svg>';
}

/**
 * Logos del carrusel de clientes: [archivo en assets/img/clientes/, nombre, ancho, alto].
 */
function logos_clientes(): array {
    return [
        ['ucn.webp',            'Universidad Católica del Norte', 96, 96],
        ['uls.webp',            'Universidad de La Serena',      242, 96],
        ['inacap.webp',         'INACAP',                         96, 96],
        ['dominga.webp',        'Dominga',                        96, 96],
        ['ecomac.webp',         'Ecomac',                         96, 96],
        ['fg-inmobiliaria.webp','FG Inmobiliaria',               349, 96],
        ['valentini.webp',      'Valentini Seminuevos',          455, 96],
        ['musalem.webp',        'Comercial Musalem',              96, 96],
        ['pocuro.webp',         'Pocuro',                        378, 96],
        ['py.svg',              'PY',                             96, 96],
        ['ovco.webp',           'Ovco Inmobiliaria',              96, 96],
    ];
}

/**
 * Bloque JSON-LD listo para imprimir en el <head>.
 */
function jsonld(array $datos): string {
    return '<script type="application/ld+json">'
        . json_encode($datos, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        . '</script>';
}

/**
 * Schema LocalBusiness de Rapid Transfer (se imprime en todas las páginas).
 */
function jsonld_negocio(): array {
    return [
        '@context'  => 'https://schema.org',
        '@type'     => 'LocalBusiness',
        '@id'       => SITE_URL . '/#negocio',
        'name'      => SITE_NAME,
        'url'       => SITE_URL,
        'image'     => SITE_URL . '/og-image.jpg',
        'logo'      => SITE_URL . '/assets/img/logo-rapidtransfer-cuadrado.webp',
        'telephone' => BUSINESS_PHONE,
        'email'     => BUSINESS_EMAIL,
        'priceRange' => '$$',
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Av. Balmaceda 1644',
            'addressLocality' => 'La Serena',
            'addressRegion'   => 'Región de Coquimbo',
            'addressCountry'  => 'CL',
        ],
        'geo' => ['@type' => 'GeoCoordinates', 'latitude' => -29.9047, 'longitude' => -71.2494],
        'openingHoursSpecification' => [[
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens'     => '10:00',
            'closes'    => '16:00',
        ]],
        'sameAs' => [
            'https://www.instagram.com/rapidtransfer.cl',
            'https://www.linkedin.com/company/RapidTransfer',
        ],
    ];
}

/**
 * Schema BreadcrumbList. Recibe ['Nombre' => 'slug', …]; slug '' = portada.
 */
function jsonld_breadcrumb(array $items): array {
    $lista = [];
    $pos = 1;
    foreach ($items as $nombre => $slug) {
        $lista[] = [
            '@type'    => 'ListItem',
            'position' => $pos++,
            'name'     => $nombre,
            'item'     => SITE_URL . '/' . ltrim((string) $slug, '/'),
        ];
    }
    return ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $lista];
}

/**
 * Schema FAQPage. Recibe ['¿Pregunta?' => 'Respuesta.', …].
 */
function jsonld_faq(array $items): array {
    $preguntas = [];
    foreach ($items as $pregunta => $respuesta) {
        $preguntas[] = [
            '@type'          => 'Question',
            'name'           => $pregunta,
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $respuesta],
        ];
    }
    return ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $preguntas];
}
