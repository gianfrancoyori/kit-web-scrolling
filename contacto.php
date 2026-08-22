<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$page_slug        = 'contacto';
$page_title       = 'Cotizar bordados y ropa corporativa | Rapid Transfer La Serena';
$page_description = 'Cotiza tu bordado, estampado o ropa corporativa con Rapid Transfer en La Serena. Respuesta el mismo día por correo o WhatsApp.';
$page_css         = 'contacto.css';
$page_js          = 'contacto.js';
$page_jsonld      = [jsonld_breadcrumb(['Inicio' => '', 'Contacto' => 'contacto'])];

$csrf = generar_csrf();

require __DIR__ . '/includes/header.php';
?>

<div class="page-hero">
  <div class="page-hero-content">
    <div class="page-hero-eyebrow">Hablemos</div>
    <h1>Cotiza tu <em>pedido</em></h1>
    <p>Rellena el formulario o escríbenos por WhatsApp. Te respondemos el mismo día con precio y plazo exactos.</p>
  </div>
</div>

<nav class="breadcrumb" aria-label="Ruta de navegación">
  <ol class="breadcrumb-inner">
    <li><a href="/">Inicio</a> <span aria-hidden="true">›</span></li>
    <li aria-current="page">Contacto</li>
  </ol>
</nav>

