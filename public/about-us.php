<?php
include __DIR__ . "/components/config.php";

// Meta
$title = "About Us — GloneHospital: Trusted Healthcare in Ghana";
$description = "Learn about GloneHospital, our history, mission, vision, and dedicated medical team providing excellent healthcare in Ghana.";
$keywords = "about GloneHospital, hospital Ghana, medical team, healthcare Ghana, mission vision";
$canonical = url("about-us");
$og_title = "About GloneHospital";
$og_description = "Discover GloneHospital's history, mission, vision, and healthcare services.";
$og_image = asset("assets/images/og-image-about.jpg");

// Header & Navigation
include __DIR__ . "/components/header.php";
include __DIR__ . "/components/nav.php";
?>

<!-- Page Hero -->
<?php
$hero_title = "About GloneHospital";
$hero_subtitle = "Committed to providing world-class healthcare in Ghana";
$hero_bg = asset("assets/images/slider/slider.jpg");
include __DIR__ . "/components/page-hero.php";
?>

<main class="container">

<!-- Our History -->
<section class="about-history section-padding">
  <h1>Leading Private Hospital in Ghana Delivering World-Class Healthcare Services</h1>

  <div class="container about-grid">
    <div class="about-image">
      <img src="<?= asset('/assets/images/slider/slider.jpg') ?>" alt="GloneHospital history">
    </div>

    <div class="about-content">
      <h2>Our History & Commitment to Excellence</h2>
      <p>
        GloneHospital was established with a clear mission: to deliver high-quality,
        patient-centered healthcare services to individuals and families across Ghana.
      </p>
      <p>
        Today, GloneHospital stands as a symbol of reliability, safety, and excellence
        in healthcare delivery through advanced medical technology and compassionate care.
      </p>
    </div>
  </div>
</section>

<!-- Mission & Vision -->
<section class="about-mission-vision section-padding">
  <div class="grid grid-2">

    <div class="mission">
      <div class="img_m">
        <img src="<?= asset('/assets/images/slider/slider.jpg') ?>" alt="GloneHospital mission">
      </div>
      <h2>Our Mission</h2>
      <p>
        To deliver high-quality, accessible, and compassionate healthcare services
        that improve the health and well-being of our community.
      </p>
    </div>

    <div class="vision">
      <div class="img_m">
        <img src="<?= asset('/assets/images/slider/slider.jpg') ?>" alt="GloneHospital vision">
      </div>
      <h2>Our Vision</h2>
      <p>
        To be the leading healthcare provider in Ghana recognized for excellence,
        innovation, and patient-centered care.
      </p>
    </div>

  </div>
</section>

<?php
// Doctors
$doctors = json_decode(file_get_contents(__DIR__ . '/json/doctors.json'), true);
?>

<section class="about-team section-padding">
  <div class="container">

    <header class="section-header text-center">
      <h2>Meet Our Medical Team</h2>
      <p>
        Our specialists are dedicated to delivering exceptional medical care
        with professionalism, compassion, and integrity.
      </p>
    </header>

    <div class="swiper team-slider">
      <div class="swiper-wrapper">
        <?php foreach ($doctors as $doctor): ?>
          <?php include __DIR__ . '/pages/doctor-card.php'; ?>
        <?php endforeach; ?>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <?php include __DIR__ . '/pages/doctor-modal.php'; ?>
  </div>
</section>

<?php
$services = json_decode(file_get_contents(__DIR__ . '/json/services.json'), true);
$about_services = array_slice($services, 0, 5);
?>

<section class="about-services section-padding">
  <div class="container">

    <header class="section-header text-center">
      <h2>Our Specialties</h2>
      <p>High-level medical services we provide at GloneHospital.</p>
    </header>

    <div class="swiper services-slider">
      <div class="swiper-wrapper">
        <?php foreach ($about_services as $service): ?>
          <div class="swiper-slide">
            <?php include __DIR__ . '/pages/service-card.php'; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <div class="text-center mt-6">
      <a href="<?= url('services') ?>" class="btn btn-primary">View All Services</a>
    </div>

  </div>
</section>
</main>
<?php
$testimonials = json_decode(file_get_contents(__DIR__ . '/json/testimonials.json'), true);
?>

<section class="testimonials section-padding">
  <div class="container">

    <header class="section-header text-center">
      <h2>What Our Patients Say</h2>
      <p>Real experiences from people who trust GloneHospital.</p>
    </header>

    <div class="swiper testimonial-slider">
      <div class="swiper-wrapper">
        <?php foreach ($testimonials as $testimonial): ?>
          <?php include __DIR__ . '/pages/testimonial-card.php'; ?>
        <?php endforeach; ?>
      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-grid grid grid-2">

    <div class="cta-box appointment">
      <div class="cta-overlay"></div>
      <div class="cta-content">
        <h2>We Are Here for You</h2>
        <p>Book an appointment with our medical professionals today.</p>
        <a href="<?= url('appointment') ?>" class="btn btn-primary">Book Appointment</a>
      </div>
    </div>

    <div class="cta-box emergency">
      <div class="cta-overlay"></div>
      <div class="cta-content">
        <h2>Emergency Medical Care</h2>
        <p>Immediate medical assistance when every second matters.</p>
        <a href="tel:<?= $phone ?>" class="btn btn-outline"><?= $phone ?></a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . "/components/footer.php"; ?>
