<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_slug        = 'nosotros';
$page_title       = 'Nosotros | Rapid Transfer, 20 años en La Serena';
$page_description = 'Conoce Rapid Transfer: más de 20 años bordando, estampando y vistiendo empresas de La Serena y la Región de Coquimbo. Equipo cercano y profesional.';
$page_css         = 'nosotros.css';
$page_jsonld      = [jsonld_breadcrumb(['Inicio' => '', 'Nosotros' => 'nosotros'])];

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Quiénes somos</div>
    <h1>20 años <em>vistiendo</em> La Serena</h1>
    <p>Somos un taller familiar con historia. Desde camisas bordadas hasta uniformes industriales completos, todo sale de nuestra fábrica.</p>
  </div>
</div>

<nav class="breadcrumb" aria-label="Ruta de navegación">
  <ol class="breadcrumb-inner">
    <li><a href="/">Inicio</a> <span aria-hidden="true">›</span></li>
    <li aria-current="page">Nosotros</li>
  </ol>
</nav>

<main id="contenido">

  <section class="story">
    <div class="story-grid">
      <div class="story-img reveal-left">
        <?= imagen('/assets/img/historia-rapidtransfer.webp', 'Logo de Rapid Transfer, ropa corporativa en La Serena', 800, 800) ?>
        <div class="story-badge">
          <div class="num"><span data-contador="20">20</span><sup>+</sup></div>
          <div class="lbl">años de experiencia</div>
        </div>
      </div>
      <div class="story-body reveal-right">
        <div class="sec-tag">Nuestra historia</div>
        <h2 class="sec-title">Nació en La Serena, <em>creció</em> con sus empresas</h2>
        <p class="sec-sub">Rapid Transfer empezó como un pequeño taller de transferencia textil y hoy somos el referente regional en personalización de ropa corporativa.</p>
        <p>A lo largo de más de 20 años, hemos acompañado a cientos de empresas de la Tercera y Cuarta Región en la construcción de su identidad visual: desde la polera del primer empleado hasta la uniformidad completa de equipos de 500 personas.</p>
        <p>Trabajamos con tecnología de bordado y estampado industrial, sin perder el trato cercano y la atención al detalle que nos caracterizó desde el primer día. Cada pedido lo tratamos como si fuera el único.</p>
      </div>
    </div>
  </section>

  <section class="about-stats" aria-label="Cifras de la empresa">
    <div class="about-stats-inner">
      <div class="astat">
        <div class="astat-num"><span data-contador="20">20</span><sup>+</sup></div>
        <div class="astat-lbl">Años en el mercado</div>
      </div>
      <div class="astat">
        <div class="astat-num"><span data-contador="500">500</span><sup>+</sup></div>
        <div class="astat-lbl">Clientes en la región</div>
      </div>
      <div class="astat">
        <div class="astat-num"><span data-contador="3">3</span></div>
        <div class="astat-lbl">Técnicas propias</div>
      </div>
    </div>
  </section>

  <section class="values">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Nuestra filosofía</div>
        <h2 class="sec-title">Los valores que <em>nos mueven</em></h2>
      </div>
      <div class="val-grid">
        <?php
        $valores = [
            ['🎯', 'Precisión antes que velocidad',
             'Preferimos tomarnos el tiempo necesario para que cada prenda salga perfecta. Un bordado mal hecho no se repara fácilmente.'],
            ['🤝', 'Trato directo y honesto',
             'El dueño o el jefe de producción atiende directamente tu pedido. Sin ruido en la comunicación.'],
            ['🏭', 'Control total del proceso',
             'Controlamos cada etapa en La Serena: de la recepción del diseño a la entrega final. Sin demoras ni sorpresas.'],
            ['⚡', 'Respuesta rápida',
             'Cotizamos el mismo día. Si el pedido es urgente, lo decimos. Si podemos, lo hacemos. No prometemos lo que no podemos cumplir.'],
            ['🌱', 'Cobertura regional',
             'Atendemos a empresas de la Tercera y Cuarta Región. Sector automotriz, universidades, retail, minería y más confían en nosotros.'],
            ['🔄', 'Mejora continua',
             'Incorporamos nuevas técnicas y equipos para ofrecer mejores productos. DTF, vinilo premium y digitalizaciones de alta resolución.'],
        ];
        foreach ($valores as $i => [$emoji, $titulo, $desc]): ?>
        <div class="val-card reveal" data-delay="<?= $i * 90 ?>">
          <div class="val-ico" aria-hidden="true"><?= $emoji ?></div>
          <h3 class="val-title"><?= $titulo ?></h3>
          <p class="val-desc"><?= $desc ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="clients">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Nuestro trabajo</div>
        <h2 class="sec-title">Empresas que <em>confían</em> en nosotros</h2>
        <p class="sec-sub">Hemos trabajado con empresas de minería, retail, salud, construcción, automotriz, universidades y más en la Tercera y Cuarta Región.</p>
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

  <section class="why-us">
    <div class="why-us-grid">
      <div>
        <div class="sec-tag">Diferencias clave</div>
        <h2 class="sec-title">¿Por qué <em>elegirnos</em>?</h2>
        <div class="why-list">
          <?php
          $razones = [
              ['🏠', 'Taller propio en La Serena',
               'No subcontratamos. Todo el proceso ocurre en nuestra planta de Av. Balmaceda 1644. Puedes visitarnos y ver tu pedido en producción.'],
              ['📞', 'Atención directa y personalizada',
               'Responde una persona real. Conocemos cada pedido y cada cliente. Si hay un problema, lo solucionamos al instante.'],
              ['🎨', 'Asesoría de diseño incluida',
               'Si tu logo no está optimizado para bordado o estampado, te lo preparamos para que quede perfecto.'],
          ];
          foreach ($razones as $i => [$emoji, $titulo, $desc]): ?>
          <div class="why-item reveal-left" data-delay="<?= $i * 90 ?>">
            <span class="w-ico" aria-hidden="true"><?= $emoji ?></span>
            <div>
              <h3><?= $titulo ?></h3>
              <p><?= $desc ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div>
        <div class="why-aside reveal-right">
          <h3 class="wa-aside-title">¿Quieres trabajar <em>con nosotros?</em></h3>
          <p class="wa-aside-desc">Cuéntanos tu proyecto y te damos una cotización el mismo día. Sin compromisos.</p>
          <div class="wa-aside-info">
            <div class="wa-aside-info-item"><span aria-hidden="true">📍</span> <?= sanitizar(BUSINESS_ADDRESS) ?></div>
            <div class="wa-aside-info-item"><span aria-hidden="true">📞</span> <a href="tel:<?= sanitizar(BUSINESS_PHONE) ?>" data-conversion="telefono"><?= sanitizar(BUSINESS_PHONE_HUMAN) ?></a></div>
            <div class="wa-aside-info-item"><span aria-hidden="true">✉️</span> <a href="mailto:<?= sanitizar(BUSINESS_EMAIL) ?>" data-conversion="email"><?= sanitizar(BUSINESS_EMAIL) ?></a></div>
            <div class="wa-aside-info-item"><span aria-hidden="true">🕐</span> Lun–Vie 9:00 a 16:00</div>
          </div>
          <a href="<?= sanitizar(url_whatsapp('Hola, me gustaría cotizar con Rapid Transfer')) ?>" target="_blank" rel="noopener"
             class="btn-wa" data-conversion="whatsapp">
            <?= icono('ico-wa', 18) ?> Escribir por WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
