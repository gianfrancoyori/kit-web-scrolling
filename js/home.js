/**
 * Portada: rotación de imágenes del hero.
 * Se detiene cuando la pestaña no está visible o si se pidió menos movimiento.
 */
(function () {
  'use strict';

  var slides = document.querySelectorAll('.hero-slide');
  if (slides.length < 2) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  var actual = 0;
  var timer  = null;

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
