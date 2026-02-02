<?php
include __DIR__ . "/../components/config.php";

/* ============================
   SEO Meta
============================ */
$title = "Our Medical Services — GloneHospital Ghana";
$description = "Explore all medical services offered at GloneHospital including cardiology, pediatrics, orthopedics, maternity, neurology, and more.";
$keywords = "hospital services Ghana, medical services, cardiology Ghana, pediatrics Ghana";
$canonical = $site_url . "services";

include __DIR__ . "/../components/header.php";
include __DIR__ . "/../components/nav.php";

/* ============================
   Load Services
============================ */
$services = json_decode(
    file_get_contents(__DIR__ . '/../json/services.json'),
    true
);
?>

<?php
/* ============================
   Page Hero
============================ */
$hero_title = "Our Medical Services";
$hero_subtitle = "Comprehensive healthcare solutions tailored to your needs";
$hero_bg = asset("assets/images/services/slider5.jpg");

include __DIR__ . "/../components/page-hero.php";
?>

<main class="container">

<section class="all-services section-padding">
  <div class="container">

    <header class="section-header text-center">
      <h1>Healthcare Services at GloneHospital</h1>
      <p>
        We provide specialized medical care using modern technology
        and experienced healthcare professionals.
      </p>
    </header>

    <div class="services-grid grid grid-3 gap-6">
      <?php foreach ($services as $service): ?>
        <?php include __DIR__ . '/../pages/service-card.php'; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

</main>

<?php include __DIR__ . "/../components/footer.php"; ?>
