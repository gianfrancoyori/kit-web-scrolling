/**
 * Formulario de cotización: valida en el navegador y envía al endpoint del servidor,
 * que es quien conoce las credenciales de correo y del CRM.
 */
(function () {
  'use strict';

  var form = document.getElementById('quoteForm');
  if (!form) return;

  var boton     = form.querySelector('.form-submit');
  var alerta    = document.getElementById('formAlert');
  var contenido = document.getElementById('formContent');
  var exito     = document.getElementById('formSuccess');
  var reinicio  = document.getElementById('formReset');
  var textoBoton = boton.textContent;

  function limpiarErrores() {
    alerta.hidden = true;
    alerta.textContent = '';
    form.querySelectorAll('.field-error').forEach(function (p) { p.textContent = ''; });
    form.querySelectorAll('[aria-invalid]').forEach(function (c) { c.removeAttribute('aria-invalid'); });
  }

  function marcarError(campo, mensaje) {
    var p = document.getElementById('error-' + campo);
    if (p) p.textContent = mensaje;
    var input = document.getElementById(campo);
    if (input) input.setAttribute('aria-invalid', 'true');
  }

  function mostrarErrores(errores) {
    var primero = null;
    Object.keys(errores).forEach(function (campo) {
      marcarError(campo, errores[campo]);
      if (!primero) primero = document.getElementById(campo);
    });
    if (primero) primero.focus();
  }

  function validar() {
    var errores = {};
    var nombre   = form.nombre.value.trim();
    var telefono = form.telefono.value.trim();
    var email    = form.email.value.trim();

    if (nombre.length < 2) errores.nombre = 'Indícanos tu nombre.';
    if (telefono.replace(/\D+/g, '').length < 8) errores.telefono = 'Escribe un teléfono válido (ej: +56 9 1234 5678).';
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email)) errores.email = 'Ese correo no parece válido.';
    if (!form.servicio.value) errores.servicio = 'Selecciona el servicio que necesitas.';
    if (!form.privacy.checked) errores.privacy = 'Necesitamos tu autorización para contactarte.';

    return errores;
  }

  form.addEventListener('submit', async function (e) {
    e.preventDefault();
    limpiarErrores();

    var errores = validar();
    if (Object.keys(errores).length) {
      mostrarErrores(errores);
      return;
    }

    boton.disabled = true;
    boton.textContent = 'Enviando…';

    var datos = {
      csrf:     form.csrf.value,
      botcheck: form.botcheck.value,
      nombre:   form.nombre.value.trim(),
      empresa:  form.empresa.value.trim(),
      telefono: form.telefono.value.trim(),
      email:    form.email.value.trim(),
      servicio: form.servicio.value,
      cantidad: form.cantidad.value,
      plazo:    form.plazo.value,
      mensaje:  form.mensaje.value.trim(),
      privacy:  form.privacy.checked
    };

    try {
      var respuesta = await fetch(form.action, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(datos),
        signal: AbortSignal.timeout(20000)
      });

      var cuerpo = await respuesta.json().catch(function () { return {}; });

      if (respuesta.ok && cuerpo.ok) {
        contenido.hidden = true;
        exito.hidden = false;
        document.getElementById('successTitle').focus();
        if (typeof window.registrarConversion === 'function') {
          window.registrarConversion('formulario');
        }
        return;
      }

      if (cuerpo.errores) {
        mostrarErrores(cuerpo.errores);
      } else {
        alerta.textContent = cuerpo.error || 'No pudimos enviar tu solicitud. Inténtalo de nuevo o escríbenos por WhatsApp.';
        alerta.hidden = false;
      }
    } catch (error) {
      alerta.textContent = 'Se interrumpió la conexión. Revisa tu internet e inténtalo otra vez, o escríbenos por WhatsApp.';
      alerta.hidden = false;
    } finally {
      boton.disabled = false;
      boton.textContent = textoBoton;
    }
  });

  if (reinicio) {
    reinicio.addEventListener('click', function () {
      form.reset();
      limpiarErrores();
      exito.hidden = true;
      contenido.hidden = false;
      form.nombre.focus();
    });
  }
})();
