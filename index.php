<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_slug        = '';
$page_title       = 'Bordados, Estampados y Ropa Corporativa en La Serena | Rapid Transfer';
$page_description = 'Bordados, estampados y ropa corporativa en La Serena. Más de 20 años vistiendo empresas de la Región de Coquimbo. Cotiza el mismo día.';
$page_css         = 'home.css';
$page_js          = 'home.js';
$preload_hero     = '/assets/img/hero-proceso-transferencia-768.webp';

require __DIR__ . '/includes/header.php';
?>

<main id="contenido">

  <section class="hero">
    <div class="hero-bg">
      <div class="hero-slide active">
        <picture>
          <source media="(max-width:768px)" srcset="/assets/img/hero-proceso-transferencia-768.webp">
          <img src="/assets/img/hero-proceso-transferencia.webp" alt="" width="1536" height="1024" fetchpriority="high" decoding="async">
        </picture>
      </div>
      <?php /* La 2ª diapositiva se descarga tras la carga (home.js): no compite con el LCP. */ ?>
      <div class="hero-slide" data-slide-diferida
           data-src="/assets/img/hero-bordado.webp"
           data-src-movil="/assets/img/hero-bordado-768.webp">
        <picture>
          <source media="(max-width:768px)">
          <img alt="" width="1024" height="1024" loading="lazy" decoding="async">
        </picture>
      </div>
    </div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <div class="hero-eyebrow hero-anim">La Serena · 20+ años de experiencia</div>
      <h1 class="hero-title hero-anim">Potenciamos la imagen<br>de tu <span class="hi">empresa</span></h1>
      <p class="hero-desc hero-anim"><strong>Ropa Corporativa</strong>, Bordados y Estampados</p>
      <div class="hero-btns hero-anim">
        <a href="<?= sanitizar(url_whatsapp('Hola, me gustaría cotizar ropa corporativa')) ?>" target="_blank" rel="noopener"
           class="btn-wa" data-conversion="whatsapp">
          <?= icono('ico-wa', 18) ?> Cotiza tu bordado
        </a>
        <a href="/contacto" class="btn-outline-white">Cotizar ahora <?= icono('ico-flecha', 15) ?></a>
      </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
      <div class="hero-scroll-line"></div>
      <span>scroll</span>
    </div>
  </section>

  <section class="stats" aria-label="Cifras de la empresa">
    <div class="stats-inner">
      <div class="stat">
        <div class="stat-num"><span data-contador="20">20</span><sup>+</sup></div>
        <div class="stat-lbl">Años de experiencia</div>
      </div>
      <div class="stat">
        <div class="stat-num"><span data-contador="500">500</span><sup>+</sup></div>
        <div class="stat-lbl">Clientes satisfechos</div>
      </div>
      <div class="stat">
        <div class="stat-num"><span data-contador="3">3</span></div>
        <div class="stat-lbl">Técnicas de personalización</div>
      </div>
    </div>
  </section>

  <section class="services">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Nuestros Servicios</div>
        <h2 class="sec-title">Servicios de <em>personalización textil</em></h2>
        <p class="sec-sub">Desde un polo bordado hasta la uniformidad completa de tu equipo. Atendemos a empresas de la Tercera y Cuarta Región.</p>
      </div>

      <div class="svc-grid">
        <?php
        $servicios = [
            ['bordados', 'svc-bordados.webp', 640, 640, 'Servicio', 'Bordados',
             'Bordados personalizados para empresas, uniformes, parches y proyectos a medida. Precisión y durabilidad garantizadas.',
             'Bordado corporativo con carretes de hilo', 'Ver servicio'],
            ['estampados', 'svc-estampados.webp', 640, 427, 'Servicio', 'Estampados',
             'Soluciones en DTF, vinilo textil y sublimación. Colores vivos y resistentes al lavado para toda clase de prendas.',
             'Proceso de transferencia DTF sobre tela', 'Ver servicio'],
            ['ropa-corporativa', 'svc-ropa-corporativa.webp', 640, 427, 'Catálogo', 'Ropa Corporativa',
             'Amplio catálogo de prendas corporativas: poleras, camisas, chaquetas, softshells, parkas y más. Con bordado o estampado incluido.',
             'Prendas de ropa corporativa personalizadas', 'Ver catálogo'],
        ];
        foreach ($servicios as $i => [$slug, $img, $w, $h, $chip, $titulo, $desc, $alt, $cta]): ?>
        <a href="/<?= $slug ?>" class="svc-card reveal" data-delay="<?= $i * 120 ?>">
          <div class="svc-img">
            <?= imagen('/assets/img/' . $img, $alt, $w, $h) ?>
          </div>
          <div class="svc-body">
            <div class="svc-tag-chip"><?= $chip ?></div>
            <h3 class="svc-title"><?= $titulo ?></h3>
            <p class="svc-desc"><?= $desc ?></p>
            <span class="svc-link"><?= $cta ?> <?= icono('ico-flecha', 14) ?></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="catalogue">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Catálogo</div>
        <h2 class="sec-title">¿Qué productos <em>personalizamos?</em></h2>
      </div>
      <div class="cat-grid">
        <?php
        $categorias = [
            ['/ropa-corporativa#poleras',    '👕', 'Poleras & Camisas'],
            ['/ropa-corporativa#executive',  '🧥', 'Chaquetas Executive'],
            ['/ropa-corporativa#advance',    '🌬️', 'Cortavientos Advance'],
            ['/ropa-corporativa#practical',  '🎽', 'Línea Practical'],
            ['/ropa-corporativa#free-action','👖', 'Jeans Free Action'],
            ['/ropa-corporativa#hi-vis',     '🦺', 'Alta Visibilidad'],
            ['/ropa-corporativa#iron',       '🔩', 'Línea Iron'],
            ['/ropa-corporativa#outwork',    '🏔️', 'Outwork Outdoor'],
            ['/ropa-corporativa#technic',    '🔥', 'Technic Ignífugo'],
            ['/bordados',                    '🧢', 'Gorros Bordados'],
            ['/estampados',                  '🎒', 'Mochilas & Bolsas'],
            ['/contacto',                    '✨', 'Y mucho más...'],
        ];
        foreach ($categorias as $i => [$href, $emoji, $nombre]): ?>
        <a href="<?= $href ?>" class="cat-item reveal" data-delay="<?= $i * 40 ?>">
          <div class="cat-icon" aria-hidden="true"><?= $emoji ?></div>
          <div class="cat-name"><?= $nombre ?></div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="why">
    <div class="why-grid">
      <div>
        <div class="sec-tag">¿Por qué elegirnos?</div>
        <h2 class="sec-title">Experiencia comprobada en<br><em>bordados corporativos</em></h2>
        <p class="sec-sub">Con más de 20 años en el rubro, entendemos que la imagen de tu equipo es la imagen de tu negocio.</p>
        <div class="why-feats">
          <?php
          $ventajas = [
              ['👤', 'Atención Personalizada', 'Acompañamos cada proyecto de principio a fin con un asesor dedicado.'],
              ['⚡', 'Cotizaciones Ágiles',    'Cotizaciones ágiles y sin demoras. Cumplimos los plazos acordados.'],
              ['🏆', 'Experiencia Comprobada', 'Más de 20 años en bordados y estampados corporativos en La Serena.'],
              ['✅', 'Calidad Garantizada',    'Resultados profesionales y duraderos en cada prenda que entregamos.'],
          ];
          foreach ($ventajas as $i => [$emoji, $titulo, $desc]): ?>
          <div class="feat reveal-left" data-delay="<?= $i * 90 ?>">
            <div class="feat-ico" aria-hidden="true"><?= $emoji ?></div>
            <div class="feat-t"><?= $titulo ?></div>
            <div class="feat-d"><?= $desc ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="why-card reveal-right">
        <div class="why-big"><span data-contador="20">20</span><sup>+</sup></div>
        <p class="why-lead">Años vistiendo empresas en La Serena y la región de Coquimbo</p>
        <div class="why-rule"></div>
        <div class="why-info">
          <span aria-hidden="true">📍</span> <?= sanitizar(BUSINESS_ADDRESS) ?><br>
          <span aria-hidden="true">📞</span> <a href="tel:<?= sanitizar(BUSINESS_PHONE) ?>" data-conversion="telefono"><?= sanitizar(BUSINESS_PHONE_HUMAN) ?></a><br>
          <span aria-hidden="true">✉️</span> <a href="mailto:<?= sanitizar(BUSINESS_EMAIL) ?>" data-conversion="email"><?= sanitizar(BUSINESS_EMAIL) ?></a>
        </div>
      </div>
    </div>
  </section>

  <section class="clients" id="clientes">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Nuestros Clientes</div>
        <h2 class="sec-title">Empresas que <em>confían en nosotros</em></h2>
      </div>
      <div class="marquee-outer">
        <div class="marquee-track">
          <?php
          // Se repite la lista para que el desplazamiento sea continuo.
          for ($vuelta = 0; $vuelta < 2; $vuelta++):
            foreach (logos_clientes() as [$archivo, $nombre, $w, $h]): ?>
            <div class="marquee-logo" data-ocultar-si-falla>
              <img src="/assets/img/clientes/<?= $archivo ?>" alt="<?= sanitizar($nombre) ?>"
                   width="<?= $w ?>" height="<?= $h ?>" loading="lazy" decoding="async">
            </div>
          <?php endforeach; endfor; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-strip">
    <div class="cta-inner">
      <h2 class="cta-title">¿Listo para vestir<br>a tu <em>equipo</em>?</h2>
      <p class="cta-sub">Contáctanos hoy y recibe tu cotización en menos de 24 horas. Sin compromiso.</p>
      <div class="cta-btns">
        <a href="<?= sanitizar(url_whatsapp('Hola, me gustaría cotizar')) ?>" target="_blank" rel="noopener"
           class="btn-wa" data-conversion="whatsapp">
          <?= icono('ico-wa', 18) ?> Cotizar por WhatsApp
        </a>
        <a href="/contacto" class="btn-accent">Cotizar ahora <?= icono('ico-flecha', 15) ?></a>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
