<?php
/* Closes <main> opened by header.php. On the contact page the footer sits on white and its contact links stay in-page. */
$on_contact = $current_page === 'contact';
?>
</main>

<footer class="site-footer"<?= $on_contact ? ' style="background: var(--bg)"' : '' ?>>
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <a href="<?= page_url('home') ?>" class="logo" aria-label="KAJARA home">
          <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3l10 9-10 9" fill="none" stroke="currentColor" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <span>KAJARA</span>
        </a>
        <p class="body" style="margin-top: 16px; max-width: 340px; font-size: 14.5px">Dedicated, full-time technical resources embedded in your team. Sourced, vetted and payroll-managed by KAJARA. Directed by you.</p>
        <p class="foot-legal"><?= e(cfg('company')) ?> · Registered in England &amp; Wales<br>Company No. <?= e(cfg('company_no')) ?></p>
      </div>
      <nav aria-label="Company">
        <h3>Company</h3>
        <ul>
          <li><a href="<?= page_url('about') ?>">About us</a></li>
          <li><a href="<?= page_url('about', 'advantage') ?>">The KAJARA Advantage</a></li>
          <li><a href="<?= page_url('home', 'how-it-works') ?>">How it works</a></li>
          <li><a href="<?= page_url('home', 'faq') ?>">FAQ</a></li>
        </ul>
      </nav>
      <nav aria-label="Services">
        <h3>Services</h3>
        <ul>
          <li><a href="<?= page_url('services', 'cms') ?>">Enterprise CMS</a></li>
          <li><a href="<?= page_url('services', 'aws') ?>">AWS Infrastructure</a></li>
          <li><a href="<?= page_url('services', 'tech') ?>">Ecommerce</a></li>
          <li><a href="<?= page_url('services', 'tech') ?>">Development</a></li>
          <li><a href="<?= page_url('services', 'tech') ?>">DevOps</a></li>
        </ul>
      </nav>
      <div>
        <h3>Get in touch</h3>
        <ul>
          <li><a href="<?= $on_contact ? '#contact-form' : page_url('contact') ?>"><?= e(cfg('email')) ?></a></li>
          <li><a href="<?= $on_contact ? '#contact-form' : page_url('contact') ?>"><?= e(cfg('phone')) ?></a></li>
        </ul>
        <a href="<?= page_url('contact', 'call') ?>" class="btn btn-dark btn-sm" style="margin-top: 16px">Book a discovery call</a>
      </div>
    </div>
    <div class="foot-bottom">
      <p>© <span data-year><?= date('Y') ?></span> <?= e(cfg('company')) ?>. All rights reserved.</p>
      <nav aria-label="Legal">
        <a href="#">Terms of Placement</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Cookie Policy</a>
      </nav>
    </div>
  </div>
</footer>

<script src="<?= e(asset('main.js')) ?>"></script>
</body>
</html>
