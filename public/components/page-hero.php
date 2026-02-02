
<section class="page-hero" style="background-image: url('<?= $hero_bg ?>');">
    <div class="page-hero-inner">
        <h1><?= htmlspecialchars($hero_title) ?></h1>
        <?php if ($hero_subtitle): ?>
            <p><?= htmlspecialchars($hero_subtitle) ?></p>
        <?php endif; ?>
        <?php include __DIR__ . "/breadcrumbs.php"; ?>
    </div>
</section>
