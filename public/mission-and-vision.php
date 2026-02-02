<?php
include __DIR__ . "/components/config.php";

$title = "About Us — GloneHospital: Trusted Healthcare in Ghana";
$description = "Learn about GloneHospital, our history, mission, vision, and dedicated medical team providing excellent healthcare in Ghana.";
$keywords = "about GloneHospital, hospital Ghana, medical team, healthcare Ghana, our mission vision";
$canonical = $site_url . "/about-us";
$og_title = "About GloneHospital";
$og_description = "Discover GloneHospital's history, mission, vision, and healthcare services.";
$og_image = $site_url . "/assets/images/og-image-about.jpg";

include __DIR__ . "/components/header.php";
include __DIR__ . "/components/nav.php";
?>

<main class="container">

<!-- Page Hero -->
<section class="page-hero" style="background: url('./assets/images/about-hero.jpg') center/cover no-repeat; padding: 100px 0; color:#fff; text-align:center;">
    <h1>About GloneHospital</h1>
    <p>Committed to providing world-class healthcare in Ghana</p>
</section>

<!-- Our History -->
<section class="about-history section-padding">
    <div class="container">
        <h2>Our History</h2>
        <p>
            GloneHospital was founded with a vision to provide comprehensive healthcare services to the people of Ghana.
            Over the years, we have grown into a trusted institution known for excellence, innovation, and patient-centered care.
        </p>
    </div>
</section>

<!-- Mission & Vision -->
<section class="about-mission-vision section-padding" style="background:#f9f9f9;">
    <div class="container">
        <div class="grid-2">
            <div>
                <h2>Our Mission</h2>
                <p>
                    To deliver high-quality, accessible, and compassionate healthcare services that improve the health and well-being of our community.
                </p>
            </div>
            <div>
                <h2>Our Vision</h2>
                <p>
                    To be the leading healthcare provider in Ghana recognized for excellence, innovation, and patient-centered care.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Team / Doctors -->
<section class="about-team section-padding">
    <div class="container">
        <h2>Meet Our Doctors</h2>
        <div class="cards-grid">
            <div class="card">
                <img src="./assets/images/doctors/doctor1.jpg" alt="Dr. John Doe">
                <h3>Dr. John Doe</h3>
                <p>Cardiology Specialist</p>
            </div>
            <div class="card">
                <img src="./assets/images/doctors/doctor2.jpg" alt="Dr. Jane Smith">
                <h3>Dr. Jane Smith</h3>
                <p>Neurology Specialist</p>
            </div>
            <div class="card">
                <img src="./assets/images/doctors/doctor3.jpg" alt="Dr. Mark Lee">
                <h3>Dr. Mark Lee</h3>
                <p>Orthopedics Specialist</p>
            </div>
            <div class="card">
                <img src="./assets/images/doctors/doctor4.jpg" alt="Dr. Sarah Johnson">
                <h3>Dr. Sarah Johnson</h3>
                <p>Pediatrics Specialist</p>
            </div>
        </div>
    </div>
</section>

</main>

<?php
include __DIR__ . "/components/footer.php";
?>
