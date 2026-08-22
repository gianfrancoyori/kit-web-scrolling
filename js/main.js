/* Rapid Transfer — JS común a todas las páginas.
   Cada bloque comprueba que sus nodos existan: el archivo es único para el sitio.
   Lo específico de una página vive en su propio archivo (home.js, contacto.js). */
(function () {
  'use strict';

  /* ── Conversiones GA4 + Google Ads ──
     Disponible globalmente: contacto.js la llama al enviar el formulario. */
  window.registrarConversion = function (tipo) {
    if (typeof gtag !== 'function') return;
    gtag('event', 'contacto_' + tipo, { event_category: 'conversion', transport_type: 'beacon' });
    if (window.ADS_CONVERSION_LABEL) {
      gtag('event', 'conversion', { send_to: window.ADS_CONVERSION_LABEL, transport_type: 'beacon' });
    }
  };
  document.addEventListener('click', function (e) {
    var enlace = e.target.closest('a[data-conversion]');
    if (enlace) window.registrarConversion(enlace.dataset.conversion);
  });

  /* ── Navbar: transparente sobre el héroe, sólida al hacer scroll ── */
  var navbar = document.getElementById('navbar');
  var progress = document.getElementById('progress');
  var ticking = false;

  function alScrollear() {
    if (navbar) {
      navbar.classList.toggle('is-solid', window.scrollY > 24 || navbar.classList.contains('menu-open'));
    }
    if (progress) {
      var total = document.documentElement.scrollHeight - window.innerHeight;
      progress.style.width = total > 0 ? (window.scrollY / total * 100) + '%' : '0%';
    }
    ticking = false;
  }
  window.addEventListener('scroll', function () {
    if (!ticking) { requestAnimationFrame(alScrollear); ticking = true; }
  }, { passive: true });
  alScrollear();

  /* ── Menú móvil ── */
  var hamburger = document.getElementById('hamburger');
  var navMenu = document.getElementById('navMenu');
  function cerrarMenu() {
    if (!hamburger || !navMenu) return;
    hamburger.classList.remove('open');
    navMenu.classList.remove('open');
    if (navbar) navbar.classList.remove('menu-open');
    hamburger.setAttribute('aria-expanded', 'false');
    hamburger.setAttribute('aria-label', 'Abrir menú');
    document.body.style.overflow = '';
    alScrollear();
  }
  if (hamburger && navMenu) {
    hamburger.addEventListener('click', function () {
      var abierto = navMenu.classList.toggle('open');
      hamburger.classList.toggle('open', abierto);
      if (navbar) navbar.classList.toggle('menu-open', abierto);
      hamburger.setAttribute('aria-expanded', String(abierto));
      hamburger.setAttribute('aria-label', abierto ? 'Cerrar menú' : 'Abrir menú');
      document.body.style.overflow = abierto ? 'hidden' : '';
      alScrollear();
    });
    navMenu.addEventListener('click', function (e) {
      if (e.target.closest('a')) cerrarMenu();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') cerrarMenu();
    });
  }

  /* ── Toggle del dropdown de líneas (móvil y teclado) ── */
  document.querySelectorAll('.drop-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var li = btn.closest('li');
      var abierto = li.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(abierto));
    });
  });

  /* ── Revelado progresivo ── */
  var revelables = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  if (revelables.length && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entradas) {
      entradas.forEach(function (en) {
        if (en.isIntersecting) {
          var delay = en.target.dataset.delay;
          if (delay) en.target.style.transitionDelay = delay + 'ms';
          en.target.classList.add('in');
          io.unobserve(en.target);
        }
      });
    }, { threshold: 0.1 });
    revelables.forEach(function (el) { io.observe(el); });
  } else {
    revelables.forEach(function (el) { el.classList.add('in'); });
  }

  /* ── Contadores (el valor real ya está en el HTML) ── */
  var contadores = document.querySelectorAll('[data-contador]');
  if (contadores.length && 'IntersectionObserver' in window &&
      !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var ioC = new IntersectionObserver(function (entradas) {
      entradas.forEach(function (en) {
        if (!en.isIntersecting) return;
        var el = en.target, hasta = +el.dataset.contador, t0 = performance.now(), dur = 1600;
        (function tick(t) {
          var p = Math.min((t - t0) / dur, 1);
          el.textContent = Math.round((1 - Math.pow(1 - p, 3)) * hasta);
          if (p < 1) requestAnimationFrame(tick);
        })(t0);
        ioC.unobserve(el);
      });
    }, { threshold: 0.6 });
    contadores.forEach(function (el) { ioC.observe(el); });
  }

  /* ── FAQ accesible ── */
  document.querySelectorAll('.faq-q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      var panel = document.getElementById(btn.getAttribute('aria-controls'));
      var abierto = item.classList.toggle('open');
      btn.setAttribute('aria-expanded', String(abierto));
      if (panel) panel.hidden = !abierto;
    });
  });

  /* ── Scrollspy de la barra de líneas (ropa corporativa) ── */
  var tabs = document.querySelectorAll('.cat-tab[href^="#"]');
  if (tabs.length && 'IntersectionObserver' in window) {
    var porId = {};
    tabs.forEach(function (t) { porId[t.getAttribute('href').slice(1)] = t; });
    var ioT = new IntersectionObserver(function (entradas) {
      entradas.forEach(function (en) {
        if (en.isIntersecting && porId[en.target.id]) {
          tabs.forEach(function (t) { t.classList.remove('active'); });
          porId[en.target.id].classList.add('active');
        }
      });
    }, { rootMargin: '-40% 0px -55% 0px' });
    Object.keys(porId).forEach(function (id) {
      var sec = document.getElementById(id);
      if (sec) ioT.observe(sec);
    });
  }

  /* ── Imágenes externas que fallan: ocultar su contenedor ── */
  document.addEventListener('error', function (e) {
    var img = e.target;
    if (img.tagName === 'IMG' && img.closest('[data-ocultar-si-falla]')) {
      img.closest('[data-ocultar-si-falla]').style.display = 'none';
    }
  }, true);
})();
