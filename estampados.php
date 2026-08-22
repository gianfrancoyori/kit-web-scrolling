<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_slug        = 'estampados';
$page_title       = 'Estampados DTF y Vinilo | Rapid Transfer La Serena';
$page_description = 'Estampados DTF, vinilo textil y sublimación en La Serena. Colores vivos y resistentes al lavado para tu empresa. 20+ años de experiencia.';
$page_css         = 'servicios.css';

$page_jsonld = [
    jsonld_breadcrumb([
        'Inicio'             => '',
        'Nuestros Servicios' => '',
        'Estampados'         => 'estampados',
    ]),
    jsonld_faq([
        '¿Cuál es la diferencia entre DTF y vinilo?'
            => 'El DTF permite colores fotográficos y degradados complejos sobre cualquier tela. El vinilo es más duradero y da un acabado más sólido, ideal para logos simples con 1 a 3 colores y tipografía. Nosotros te recomendamos cuál usar según tu diseño.',
        '¿Cuánto demora un pedido?'
            => 'Pedidos de hasta 50 unidades los tenemos listos en 2 a 4 días hábiles. Para pedidos urgentes del mismo día (sujeto a disponibilidad), consúltanos por WhatsApp.',
        '¿Puedo traer mis propias prendas?'
            => 'Sí, aceptamos prendas del cliente. Solo aplicamos el estampado. También ofrecemos el servicio completo: te conseguimos la prenda y la personalizamos.',
        '¿Qué tamaño puede tener el estampado?'
            => 'En DTF imprimimos hasta 60 cm de ancho. El vinilo no tiene límite de tamaño. Para sublimación podemos hacer full print (toda la prenda). Cuéntanos lo que necesitas y te asesoramos.',
        '¿Cuántas prendas es el mínimo?'
            => 'Para DTF y vinilo no hay mínimo: puedes pedir desde 1 unidad. Para sublimación el mínimo es 6 prendas para que el precio sea conveniente.',
    ]),
];

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Personalización textil</div>
    <h1>Estampados <em>profesionales</em></h1>
    <p>DTF, vinilo textil y sublimación. Colores vivos, líneas precisas y lavado tras lavado tu logo sigue intacto.</p>
  </div>
</div>

<nav class="breadcrumb" aria-label="Ruta de navegación">
  <ol class="breadcrumb-inner">
    <li><a href="/">Inicio</a> <span aria-hidden="true">›</span></li>
    <li>Nuestros Servicios <span aria-hidden="true">›</span></li>
    <li aria-current="page">Estampados</li>
  </ol>
</nav>

