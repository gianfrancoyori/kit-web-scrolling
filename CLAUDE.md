# Rapid Transfer — Sitio web

Sitio de Rapid Transfer (bordados, estampados y ropa corporativa, La Serena).
Producción: https://www.rapidtransfer.cl

Sigue el [estándar web de Facand](https://github.com/Facand/estandar-web): PHP + includes,
CSS en `css/`, JS en `js/`, credenciales fuera del repositorio, imágenes en WebP.

## Estructura

```
├── index.php  bordados.php  estampados.php
├── ropa-corporativa.php  nosotros.php  contacto.php  404.php
├── includes/
│   ├── config.php          Credenciales — NO se versiona (se genera en el deploy)
│   ├── config.example.php  Plantilla de configuración
│   ├── functions.php       Helpers: sanitizar, csrf, imagen, icono, jsonld_*
│   ├── header.php          head + analítica + sprite SVG + navbar
│   ├── footer.php          footer + carga de scripts
│   └── catalogo.php        Datos de las 11 líneas de ropa corporativa
├── api/enviar-cotizacion.php   Recibe el formulario; habla con Web3Forms y el CRM
├── css/  styles.css (base) + un archivo por página
├── js/   main.js (común) + un archivo por página
└── assets/img/  Imágenes optimizadas en WebP
```

## Reglas del proyecto

- **Nada de credenciales en el código.** Van en `includes/config.php` (git-ignored) y en
  GitHub Secrets. El navegador nunca ve la clave de Web3Forms ni la URL del CRM: el
  formulario habla con `api/enviar-cotizacion.php`, que reenvía desde el servidor.
- **Nunca dupliques el navbar ni el footer.** Están en `includes/`. La duplicación previa
  (6 copias a mano) causó un icono SVG corrupto, menús desincronizados y barras muertas.
- **Enlaces internos con barra inicial y sin extensión**: `/contacto`, `/ropa-corporativa#hi-vis`.
  El `.htaccess` redirige `.php`/`.html` a la URL limpia, así que usar la extensión provoca un 301.
- **Imágenes**: WebP redimensionado al tamaño real de uso, con `width`/`height` siempre
  (evita saltos de maquetación) y `loading="lazy"` salvo el logo del navbar y el héroe.
  Usa el helper `imagen()`. Convertir con `cwebp -q 75 -resize <ancho> 0 origen.png -o destino.webp`.
- **Sin GSAP ni librerías de animación.** El revelado usa las clases `reveal`,
  `reveal-left`, `reveal-right` (+ `data-delay`) que gestiona `js/main.js` con
  IntersectionObserver. El contenido debe ser visible sin JavaScript: nunca pongas
  `opacity:0` en el CSS base, solo bajo el prefijo `.js`.
- **Contraste**: para texto sobre navy usa `--on-dark-1/2/3`; para acentos sobre fondo
  claro usa `--accent-text` (`--accent` no alcanza 4.5:1 sobre blanco).
- **Emojis decorativos** siempre en `<span aria-hidden="true">`.
- **Conversiones**: añade `data-conversion="whatsapp|telefono|email"` a los enlaces de
  contacto; `js/main.js` dispara el evento de GA4 y de Google Ads.

## Deploy

Push a `main` → GitHub Actions valida la sintaxis PHP, genera `includes/config.php`
desde los secrets y sube por FTPS a `sitio45.sitiodns.net`.

Secrets necesarios: `FTP_PASSWORD`, `WEB3FORMS_KEY`, `CRM_WEBHOOK_URL`,
`CRM_WEBHOOK_TOKEN`, `ADS_CONVERSION_LABEL`.

El hosting arranca en PHP 5.4; el `.htaccess` fuerza PHP 8.2 con
`AddHandler application/x-httpd-ea-php82 .php`. No borres esa línea.

## Objetivo de rendimiento

PageSpeed Insights ≥ 90 en móvil y escritorio. Línea base antes de la
refactorización (ago-2026): 33 móvil / 73 escritorio, con LCP móvil de 33,9 s
causado por PNGs de hasta 2,7 MB y GSAP bloqueando el hilo principal.

## Pendientes conocidos

- Las 70 fotos del catálogo se sirven desde `tworldstore.cl` (dominio ajeno).
  Conviene autoalojarlas en WebP.
- Falta una página de política de privacidad (el formulario envía datos personales
  a dos terceros; aplica la Ley 21.719).
- El webhook del CRM acepta escrituras sin token: definir `CRM_WEBHOOK_TOKEN` y
  validarlo del lado del CRM.
