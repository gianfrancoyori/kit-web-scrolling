<?php
declare(strict_types=1);

/**
 * Configuración del sitio.
 * Copiar como config.php y completar. config.php NUNCA se versiona.
 */

define('SITE_NAME', 'Rapid Transfer');
define('SITE_URL', 'https://www.rapidtransfer.cl');
define('BUSINESS_ADDRESS', 'Av. Balmaceda 1644, La Serena');
define('BUSINESS_PHONE', '+56998180613');
define('BUSINESS_PHONE_HUMAN', '+56 9 9818 0613');
define('BUSINESS_EMAIL', 'contacto@rapidtransfer.cl');

// Web3Forms (envío del formulario por correo)
define('WEB3FORMS_KEY', '');

// CRM Rapid Transfer (webhook de leads)
define('CRM_WEBHOOK_URL', '');
define('CRM_WEBHOOK_TOKEN', '');

// Google (analytics / ads)
define('GA4_ID', 'G-82C0MRLZRQ');
define('ADS_ID', 'AW-18153789708');
// Etiqueta de conversión de Google Ads (formato AW-XXXX/label). Vacío = no se dispara.
define('ADS_CONVERSION_LABEL', '');

define('ENVIRONMENT', 'production'); // 'development' | 'production'

if (ENVIRONMENT === 'development') {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
}

date_default_timezone_set('America/Santiago');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