<main id="contenido">

  <!-- ── Técnicas ── -->
  <section class="techniques" aria-labelledby="titulo-tecnicas">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Nuestras técnicas</div>
        <h2 class="sec-title" id="titulo-tecnicas">3 técnicas, <em>infinitas posibilidades</em></h2>
        <p class="sec-sub">Elegimos la mejor técnica según tu diseño, el tipo de prenda y el volumen del pedido.</p>
      </div>
      <div class="tech-grid">

        <article class="tech-card reveal">
          <div class="tech-header">
            <p class="tech-badge">Más solicitado</p>
            <h3 class="tech-name">DTF<br><em>Direct to Film</em></h3>
          </div>
          <div class="tech-body">
            <p class="tech-desc">Impresión digital que se transfiere sobre cualquier tela con una película especial. Colores fotográficos, bordes perfectos y excelente adherencia.</p>
            <ul class="tech-pros">
              <li>Colores ilimitados y degradados</li>
              <li>Sin mínimo de prendas</li>
              <li>Funciona en telas oscuras y claras</li>
              <li>Tacto suave y flexible</li>
              <li>Resistente al lavado (más de 40 ciclos)</li>
            </ul>
            <p class="tech-best"><strong>Ideal para:</strong> Uniformes con logo multicolor, promocionales, tirajes pequeños o únicos.</p>
          </div>
        </article>

        <article class="tech-card reveal" data-delay="120">
          <div class="tech-header">
            <p class="tech-badge">Máxima durabilidad</p>
            <h3 class="tech-name">Vinilo<br><em>Textil de corte</em></h3>
          </div>
          <div class="tech-body">
            <p class="tech-desc">Se corta con plóter y se aplica con calor. Resultado limpio y bordes perfectos. La técnica más resistente para logos simples y tipografía.</p>
            <ul class="tech-pros">
              <li>Durabilidad superior (50+ lavados)</li>
              <li>Acabado mate, brillante o glitter</li>
              <li>Ideal para números y nombres</li>
              <li>Colores sólidos muy vivos</li>
              <li>Sin límite de tamaño</li>
            </ul>
            <p class="tech-best"><strong>Ideal para:</strong> Equipos deportivos, uniformes con número y nombre, logos simples de 1 a 3 colores.</p>
          </div>
        </article>

        <article class="tech-card reveal" data-delay="240">
          <div class="tech-header">
            <p class="tech-badge">Para telas sintéticas</p>
            <h3 class="tech-name">Sublimación<br><em>Digital</em></h3>
          </div>
          <div class="tech-body">
            <p class="tech-desc">La tinta se vaporiza y se integra a la fibra. El diseño pasa a ser parte de la tela. Perfecto para prendas 100% poliéster.</p>
            <ul class="tech-pros">
              <li>No se pela ni se cuartea jamás</li>
              <li>Color fotográfico completo</li>
              <li>Cero textura sobre la tela</li>
              <li>Diseños a full color y full print</li>
              <li>Ideal para camisetas deportivas</li>
            </ul>
            <p class="tech-best"><strong>Ideal para:</strong> Camisetas deportivas, gorros de poliéster, tazas y accesorios sublimables.</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── Comparativa ── -->
  <section class="compare" aria-labelledby="titulo-comparativa">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Comparativa</div>
        <h2 class="sec-title" id="titulo-comparativa">¿Cuál técnica <em>te conviene?</em></h2>
      </div>
      <div class="compare-table">
        <table>
          <caption>Comparativa de DTF, vinilo textil y sublimación</caption>
          <thead>
            <tr>
              <th scope="col">Característica</th>
              <th scope="col">DTF</th>
              <th scope="col">Vinilo Textil</th>
              <th scope="col">Sublimación</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Colores ilimitados</th>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="partial">Limitado</td>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
            </tr>
            <tr>
              <th scope="row">Funciona en telas oscuras</th>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="partial">No (solo blanco/claro)</td>
            </tr>
            <tr>
              <th scope="row">Funciona en algodón</th>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="partial">No (solo poly)</td>
            </tr>
            <tr>
              <th scope="row">Sin mínimo</th>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
              <td class="partial">Desde 6 und.</td>
            </tr>
            <tr>
              <th scope="row">Resistencia al lavado</th>
              <td>40+ ciclos</td>
              <td>50+ ciclos</td>
              <td>Ilimitada</td>
            </tr>
            <tr>
              <th scope="row">Full print (toda la prenda)</th>
              <td class="partial">Parcial</td>
              <td class="partial">No</td>
              <td class="yes"><span aria-hidden="true">✓</span> Sí</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- ── Proceso ── -->
  <section class="info-section" aria-labelledby="titulo-proceso">
    <div class="info-grid">
      <div class="info-body reveal-left">
        <div class="sec-tag">Nuestro proceso</div>
        <h2 class="sec-title" id="titulo-proceso">De tu diseño a la <em>prenda lista</em></h2>
        <p class="sec-sub">Simplificamos al máximo el proceso para que tu pedido esté listo lo antes posible, sin complicaciones.</p>
        <ul class="info-list">
          <li>
            <span class="ico" aria-hidden="true">📤</span>
            <span class="text"><strong>1. Envías el diseño</strong><span>PNG, PDF o vectores. Te ayudamos si el archivo no está listo para imprimir.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">🖨️</span>
            <span class="text"><strong>2. Preparamos e imprimimos</strong><span>Ajustamos la resolución y la técnica correcta para tu prenda.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">🔥</span>
            <span class="text"><strong>3. Aplicamos con calor</strong><span>Prensa de calor industrial a temperatura y presión exactas para adherencia perfecta.</span></span>
          </li>
          <li>
            <span class="ico" aria-hidden="true">📦</span>
            <span class="text"><strong>4. Entrega en La Serena</strong><span>Retiro en taller (<?= sanitizar(BUSINESS_ADDRESS) ?>) o despacho a domicilio.</span></span>
          </li>
        </ul>
      </div>
      <div class="info-img reveal-right">
        <?= imagen(
              '/assets/img/info-estampado.webp',
              'Aplicación de un estampado por transferencia térmica sobre una prenda de tela',
              900, 600
            ) ?>
      </div>
    </div>
  </section>

  <!-- ── Preguntas frecuentes ── -->
  <section class="faq" aria-labelledby="titulo-faq">
    <div class="sec-wrap">
      <div class="sec-header">
        <div class="sec-tag">Preguntas frecuentes</div>
        <h2 class="sec-title" id="titulo-faq">Resolvemos tus <em>dudas</em></h2>
      </div>
      <div class="faq-list">
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-1">¿Cuál es la diferencia entre DTF y vinilo?</button></h3>
          <div class="faq-a" id="faq-1" hidden>
            <p>El DTF permite colores fotográficos y degradados complejos sobre cualquier tela. El vinilo es más duradero y da un acabado más sólido, ideal para logos simples con 1 a 3 colores y tipografía. Nosotros te recomendamos cuál usar según tu diseño.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-2">¿Cuánto demora un pedido?</button></h3>
          <div class="faq-a" id="faq-2" hidden>
            <p>Pedidos de hasta 50 unidades los tenemos listos en 2 a 4 días hábiles. Para pedidos urgentes del mismo día (sujeto a disponibilidad), consúltanos por WhatsApp.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-3">¿Puedo traer mis propias prendas?</button></h3>
          <div class="faq-a" id="faq-3" hidden>
            <p>Sí, aceptamos prendas del cliente. Solo aplicamos el estampado. También ofrecemos el servicio completo: te conseguimos la prenda y la personalizamos.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-4">¿Qué tamaño puede tener el estampado?</button></h3>
          <div class="faq-a" id="faq-4" hidden>
            <p>En DTF imprimimos hasta 60 cm de ancho. El vinilo no tiene límite de tamaño. Para sublimación podemos hacer full print (toda la prenda). Cuéntanos lo que necesitas y te asesoramos.</p>
          </div>
        </div>
        <div class="faq-item">
          <h3><button type="button" class="faq-q" aria-expanded="false" aria-controls="faq-5">¿Cuántas prendas es el mínimo?</button></h3>
          <div class="faq-a" id="faq-5" hidden>
            <p>Para DTF y vinilo no hay mínimo: puedes pedir desde 1 unidad. Para sublimación el mínimo es 6 prendas para que el precio sea conveniente.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Cierre ── -->
  <section class="cta-strip">
    <div class="cta-inner">
      <div class="sec-tag">¿Listo para cotizar?</div>
      <h2 class="cta-title">Cotizamos tu estampado <em>hoy mismo</em></h2>
      <p class="cta-sub">Envíanos tu diseño y la cantidad de prendas. Te respondemos con precio y plazo al instante.</p>
      <div class="cta-btns">
        <a href="<?= sanitizar(url_whatsapp('Hola, quiero cotizar estampados para mi empresa')) ?>"
           target="_blank" rel="noopener" class="btn-wa" data-conversion="whatsapp">
          <?= icono('ico-wa', 18) ?> Cotizar por WhatsApp
        </a>
        <a href="/contacto" class="btn-outline-white">Solicitar presupuesto <?= icono('ico-flecha', 15) ?></a>
      </div>
    </div>
  </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
