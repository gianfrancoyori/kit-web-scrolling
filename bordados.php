<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_slug        = 'bordados';
$page_title       = 'Bordados Corporativos | Rapid Transfer La Serena';
$page_description = 'Bordados personalizados para empresas en La Serena. Uniformes, parches, gorros y más. Calidad garantizada, 20+ años de experiencia.';
$page_css         = 'servicios.css';

$page_jsonld = [
    jsonld_breadcrumb([
        'Inicio'             => '',
        'Nuestros Servicios' => '',
        'Bordados'           => 'bordados',
    ]),
    jsonld_faq([
        '¿Cuánto demora un pedido de bordado?'
            => 'Pedidos estándar de 10 a 50 unidades toman entre 3 y 5 días hábiles desde la aprobación del diseño. Para pedidos urgentes o de mayor volumen, consúltanos directo por WhatsApp.',
        '¿Cuál es el pedido mínimo?'
            => 'Para producción regular pedimos un mínimo de 5 prendas. Si necesitas una muestra previa, podemos bordar desde 1 prenda a un costo adicional de digitalización.',
        '¿Qué formatos de archivo necesitan?'
            => 'Ideal en vectores: AI, EPS o PDF de alta resolución. También aceptamos PNG o JPG de buena calidad. Nosotros nos encargamos de la digitalización para bordado.',
        '¿Puedo llevar mis propias prendas?'
            => 'Sí. Puedes traer tus prendas y nosotros solo aplicamos el bordado. También ofrecemos el servicio completo: selección de prendas del catálogo + bordado.',
        '¿El precio incluye la prenda?'
            => 'Cotizamos bordado solo (sobre tus prendas) o bordado + prenda del catálogo T-World. Indícanos qué necesitas al consultar y te damos el precio exacto.',
    ]),
];

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Personalización textil</div>
    <h1>Bordados <em>corporativos</em></h1>
    <p>Precisión, durabilidad y color. Bordamos tu logo en cualquier prenda con maquinaria industrial y terminaciones profesionales.</p>
  </div>
</div>

<nav class="breadcrumb" aria-label="Ruta de navegación">
  <ol class="breadcrumb-inner">
    <li><a href="/">Inicio</a> <span aria-hidden="true">›</span></li>
    <li>Nuestros Servicios <span aria-hidden="true">›</span></li>
    <li aria-current="page">Bordados</li>
  </ol>
</nav>

