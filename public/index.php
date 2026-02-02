<?php
include __DIR__ . "/components/config.php";

// Meta
$title = "GloneLaw — Trusted Corporate, Family & Immigration Legal Services in Ghana";
$description = "GloneLaw provides expert Corporate, Family, Criminal, Immigration and Intellectual Property legal services in Ghana.";
$keywords = "law firm ghana, lawyer accra, corporate law ghana, criminal lawyer ghana";
$canonical = $site_url . "/";
$og_title = "GloneLaw — Trusted Legal Services in Ghana";
$og_description = "Expert legal services for individuals and businesses in Ghana.";
$og_image = $site_url . "/assets/images/og-image.jpg";

// Include header and nav
include __DIR__ . "/components/header.php";
include __DIR__ . "/components/nav.php";
include __DIR__ . '/components/breadcrumbs.php';

?>

<!-- Hero Slider -->
<section id="hero-slider" class="swiper-container">
  <div class="swiper-wrapper">
    <?php
    $slides = [
      ["Slide One Title", "This is the description for Slide One.", "Learn More"],
      ["Slide Two Title", "This is the description for Slide Two.", "Discover"],
      ["Slide Three Title", "This is the description for Slide Three.", "Get Started"],
      ["Slide Four Title", "This is the description for Slide Four.", "Contact Us"]
    ];

    foreach ($slides as $slide):
    ?>
      <div class="swiper-slide">
        <div class="slide-bg">
          <img src="./assets/images/slider/slider4.jpg" alt="<?= $slide[0] ?>" />
          <div class="overlay"></div>
        </div>
        <div class="slide-content-wrapper">
          <div class="slide-content">
            <h2 class="slide-title"><?= $slide[0] ?></h2>
            <p class="slide-desc"><?= $slide[1] ?></p>
            <a href="#" class="btn primary slide-btn"><?= $slide[2] ?></a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Pagination & Navigation -->
  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</section>

<main class="container">

  <!-- Hero Section -->
  <section class="hero">
    <h1>Trusted Legal Solutions in Ghana</h1>
    <p>Expert legal support in corporate, family, criminal, immigration and IP law.</p>
    <a href="/contact" class="btn primary">Book Consultation</a>
  </section>

  <!-- Services Section -->
  <section class="services">
    <h2>Our Legal Services</h2>
    <div class="cards-grid">
      <?php
      $services = [
        ["Corporate Law", "Contracts, compliance, governance & M&A.", "/practice-area/corporate-law"],
        ["Family Law", "Divorce, custody, wills and mediation.", "/practice-area/family-law"],
        ["Criminal Law", "Strong criminal defense representation.", "/practice-area/criminal-law"],
        ["Immigration", "Visas, residency & work permits.", "/practice-area/immigration-law"]
      ];

      foreach ($services as $service):
      ?>
        <article class="service-card">
          <h3><a href="<?= $service[2] ?>"><?= $service[0] ?></a></h3>
          <p><?= $service[1] ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

</main>

<?php include __DIR__ . "/components/footer.php"; ?>


