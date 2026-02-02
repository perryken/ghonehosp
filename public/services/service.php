<?php
include __DIR__ . "/../components/config.php";

/*
|--------------------------------------------------------------------------
| Load services data
|--------------------------------------------------------------------------
*/
$services = json_decode(
    file_get_contents(__DIR__ . "/../json/services.json"),
    true
);

/*
|--------------------------------------------------------------------------
| Get service slug from URL
| Example: /services/cardiology → cardiology
|--------------------------------------------------------------------------
*/
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$slug = basename($path);

/*
|--------------------------------------------------------------------------
| Find matching service
|--------------------------------------------------------------------------
*/
$service = null;

foreach ($services as $s) {
    if ($s['slug'] === $slug) {
        $service = $s;
        break;
    }
}

/*
|--------------------------------------------------------------------------
| Handle 404
|--------------------------------------------------------------------------
*/
if (!$service) {
    header("HTTP/1.0 404 Not Found");
    $title = "Service Not Found — GloneHospital";
    include __DIR__ . "/../components/header.php";
    include __DIR__ . "/../components/nav.php";
    ?>
    <main class="container section-padding">
        <h1>404 — Service Not Found</h1>
        <p>The requested service does not exist.</p>
        <a href="<?= $site_url ?>/services" class="btn btn-primary">Back to Services</a>
    </main>
    <?php
    include __DIR__ . "/../components/footer.php";
    exit;
}

/*
|--------------------------------------------------------------------------
| SEO Meta
|--------------------------------------------------------------------------
*/
$title       = $service['title'] . " — GloneHospital";
$description = $service['description'];
$keywords    = $service['seo']['keywords'] ?? '';
$canonical   = $site_url . "/services/" . $service['slug'];

$og_title       = $title;
$og_description = $description;
$og_image       = $site_url . "/" . ltrim($service['image'], '/');

/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
*/
include __DIR__ . "/../components/header.php";
include __DIR__ . "/../components/nav.php";

/*
|--------------------------------------------------------------------------
| Page Hero
|--------------------------------------------------------------------------
*/
$hero_title    = $service['title'];
$hero_subtitle = $service['shortDescription'] ?? $service['description'];
$hero_bg       = asset($service['image']);
include __DIR__ . "/../components/page-hero.php";
?>

<main class="container section-padding">

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="<?= $site_url ?>">Home</a> &raquo;
        <a href="<?= $site_url ?>/services">Services</a> &raquo;
        <span><?= htmlspecialchars($service['title']) ?></span>
    </nav>

    <!-- Service Content -->
    <section class="service-detail">

        <div class="service-image">
            <img
                src="<?= asset($service['image']) ?>"
                alt="<?= htmlspecialchars($service['title']) ?>"
                loading="lazy"
            >
        </div>

        <div class="service-content">
            <h2><?= htmlspecialchars($service['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($service['description'])) ?></p>
        </div>

    </section>

    <div class="text-center mt-6">
        <a href="<?= $site_url ?>/services" class="btn btn-primary">
            View All Services
        </a>
    </div>

</main>

<?php include __DIR__ . "/../components/footer.php"; ?>
