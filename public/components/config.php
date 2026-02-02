<?php
/* ============================
   Site Information
============================ */
$site_name = "City Hospital";
$phone     = "+233 000 000 000";
$email     = "info@cityhospital.com";

/* ============================
   Environment Detection
   Local:  /public
   Live:   /public_html
============================ */
if (strpos($_SERVER['DOCUMENT_ROOT'], 'public_html') !== false) {
    // Production server (cPanel)
    define('BASE_URL', '/');
} else {
    // Localhost (XAMPP, MAMP, etc.)
    define('BASE_URL', '/public/');
}

/* ============================
   Full Site URL
============================ */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$site_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . BASE_URL;

/* ============================
   Helper Functions
============================ */

/**
 * Get full URL for assets (CSS, JS, images)
 * Usage: <img src="<?= asset('images/slider/slider.jpg') ?>" />
 */
function asset($path) {
    global $site_url;
    return rtrim($site_url, '/') . '/' . ltrim($path, '/');
}

/**
 * Get full URL for links
 * Usage: <a href="<?= url('services/cardiology') ?>">Cardiology</a>
 */
function url($path = '') {
    global $site_url;
    return rtrim($site_url, '/') . '/' . ltrim($path, '/');
}
