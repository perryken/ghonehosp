<?php
// expects $doctor array
?>

<article class="swiper-slide doctor-card">

  <div class="doctor-image">
    <img src="<?= htmlspecialchars($doctor['image']) ?>"
         alt="<?= htmlspecialchars($doctor['name']) ?> – <?= htmlspecialchars($doctor['role']) ?>"
         loading="lazy">
  </div>

  <div class="doctor-info">
    <h3><?= htmlspecialchars($doctor['name']) ?></h3>
    <span class="doctor-role"><?= htmlspecialchars($doctor['role']) ?></span>

    <p class="doctor-bio"><?= htmlspecialchars($doctor['shortBio']) ?></p>

    <div class="doctor-social">
      <?php foreach ($doctor['social'] as $key => $link): ?>
        <?php if ($link): ?>
          <?php
            $icon = match($key) {
              'facebook' => 'fa-facebook-f',
              'linkedin' => 'fa-linkedin-in',
              'x' => 'fa-x',
              default => ''
            };
          ?>
          <a href="<?= htmlspecialchars($link) ?>" target="_blank" aria-label="<?= htmlspecialchars($key) ?>">
            <i class="fa-brands <?= $icon ?>"></i>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="doc_btn">
      <button class="btn outline small view-profile" data-id="<?= (int)$doctor['id'] ?>">
        View Profile
      </button>
    </div>
  </div>
</article>
