<?php
// nav.php
// Assumes config.php is already included before this file
?>

<!-- =========================
  Top Header
========================= -->
<section id="head-top">
  <div class="header-top container">

    <div class="contact-mini">
      <a href="tel:<?= htmlspecialchars($phone) ?>">
        <i class="fa-solid fa-phone"></i> <?= htmlspecialchars($phone) ?>
      </a>

      <a href="mailto:<?= htmlspecialchars($email) ?>">
        <i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($email) ?>
      </a>

      <span class="office-hours">
        <i class="fa-solid fa-clock"></i> Mon–Sat: 7am – 8pm
      </span>
    </div>

    <div class="social-mini">
      <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
      <a href="#" aria-label="Twitter / X"><i class="fa-brands fa-x"></i></a>
      <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
      <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>

  </div>
</section>

<!-- =========================
  Main Header
========================= -->
<header class="site-header">
  <div class="header-inner container">

    <!-- Logo -->
    <div class="logo">
      <a href="<?= url() ?>">
        <img
          src="<?= asset('assets/images/logo/logo.png') ?>"
          alt="<?= htmlspecialchars($site_name) ?> Logo"
          loading="eager"
        >
      </a>
    </div>

    <!-- Navigation -->
    <nav class="site-nav" aria-label="Main Navigation">
      <ul class="menu" id="primary-menu">

        <li>
          <a href="<?= url() ?>" class="nav-link">Home</a>
        </li>

        <!-- About -->
        <li class="has-sub">
          <span class="nav-link">About Us ▾</span>
          <ul class="sub">
            <li><a href="<?= url('about-us') ?>">Our History</a></li>
            <li><a href="<?= url('mission-and-vision') ?>">Mission & Vision</a></li>
            <li><a href="<?= url('doctors') ?>">Our Doctors</a></li>
            <li><a href="<?= url('patients') ?>">Patient Info</a></li>
          </ul>
        </li>

        <!-- Departments -->
        <li class="has-sub">
          <span class="nav-link">Departments ▾</span>
          <ul class="sub">
            <li><a href="<?= url('departments/cardiology') ?>">Cardiology</a></li>
            <li><a href="<?= url('departments/neurology') ?>">Neurology</a></li>
            <li><a href="<?= url('departments/orthopedics') ?>">Orthopedics</a></li>
            <li><a href="<?= url('departments/pediatrics') ?>">Pediatrics</a></li>
            <li><a href="<?= url('departments/oncology') ?>">Oncology</a></li>
            <li><a href="<?= url('departments/diagnostics') ?>">Diagnostics</a></li>
            <li><a href="<?= url('departments/emergency') ?>">Emergency Care</a></li>
            <li><a href="<?= url('departments/surgery') ?>">Surgical Services</a></li>
            <li><a href="<?= url('departments/rehabilitation') ?>">Rehabilitation</a></li>
          </ul>
        </li>

        <li>
          <a href="<?= url('blog') ?>" class="nav-link">Blog</a>
        </li>

        <li>
          <a href="<?= url('contact') ?>" class="btn small">Contact Us</a>
        </li>

        <li class="appBtn">
          <a href="<?= url('appointment') ?>" class="btn small">
            Book Appointment
          </a>
        </li>

      </ul>
    </nav>

    <!-- Controls -->
    <button id="dark-toggle" aria-label="Toggle dark mode">🌓</button>
    <button id="nav-toggle" aria-label="Toggle menu">☰</button>

  </div>
</header>
