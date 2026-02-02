<?php
// ============================
// Safety fallbacks
// ============================
$title          = $title          ?? "City Hospital | Trusted Healthcare in Ghana";
$description    = $description    ?? "City Hospital provides professional, patient-centered healthcare services in Ghana.";
$keywords       = $keywords       ?? "hospital Ghana, healthcare Ghana, medical services Ghana";
$canonical      = $canonical      ?? $site_url;
$og_title       = $og_title       ?? $title;
$og_description = $og_description ?? $description;
$og_image       = $og_image       ?? asset('assets/images/og-image.jpg');
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Basic Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= htmlspecialchars($title) ?></title>

  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Favicon -->
  <link rel="icon" href="<?= asset('assets/images/logo.webp') ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($og_title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($og_description) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($og_title) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($og_description) ?>">
  <meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

  <!-- Performance -->
  <link rel="preload" href="<?= asset('assets/images/slider/slider4.jpg') ?>" as="image" fetchpriority="high">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= asset('assets/css/main.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/responsive.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/vendor/swiper-bundle.min.css') ?>">

</head>
<body>
