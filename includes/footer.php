<?php
declare(strict_types=1);
/** Footer compartido. La página ya cerró su <main>. */
?>
<footer class="site-footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <img src="/assets/img/logo-rapidtransfer-cuadrado.webp" alt="" width="160" height="160" loading="lazy" decoding="async">
      <p>Soluciones en bordado, estampado y ropa corporativa en La Serena. Más de 20 años de experiencia.</p>
    </div>
    <div class="footer-col">
      <h2 class="footer-col-title">Servicios</h2>
      <ul>
        <li><a href="/bordados">Bordados</a></li>
        <li><a href="/estampados">Estampados</a></li>
        <li><a href="/ropa-corporativa">Ropa Corporativa</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h2 class="footer-col-title">Empresa</h2>
      <ul>
        <li><a href="/nosotros">Nosotros</a></li>
        <li><a href="/contacto">Contacto</a></li>
        <li><a href="/contacto">Cotizar ahora</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h2 class="footer-col-title">Contacto</h2>
      <div class="footer-contact-item"><span aria-hidden="true">📍</span> Av. Balmaceda 1644, La Serena</div>
      <div class="footer-contact-item"><span aria-hidden="true">📞</span> <a href="tel:+56998180613" data-conversion="telefono">+56 9 9818 0613</a></div>
      <div class="footer-contact-item"><span aria-hidden="true">✉️</span> <a href="mailto:contacto@rapidtransfer.cl" data-conversion="email">contacto@rapidtransfer.cl</a></div>
      <div class="footer-contact-item"><span aria-hidden="true">🕑</span> Lun–Vie · 10:00 a 16:00</div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-copy">© <?= date('Y') ?> Rapid Transfer. Todos los derechos reservados.</div>
    <div class="footer-social">
      <a href="https://www.instagram.com/rapidtransfer.cl" class="soc-link" aria-label="Instagram (abre en ventana nueva)" target="_blank" rel="noopener"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
      <a href="https://www.linkedin.com/company/RapidTransfer" class="soc-link" aria-label="LinkedIn (abre en ventana nueva)" target="_blank" rel="noopener"><svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg></a>
    </div>
  </div>
</footer>

<script src="/js/main.js?v=<?= filemtime(__DIR__ . '/../js/main.js') ?>" defer></script>
<?php if (!empty($page_js)): ?>
<script src="/js/<?= sanitizar($page_js) ?>?v=<?= filemtime(__DIR__ . '/../js/' . $page_js) ?>" defer></script>
<?php endif; ?>
</body>
</html>
