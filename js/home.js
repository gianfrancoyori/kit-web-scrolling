/**
 * Portada: rotación de imágenes del hero.
 * La 2ª diapositiva se descarga después de la carga para no competir con el LCP.
 * La rotación se detiene si la pestaña no está visible o si se pidió menos movimiento.
 */
(function () {
  'use strict';

  var slides = document.querySelectorAll('.hero-slide');
  if (slides.length < 2) return;

  /* Carga diferida de las diapositivas siguientes */
  function cargarDiferidas() {
    document.querySelectorAll('.hero-slide[data-slide-diferida]').forEach(function (slide) {
      var source = slide.querySelector('source');
      var img = slide.querySelector('img');
      if (source && slide.dataset.srcMovil) source.srcset = slide.dataset.srcMovil;
      if (img && slide.dataset.src) img.src = slide.dataset.src;
      slide.removeAttribute('data-slide-diferida');
    });
  }
  if (document.readyState === 'complete') cargarDiferidas();
  else window.addEventListener('load', cargarDiferidas);

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  var actual = 0;
  var timer = null;

  function avanzar() {
    slides[actual].classList.remove('active');
    actual = (actual + 1) % slides.length;
    slides[actual].classList.add('active');
  }

  function iniciar() { if (!timer) timer = setInterval(avanzar, 5000); }
  function detener() { clearInterval(timer); timer = null; }

  document.addEventListener('visibilitychange', function () {
    document.hidden ? detener() : iniciar();
  });

  iniciar();
})();
