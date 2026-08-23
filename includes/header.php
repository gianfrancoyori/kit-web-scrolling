<?php
declare(strict_types=1);

/**
 * Header compartido. Antes de incluirlo, definir:
 *   $page_title       string  Título de la página (max ~60 chars)
 *   $page_description string  Meta description (max ~155 chars)
 *   $page_slug        string  '' (portada) | 'bordados' | 'estampados' | 'ropa-corporativa' | 'nosotros' | 'contacto' | '404'
 *   $page_css         string  Hoja extra de css/ (ej. 'home.css')            [opcional]
 *   $page_js          string  Script extra de js/ (lo carga footer.php)      [opcional]
 *   $page_jsonld      array   Schemas JSON-LD adicionales                    [opcional]
 *   $preload_hero     string  Imagen a precargar (LCP)                       [opcional]
 *
 * La página abre y cierra su propio <main id="contenido">.
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

header('Content-Type: text/html; charset=UTF-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Cache-Control: no-cache');

$page_css     = $page_css     ?? '';
$page_jsonld  = $page_jsonld  ?? [];
$page_slug    = $page_slug    ?? '';
$preload_hero = $preload_hero ?? '';
$canonical    = SITE_URL . '/' . $page_slug;

/* Ítems del menú principal: slug => etiqueta ('' = portada) */
$nav_items = [
    ''                 => 'Inicio',
    'bordados'         => 'Bordados',
    'estampados'       => 'Estampados',
    'ropa-corporativa' => 'Ropa Corporativa',
    'nosotros'         => 'Nosotros',
    'contacto'         => 'Contacto',
];

/* Líneas del catálogo (subdropdown de Ropa Corporativa) */
$lineas_catalogo = [
    'classic'     => 'Classic',
    'poleras'     => 'Poleras',
    'polo'        => 'Polo',
    'executive'   => 'Executive',
    'advance'     => 'Advance',
    'practical'   => 'Practical',
    'free-action' => 'Free Action',
    'hi-vis'      => 'Hi-Vis',
    'iron'        => 'Iron',
    'outwork'     => 'Outwork',
    'technic'     => 'Technic',
];
?>
<!DOCTYPE html>
<html lang="es-CL">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= sanitizar($page_title) ?></title>
  <meta name="description" content="<?= sanitizar($page_description) ?>">
  <link rel="canonical" href="<?= sanitizar($canonical) ?>">
  <meta name="theme-color" content="#052B42">

  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= sanitizar(SITE_NAME) ?>">
  <meta property="og:locale" content="es_CL">
  <meta property="og:title" content="<?= sanitizar($page_title) ?>">
  <meta property="og:description" content="<?= sanitizar($page_description) ?>">
  <meta property="og:url" content="<?= sanitizar($canonical) ?>">
  <meta property="og:image" content="<?= SITE_URL ?>/og-image.jpg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
<?php if ($preload_hero !== ''): ?>
  <link rel="preload" as="image" href="<?= sanitizar($preload_hero) ?>" fetchpriority="high">
<?php endif; ?>

  <script>document.documentElement.classList.add('js');</script>

  <!-- Google tag: GA4 + Ads en una sola carga.
       Los eventos se encolan en dataLayer desde ya; el script (≈340 KB) se
       descarga tras la carga o al primer gesto, para no competir con el LCP. -->
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= GA4_ID ?>');
    gtag('config', '<?= ADS_ID ?>');
    window.ADS_CONVERSION_LABEL = '<?= ADS_CONVERSION_LABEL ?>';
    (function () {
      var pedido = false;
      function cargarTag() {
        if (pedido) return;
        pedido = true;
        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=<?= GA4_ID ?>';
        document.head.appendChild(s);
      }
      if (document.readyState === 'complete') setTimeout(cargarTag, 1200);
      else window.addEventListener('load', function () { setTimeout(cargarTag, 1200); });
      ['pointerdown', 'keydown', 'touchstart'].forEach(function (ev) {
        window.addEventListener(ev, cargarTag, { once: true, passive: true });
      });
    })();
  </script>

  <link rel="preload" href="/assets/fonts/inter-latin-variable.woff2" as="font" type="font/woff2" crossorigin>
  <?php /* El CSS va embebido: el hosting tiene ~300 ms de TTFB, así que cada
           hoja aparte costaba un viaje de ida y vuelta antes del primer pintado.
           El origen sigue siendo css/, que es lo que se edita. */ ?>
  <style><?= file_get_contents(__DIR__ . '/../css/styles.css') ?><?php
    if ($page_css !== '') echo file_get_contents(__DIR__ . '/../css/' . $page_css);
  ?></style>

  <?= jsonld(jsonld_negocio()) . "\n" ?>
<?php foreach ($page_jsonld as $schema): ?>
  <?= jsonld($schema) . "\n" ?>
<?php endforeach; ?>
</head>
<body>

<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
  <symbol id="ico-wa" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></symbol>
  <symbol id="ico-flecha" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></symbol>
</svg>

<a class="skip-link" href="#contenido">Saltar al contenido</a>

<div id="progress" aria-hidden="true"></div>

<a href="<?= sanitizar(url_whatsapp('Hola, me gustaría cotizar')) ?>" target="_blank" rel="noopener" class="wa-float" aria-label="Escríbenos por WhatsApp (abre en ventana nueva)" data-conversion="whatsapp">
  <?= icono('ico-wa', 26) ?>
</a>

<nav class="navbar" id="navbar" aria-label="Principal">
  <a href="/" class="navbar-logo" aria-label="<?= sanitizar(SITE_NAME) ?> — Inicio">
    <img class="logo-oscuro" src="/assets/img/logo-rapidtransfer.webp" alt="<?= sanitizar(SITE_NAME) ?>" width="640" height="160" fetchpriority="high">
    <img class="logo-claro" src="/assets/img/logo-rapidtransfer-blanco.webp" alt="" aria-hidden="true" width="640" height="160" fetchpriority="high">
  </a>

  <ul class="navbar-menu" id="navMenu">
<?php foreach ($nav_items as $slug => $etiqueta): ?>
<?php if ($slug === 'ropa-corporativa'): ?>
    <li class="has-drop<?= $page_slug === $slug ? ' active' : '' ?>">
      <a href="/ropa-corporativa"<?= $page_slug === $slug ? ' aria-current="page"' : '' ?>>Ropa Corporativa</a>
      <button class="drop-toggle" type="button" aria-expanded="false" aria-controls="dropLineas" aria-label="Abrir líneas de ropa corporativa"></button>
      <ul class="dropdown" id="dropLineas">
<?php foreach ($lineas_catalogo as $ancla => $nombre): ?>
        <li><a href="/ropa-corporativa#<?= $ancla ?>"><?= sanitizar($nombre) ?></a></li>
<?php endforeach; ?>
      </ul>
    </li>
<?php else: ?>
    <li<?= $page_slug === $slug ? ' class="active"' : '' ?>>
      <a href="/<?= $slug ?>"<?= $page_slug === $slug ? ' aria-current="page"' : '' ?>><?= sanitizar($etiqueta) ?></a>
    </li>
<?php endif; ?>
<?php endforeach; ?>
  </ul>

  <div class="navbar-right">
    <a href="/contacto" class="nav-cta-btn">Cotizar ahora</a>
    <button class="hamburger" id="hamburger" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="navMenu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>
