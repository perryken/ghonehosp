<?php
// ============================
// Normalize URI
// ============================
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

// Remove "public" if present (local dev only)
if (strpos($uri, 'public/') === 0) {
    $uri = substr($uri, 7);
}

// Remove index.php
$uri = preg_replace('#^index\.php/?#', '', $uri);

// Don't show breadcrumbs on home
if ($uri === '') return;

$segments = array_filter(explode('/', $uri));

$breadcrumbs = [];
$path = '';

foreach ($segments as $index => $segment) {
    $path .= '/' . $segment;

    // Human-readable name
    $name = ucwords(str_replace(['-', '_'], ' ', $segment));

    $is_last = ($index === array_key_last($segments));

    $breadcrumbs[] = [
        'name' => $name,
        'url'  => $is_last ? null : $site_url . $path
    ];
}
?>

<nav class="breadcrumbs container" aria-label="Breadcrumb">
    <a href="<?= $site_url ?>">Home</a>

    <?php foreach ($breadcrumbs as $crumb): ?>
        <span class="separator">›</span>

        <?php if ($crumb['url']): ?>
            <a href="<?= htmlspecialchars($crumb['url']) ?>">
                <?= htmlspecialchars($crumb['name']) ?>
            </a>
        <?php else: ?>
            <span aria-current="page">
                <?= htmlspecialchars($crumb['name']) ?>
            </span>
        <?php endif; ?>
    <?php endforeach; ?>
</nav>
