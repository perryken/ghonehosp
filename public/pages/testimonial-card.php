<?php
// expects $testimonial array to already exist
?>

<article class="swiper-slide testimonial-card">
  <div class="testimonial-content">
    <p class="testimonial-text">“<?= htmlspecialchars($testimonial['testimonial']) ?>”</p>

    <div class="testimonial-author">
      <div class="author-info">
        <h4><?= htmlspecialchars($testimonial['name']) ?></h4>
        <span><?= htmlspecialchars($testimonial['role']) ?></span>
      </div>
    </div>
  </div>
</article>
