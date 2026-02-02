<?php
include __DIR__ . "/components/config.php";

// Meta
$title = "Our Services — GloneHospital: Trusted Healthcare in Ghana";
$description = "Explore the full range of healthcare services and medical specialties offered by GloneHospital in Ghana.";
$keywords = "hospital services Ghana, medical specialties Ghana, GloneHospital services";
$canonical = $site_url . "/services";
$og_title = "GloneHospital Services";
$og_description = "Discover GloneHospital's complete healthcare services and specialties in Ghana.";
$og_image = $site_url . "/assets/images/og-image-services.jpg";

// Include header and nav
include __DIR__ . "/components/header.php";
include __DIR__ . "/components/nav.php";

// Load services
$services = json_decode(file_get_contents(__DIR__ . '/json/services.json'), true);
?>

<!-- Page Hero -->
<?php
$hero_title = "Our Services";
$hero_subtitle = "Comprehensive healthcare services and medical specialties";
$hero_bg = "/assets/images/slider/slider.jpg";
include __DIR__ . "/components/page-hero.php";
?>

<main class="container">

<!-- Full Services Section -->
<section class="all-services section-padding">
  <div class="container">
    <header class="section-header text-center">
      <h2>Our Services</h2>
      <p>Explore all the services we provide at GloneHospital.</p>
    </header>

    <div class="services-grid grid grid-3 gap-6">
      <?php foreach ($services as $service): ?>
        <?php include __DIR__ . '/pages/service-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
</main>

<!-- Personal Health Plan Banner -->
<section class="health-plan-banner section-padding">
  <div class="container">
    <div class="banner-content">
      <h2>Need a Personalized Health Plan?</h2>
      <p>
        Take control of your well-being with a tailored plan created just for you. 
        Our experts will assess your health and provide guidance for a healthier life.
      </p>
      <a href="/request-plan" class="btn btn-primary">Request Your Plan</a>
    </div>
    <!-- Optional overlay icon -->
    <div class="banner-icon">
      <img src="./assets/images/icons/health-icon.png" alt="Health Icon">
    </div>
  </div>
</section>


<!-- Call to Action -->
<section class="cta-section section-padding">
  <div class="cta-grid grid grid-2">
    <div class="cta-box appointment">
      <div class="cta-overlay"></div>
      <div class="cta-content">
        <h2>Book an Appointment</h2>
        <p>Schedule a consultation with our expert medical team today.</p>
        <a href="/appointment" class="btn btn-primary">Book Appointment</a>
      </div>
    </div>

    <div class="cta-box emergency">
      <div class="cta-overlay"></div>
      <div class="cta-content">
        <h2>Emergency Care</h2>
        <p>Immediate medical assistance when every second matters.</p>
        <a href="tel:+14654545" class="btn btn-outline">+1-465-4545</a>
      </div>
    </div>
  </div>
</section>


<?php include __DIR__ . "/components/footer.php"; ?>
