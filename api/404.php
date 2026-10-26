<?php
require __DIR__ . '/includes/bootstrap.php';

http_response_code(404);
$current_page = '';
$page = [
    'title'          => 'Page not found | KAJARA',
    'description'    => 'The page you were looking for could not be found.',
    'og_title'       => 'Page not found',
    'og_description' => 'The page you were looking for could not be found.',
    'noindex'        => true,
];

require __DIR__ . '/includes/header.php';
?>

  <section class="hero hero-page" aria-labelledby="hero-h">
    <div class="wrap">
      <div class="measure" style="max-width: 760px">
        <p class="eyebrow rise">404</p>
        <h1 id="hero-h" class="h1 rise" style="--d:1; margin-top: 20px">This page doesn't exist.</h1>
        <p class="lead rise" style="--d:2; margin-top: 24px">The link may be out of date, or the page may have moved.</p>
        <div class="row rise" style="--d:3; margin-top: 36px">
          <a href="<?= page_url('home') ?>" class="btn btn-primary">Back to home <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
          <a href="<?= page_url('contact') ?>" class="btn btn-ghost">Contact us</a>
        </div>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