<main class="contact-main" id="contenido">
  <div class="contact-grid">

    <div class="contact-info reveal-left">
      <div class="info-card">
        <h2 class="info-card-title">Información de <em>contacto</em></h2>

        <div class="contact-item">
          <div class="ci-ico" aria-hidden="true">📍</div>
          <div>
            <div class="ci-lbl">Dirección</div>
            <div class="ci-val">Av. Balmaceda 1644, La Serena<br>Región de Coquimbo, Chile</div>
          </div>
        </div>

        <div class="contact-item">
          <div class="ci-ico" aria-hidden="true">📞</div>
          <div>
            <div class="ci-lbl">Teléfono / WhatsApp</div>
            <div class="ci-val"><a href="tel:<?= sanitizar(BUSINESS_PHONE) ?>" data-conversion="telefono"><?= sanitizar(BUSINESS_PHONE_HUMAN) ?></a></div>
          </div>
        </div>

        <div class="contact-item">
          <div class="ci-ico" aria-hidden="true">✉️</div>
          <div>
            <div class="ci-lbl">Correo electrónico</div>
            <div class="ci-val"><a href="mailto:<?= sanitizar(BUSINESS_EMAIL) ?>" data-conversion="email"><?= sanitizar(BUSINESS_EMAIL) ?></a></div>
          </div>
        </div>
      </div>

      <div class="hours-card">
        <h2 class="hours-card-title">Horario de atención</h2>
        <div class="hours-row"><span class="day">Lunes – Viernes</span><span class="time">10:00 – 16:00</span></div>
        <div class="hours-row"><span class="day">Sábado</span><span class="closed">Cerrado</span></div>
        <div class="hours-row"><span class="day">Domingo</span><span class="closed">Cerrado</span></div>
      </div>
    </div>

    <div class="contact-form-wrap reveal-right">
      <div class="form-card">
        <div id="formContent">
          <h2 class="form-title">Solicitar <em>presupuesto</em></h2>
          <p class="form-sub">Cuéntanos qué necesitas y te respondemos con precio y plazo el mismo día.</p>

          <form id="quoteForm" action="/api/enviar-cotizacion.php" method="post">
            <input type="hidden" name="csrf" value="<?= sanitizar($csrf) ?>">
            <div class="form-hp" aria-hidden="true">
              <label for="botcheck">No rellenar</label>
              <input type="text" id="botcheck" name="botcheck" tabindex="-1" autocomplete="off">
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label" for="nombre">Nombre <span class="req" aria-hidden="true">*</span></label>
                <input class="form-input" type="text" id="nombre" name="nombre" placeholder="Tu nombre"
                       required autocomplete="name" aria-describedby="error-nombre">
                <p class="field-error" id="error-nombre"></p>
              </div>
              <div class="form-group">
                <label class="form-label" for="empresa">Empresa</label>
                <input class="form-input" type="text" id="empresa" name="empresa"
                       placeholder="Nombre de tu empresa" autocomplete="organization">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label" for="telefono">Teléfono <span class="req" aria-hidden="true">*</span></label>
                <input class="form-input" type="tel" id="telefono" name="telefono" placeholder="+56 9 XXXX XXXX"
                       required autocomplete="tel" aria-describedby="error-telefono">
                <p class="field-error" id="error-telefono"></p>
              </div>
              <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input class="form-input" type="email" id="email" name="email" placeholder="tu@correo.cl"
                       autocomplete="email" aria-describedby="error-email">
                <p class="field-error" id="error-email"></p>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="servicio">¿Qué servicio necesitas? <span class="req" aria-hidden="true">*</span></label>
              <select class="form-select" id="servicio" name="servicio" required aria-describedby="error-servicio">
                <option value="" disabled selected>Selecciona un servicio…</option>
                <option>Bordado sobre mis prendas</option>
                <option>Bordado + prendas del catálogo</option>
                <option>Estampado DTF</option>
                <option>Estampado Vinilo Textil</option>
                <option>Sublimación</option>
                <option>Ropa corporativa con personalización</option>
                <option>Otro / No sé todavía</option>
              </select>
              <p class="field-error" id="error-servicio"></p>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label" for="cantidad">Cantidad de prendas</label>
                <input class="form-input" type="number" id="cantidad" name="cantidad" placeholder="Ej: 50" min="1" step="1">
              </div>
              <div class="form-group">
                <label class="form-label" for="plazo">Plazo deseado</label>
                <select class="form-select" id="plazo" name="plazo">
                  <option value="" disabled selected>Cuándo lo necesitas…</option>
                  <option>Urgente (1–2 días)</option>
                  <option>Esta semana</option>
                  <option>En 2 semanas</option>
                  <option>Sin urgencia</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="mensaje">Cuéntanos más sobre tu pedido</label>
              <textarea class="form-textarea" id="mensaje" name="mensaje" maxlength="3000"
                        placeholder="Descripción del pedido, colores, tamaño del bordado/estampado, si tienes logo listo..."></textarea>
            </div>

            <div class="form-check">
              <input type="checkbox" id="privacy" name="privacy" required aria-describedby="error-privacy">
              <label for="privacy">Acepto que Rapid Transfer use estos datos para responder mi consulta.</label>
            </div>
            <p class="field-error" id="error-privacy"></p>

            <div class="form-alert" id="formAlert" role="alert" hidden></div>

            <button type="submit" class="form-submit">Enviar solicitud de presupuesto →</button>
          </form>

          <div class="form-divider">o si prefieres</div>

          <a href="<?= sanitizar(url_whatsapp('Hola, quiero cotizar un pedido de personalización textil')) ?>"
             target="_blank" rel="noopener" class="form-wa-alt" data-conversion="whatsapp">
            <?= icono('ico-wa', 18) ?> Cotizar directo por WhatsApp
          </a>
        </div>

        <div class="form-success" id="formSuccess" role="status" hidden>
          <div class="check" aria-hidden="true">✅</div>
          <h2 tabindex="-1" id="successTitle">¡Solicitud enviada!</h2>
          <p>
            Recibimos tu solicitud y te responderemos en horario de atención (Lun–Vie 10:00–16:00).<br><br>
            Si lo prefieres, también puedes escribirnos por WhatsApp:
            <a href="<?= sanitizar(url_whatsapp()) ?>" target="_blank" rel="noopener" data-conversion="whatsapp"><?= sanitizar(BUSINESS_PHONE_HUMAN) ?></a>.
          </p>
          <button type="button" class="form-reset" id="formReset">Enviar otra solicitud</button>
        </div>
      </div>
    </div>

  </div>
</main>

<div class="map-section">
  <div class="map-inner">
    <div class="map-header">
      <h2 class="map-address"><strong><span aria-hidden="true">📍</span> Cómo llegar</strong> &nbsp;·&nbsp; <?= sanitizar(BUSINESS_ADDRESS) ?></h2>
      <div class="map-nav-btns">
        <a href="https://www.google.com/maps/dir/?api=1&destination=Av.+Balmaceda+1644,+La+Serena,+Coquimbo,+Chile&travelmode=driving"
           target="_blank" rel="noopener" class="map-nav-btn gmaps">Abrir en Google Maps</a>
        <a href="https://waze.com/ul?ll=-29.9047,-71.2494&navigate=yes&zoom=17"
           target="_blank" rel="noopener" class="map-nav-btn waze">Abrir en Waze</a>
      </div>
    </div>
    <div class="map-frame">
      <iframe src="https://maps.google.com/maps?q=Av.+Balmaceda+1644,+La+Serena,+Coquimbo,+Chile&output=embed"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade"
              title="Ubicación de Rapid Transfer en La Serena"></iframe>
    </div>
  </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
