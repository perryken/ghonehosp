<?php
// Fallbacks
$site_name = $site_name ?? "GloneLaw";
$phone     = $phone ?? "+233 12 345 6789";
$email     = $email ?? "info@glonelaw.com";
?>
<footer class="site-footer" role="contentinfo">
    <div class="container footer-inner">

        <!-- Logo + Address -->
        <div class="footer-col">
            <img src="./assets/images/logo/logo.png" alt="<?= $site_name ?> logo" width="140" />
            <address>
                Office Street<br />
                Accra, Greater Accra<br />
                Ghana
            </address>
        </div>

        <!-- Contact -->
        <div class="footer-col">
            <h4>Contact</h4>
            <p>
                <a href="tel:<?= $phone ?>"><?= $phone ?></a><br />
                <a href="mailto:<?= $email ?>"><?= $email ?></a>
            </p>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/terms">Terms of Use</a></li>
                <li><a href="/sitemap.xml">Sitemap</a></li>
            </ul>
        </div>

    </div>

    <!-- Bottom -->
    <div class="footer-bottom container">
        <small>hospital &copy; <span id="copy-year"><?= date("Y") ?></span> <?= $site_name ?>. All rights reserved.</small>
    </div>
</footer>

<!-- JS Scripts -->
<script src="./assets/js/components-loader.js" defer></script>
<script src="./assets/vendor/swiper-bundle.min.js" defer></script>
<script src="./assets/js/main.js" defer></script>