<main id="contenido">

  <!-- ── Proceso ── -->
  <section class="process" aria-labelledby="titulo-proceso">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Cómo trabajamos</div>
        <h2 class="sec-title" id="titulo-proceso">Del logo a la <em>prenda</em> en 4 pasos</h2>
      </div>
      <div class="steps">
        <div class="step reveal">
          <div class="step-num" aria-hidden="true">1</div>
          <h3 class="step-title">Envías tu logo</h3>
          <p class="step-desc">Mándanos tu logo en formato JPG por WhatsApp o email.</p>
        </div>
        <div class="step reveal" data-delay="120">
          <div class="step-num" aria-hidden="true">2</div>
          <h3 class="step-title">Digitalizamos</h3>
          <p class="step-desc">Convertimos tu diseño a archivo de bordado. Te mostramos la simulación antes de producir.</p>
        </div>
        <div class="step reveal" data-delay="240">
          <div class="step-num" aria-hidden="true">3</div>
          <h3 class="step-title">Apruebas</h3>
          <p class="step-desc">Revisas el prototipo y das tu visto bueno. Sin cargo extra por ajustes menores.</p>
        </div>
        <div class="step reveal" data-delay="360">
          <div class="step-num" aria-hidden="true">4</div>
          <h3 class="step-title">Producción y entrega</h3>
          <p class="step-desc">Bordamos el total del pedido y te avisamos cuando está listo para retiro o despacho.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Prendas ── -->
  <section class="garments" aria-labelledby="titulo-prendas">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Qué bordamos</div>
        <h2 class="sec-title" id="titulo-prendas">Bordamos sobre <em>todo tipo</em> de prendas</h2>
        <p class="sec-sub">Si tiene tela, lo bordamos. Desde poleras y camisas hasta gorros, bolsos y accesorios.</p>
      </div>
      <div class="garment-grid">
        <div class="garment-card reveal">
          <div class="garment-icon"><span aria-hidden="true">👕</span></div>
          <h3 class="garment-name">Poleras y camisas</h3>
          <p class="garment-desc">Poleras corporativas, Oxford, Trevira y más. Bordado en pecho, manga o espalda.</p>
        </div>
        <div class="garment-card reveal" data-delay="80">
          <div class="garment-icon"><span aria-hidden="true">🧥</span></div>
          <h3 class="garment-name">Chaquetas y parkas</h3>
          <p class="garment-desc">Softshell, micropolar, chaquetas 3 en 1 y parkas térmicas con tu logo.</p>
        </div>
        <div class="garment-card reveal" data-delay="160">
          <div class="garment-icon"><span aria-hidden="true">🎩</span></div>
          <h3 class="garment-name">Gorros y accesorios</h3>
          <p class="garment-desc">Gorros con frente estructurado, bandanas, pañuelos y bufandas corporativas.</p>
        </div>
        <div class="garment-card reveal" data-delay="240">
          <div class="garment-icon"><span aria-hidden="true">👜</span></div>
          <h3 class="garment-name">Bolsos y mochilas</h3>
          <p class="garment-desc">Tote bags, mochilas y maletines con bordado corporativo de alta calidad.</p>
        </div>
        <div class="garment-card reveal" data-delay="320">
          <div class="garment-icon"><span aria-hidden="true">🦺</span></div>
          <h3 class="garment-name">Ropa de trabajo</h3>
          <p class="garment-desc">Overoles, delantales industriales, chalecos y ropa Hi-Vis con tu marca.</p>
        </div>
        <div class="garment-card reveal" data-delay="400">
          <div class="garment-icon"><span aria-hidden="true">🧤</span></div>
          <h3 class="garment-name">Uniformes deportivos</h3>
          <p class="garment-desc">Camisetas, shorts y ropa deportiva para equipos con número y nombre bordados.</p>
        </div>
        <div class="garment-card reveal" data-delay="480">
          <div class="garment-icon"><span aria-hidden="true">🎖️</span></div>
          <h3 class="garment-name">Parches y apliques</h3>
          <p class="garment-desc">Parches independientes para coser, planchar o añadir al uniforme que ya tienes.</p>
        </div>
        <div class="garment-card reveal" data-delay="560">
          <div class="garment-icon"><span aria-hidden="true">👔</span></div>
          <h3 class="garment-name">Trajes y corbatas</h3>
          <p class="garment-desc">Bordado discreto en bolsillos de terno, mangas o puños para un look ejecutivo.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Por qué elegirnos ── -->
  <section class="info-section" aria-labelledby="titulo-calidad">
    <div class="info-grid">
      <div class="info-img reveal-left">
        <?= imagen(
              '/assets/img/info-bordado.webp',
              'Logo corporativo bordado sobre tela junto a carretes de hilo de colores',
              900, 900
            ) ?>
      </div>
      <div class="info-body reveal-right">
        <div class="sec-tag">Por qué elegirnos</div>
        <h2 class="sec-title" id="titulo-calidad">Bordado de <em>calidad industrial</em> desde nuestro taller</h2>
        <p class="sec-sub">Contamos con bordadoras industriales de múltiples cabezales que permiten producir grandes volúmenes con precisión milimétrica y los mismos colores en cada prenda.</p>
        <ul class="info-list">
          <li>
            <span class="ico" aria-hidden="true">🎨</span>
            <span class="text"><strong>Hasta 6 colores por diseño</strong><span>Paleta Pantone. Reproducimos tu guía de color exacta.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">🏭</span>
            <span class="text"><strong>Taller propio en La Serena</strong><span>Todo el proceso en nuestras instalaciones. Más control de calidad y plazos cumplidos.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">📦</span>
            <span class="text"><strong>Sin mínimo para muestras</strong><span>Pedidos de prueba desde 1 prenda. Producción desde 5 unidades.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">⚡</span>
            <span class="text"><strong>Plazos express</strong><span>Entregas urgentes disponibles. Consulta disponibilidad por WhatsApp.</span></span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ── Preguntas frecuentes ── -->
  <section class="faq" aria-labelledby="titulo-faq">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Preguntas frecuentes</div>
        <h2 class="sec-title" id="titulo-faq">Todo lo que necesitas <em>saber</em></h2>
      </div>
      <div class="faq-list">
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-1">¿Cuánto demora un pedido de bordado?</button></h3>
          <div class="faq-a" id="faq-1" hidden>
            <p>Pedidos estándar de 10 a 50 unidades toman entre 3 y 5 días hábiles desde la aprobación del diseño. Para pedidos urgentes o de mayor volumen, consúltanos directo por WhatsApp.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-2">¿Cuál es el pedido mínimo?</button></h3>
          <div class="faq-a" id="faq-2" hidden>
            <p>Para producción regular pedimos un mínimo de 5 prendas. Si necesitas una muestra previa, podemos bordar desde 1 prenda a un costo adicional de digitalización.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-3">¿Qué formatos de archivo necesitan?</button></h3>
          <div class="faq-a" id="faq-3" hidden>
            <p>Ideal en vectores: AI, EPS o PDF de alta resolución. También aceptamos PNG o JPG de buena calidad. Nosotros nos encargamos de la digitalización para bordado.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-4">¿Puedo llevar mis propias prendas?</button></h3>
          <div class="faq-a" id="faq-4" hidden>
            <p>Sí. Puedes traer tus prendas y nosotros solo aplicamos el bordado. También ofrecemos el servicio completo: selección de prendas del catálogo + bordado.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-5">¿El precio incluye la prenda?</button></h3>
          <div class="faq-a" id="faq-5" hidden>
            <p>Cotizamos bordado solo (sobre tus prendas) o bordado + prenda del catálogo T-World. Indícanos qué necesitas al consultar y te damos el precio exacto.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Cierre ── -->
  <section class="cta-strip">
    <div class="cta-inner">
      <div class="sec-tag">¿Listo para cotizar?</div>
      <h2 class="cta-title">Escríbenos y cotizamos <em>hoy mismo</em></h2>
      <p class="cta-sub">Cuéntanos qué necesitas, cuántas prendas y dónde va el bordado. Te respondemos en minutos.</p>
      <div class="cta-btns">
        <a href="<?= sanitizar(url_whatsapp('Hola, quiero cotizar bordados para mi empresa')) ?>"
           target="_blank" rel="noopener" class="btn-wa" data-conversion="whatsapp">
          <?= icono('ico-wa', 18) ?> Cotizar por WhatsApp
        </a>
        <a href="/contacto" class="btn-outline-white">Solicitar presupuesto <?= icono('ico-flecha', 15) ?></a>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
