<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/catalogo.php';

$lineas = catalogo_lineas();

$page_slug        = 'ropa-corporativa';
$page_title       = 'Catálogo de Ropa Corporativa en La Serena | Rapid Transfer';
$page_description = 'Catálogo de ropa corporativa en La Serena: camisas, poleras, polar, softshell, parkas, jeans y líneas de seguridad. Con bordado o estampado de tu marca.';
$page_css         = 'catalogo.css';
$page_jsonld      = [jsonld_breadcrumb(['Inicio' => '', 'Ropa Corporativa' => 'ropa-corporativa'])];

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Catálogo completo</div>
    <h1>Ropa <em>Corporativa</em></h1>
    <p>Amplio catálogo de prendas de calidad para vestir a tu equipo. Elige la línea, cotiza con nosotros y aplicamos bordado o estampado con tu marca.</p>
  </div>
</div>

<nav class="breadcrumb" aria-label="Ruta de navegación">
  <ol class="breadcrumb-inner">
    <li><a href="/">Inicio</a> <span aria-hidden="true">›</span></li>
    <li aria-current="page">Ropa Corporativa</li>
  </ol>
</nav>

<nav class="line-nav" aria-label="Líneas del catálogo">
  <div class="line-nav-inner">
    <?php foreach ($lineas as $ancla => $linea): ?>
    <a href="#<?= sanitizar($ancla) ?>" class="line-tab"><?= sanitizar($linea['tab']) ?></a>
    <?php endforeach; ?>
  </div>
</nav>

<main class="catalogue-main" id="contenido">
  <div class="catalogue-inner">

    <?php foreach ($lineas as $ancla => $linea): ?>
    <section class="line-section" id="<?= sanitizar($ancla) ?>">
      <div class="line-header">
        <div>
          <div class="line-badge"><?= sanitizar($linea['badge']) ?></div>
          <h2 class="line-name"><?= sanitizar($linea['titulo']) ?> <em><?= sanitizar($linea['destacado']) ?></em></h2>
          <p class="line-desc"><?= sanitizar($linea['descripcion']) ?></p>
        </div>
        <div class="line-count"><?= count($linea['productos']) ?> productos</div>
      </div>
      <div class="prod-grid">
        <?php foreach ($linea['productos'] as $producto): ?>
        <article class="prod-card">
          <div class="prod-img" data-ocultar-si-falla>
            <img src="<?= sanitizar($producto['imagen']) ?>" alt="<?= sanitizar($producto['alt']) ?>"
                 width="400" height="400" loading="lazy" decoding="async">
          </div>
          <div class="prod-body">
            <div class="prod-sku">SKU <?= sanitizar($producto['sku']) ?></div>
            <h3 class="prod-name"><?= sanitizar($producto['nombre']) ?></h3>
            <p class="prod-spec"><?= sanitizar($producto['especificacion']) ?></p>
            <?php if (!empty($producto['colores'])): ?>
            <div class="prod-colors">
              <?php foreach ($producto['colores'] as $hex => $color): ?>
              <span class="color-dot" style="background:<?= sanitizar((string) $hex) ?>" title="<?= sanitizar($color) ?>"
                    role="img" aria-label="Color <?= sanitizar($color) ?>"></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <a href="/contacto" class="prod-cta"><?= sanitizar($producto['cta']) ?></a>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endforeach; ?>

  </div>
</main>

<section class="cta-strip">
  <div class="cta-inner">
    <h2 class="cta-title">¿No encuentras lo que <em>buscas</em>?</h2>
    <p class="cta-sub">Trabajamos con más líneas y modelos. Cuéntanos qué necesitas y te enviamos opciones con precio el mismo día.</p>
    <div class="cta-btns">
      <a href="<?= sanitizar(url_whatsapp('Hola, me gustaría cotizar ropa corporativa')) ?>" target="_blank" rel="noopener"
         class="btn-wa" data-conversion="whatsapp">
        <?= icono('ico-wa', 18) ?> Cotizar por WhatsApp
      </a>
      <a href="/contacto" class="btn-accent">Cotizar ahora <?= icono('ico-flecha', 15) ?></a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
