<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

http_response_code(404);

$page_slug        = '404';
$page_title       = 'Página no encontrada | Rapid Transfer';
$page_description = 'La página que buscas no existe. Explora nuestros servicios de bordado, estampado y ropa corporativa en La Serena.';

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Error 404</div>
    <h1>Esta página <em>no existe</em></h1>
    <p>Puede que el enlace esté roto o que la página haya cambiado de dirección.</p>
  </div>
</div>

<main id="contenido" class="cta-strip">
  <div class="cta-inner">
    <h2 class="cta-title">¿Qué estabas <em>buscando</em>?</h2>
    <p class="cta-sub">Estos son los destinos más visitados del sitio.</p>
    <div class="cta-btns">
      <a href="/" class="btn-accent">Ir al inicio</a>
      <a href="/ropa-corporativa" class="btn-outline-white">Ver catálogo</a>
      <a href="/contacto" class="btn-outline-white">Cotizar</a>
    </div>
  </div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
