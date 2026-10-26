<?php
/* Expects $current_page (a PAGES key, or '' for pages outside the nav) and
   $page: title, description, og_title, og_description, json_ld (optional, raw JSON), noindex (optional). */
$canonical = isset(PAGES[$current_page]) ? rtrim(cfg('site_url'), '/') . '/' . PAGES[$current_page]['path'] : '';
?>
<!doctype html>
<html lang="en-GB">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= e($page['title']) ?></title>
<meta name="description" content="<?= e($page['description']) ?>">
<?php if (!empty($page['noindex'])): ?>
<meta name="robots" content="noindex">
<?php endif; ?>
<?php if ($canonical !== ''): ?>
<link rel="canonical" href="<?= e($canonical) ?>">
<?php endif; ?>
<meta property="og:type" content="website">
<meta property="og:site_name" content="KAJARA">
<meta property="og:title" content="<?= e($page['og_title']) ?>">
<meta property="og:description" content="<?= e($page['og_description']) ?>">
<?php if ($canonical !== ''): ?>
<meta property="og:url" content="<?= e($canonical) ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#0F172A">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@800&amp;display=swap">
<link rel="icon" href="<?= e(asset('favicon.svg')) ?>" type="image/svg+xml">
<link rel="stylesheet" href="<?= e(asset('styles.css')) ?>">
<?php if (!empty($page['json_ld'])): ?>
<script type="application/ld+json">
<?= $page['json_ld'] ?>

</script>
<?php endif; ?>
</head>
<body>
<?php readfile(__DIR__ . '/sprite.svg'); ?>

<a class="skip" href="#main">Skip to content</a>

<header class="site-header" data-header>
  <div class="wrap header-inner">
    <a href="<?= page_url('home') ?>" class="logo" aria-label="KAJARA home">
      <?php require __DIR__ . '/logo.php'; ?>
    </a>
    <nav class="nav" aria-label="Primary">
      <?= nav_links() ?>
    </nav>
    <div class="header-cta">
      <a href="<?= page_url('contact', 'call') ?>" class="btn btn-ghost btn-sm">Book a call</a>
      <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-dark btn-sm">Request a proposal</a>
    </div>
    <button class="menu-btn" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu" data-menu-btn><span></span><span></span></button>
  </div>
  <div class="mobile-nav" id="mobile-nav" data-mobile-nav>
    <div class="mobile-nav-inner">
      <div class="wrap">
        <nav aria-label="Mobile">
          <?= nav_links() ?>
        </nav>
        <div class="row">
          <a href="<?= page_url('contact', 'call') ?>" class="btn btn-ghost">Book a call</a>
          <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-dark">Request a proposal</a>
        </div>
      </div>
    </div>
  </div>
</header>

<main id="main">
