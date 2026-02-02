<?php
// expects $service array to already exist
?>
<article class="service-card">
  <a href="<?= htmlspecialchars($service['url']) ?>">
    <div class="service-image">
      <img src="<?= htmlspecialchars($service['image']) ?>" 
           alt="<?= htmlspecialchars($service['title']) ?>" loading="lazy">
    </div>
    <div class="service-content">
      <h3><?= htmlspecialchars($service['title']) ?></h3>
      <p><?= htmlspecialchars($service['description']) ?></p>
    </div>
    <div class="lin-btn">Learn More</div>
  </a>
</article>
