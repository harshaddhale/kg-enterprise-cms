<?php
require __DIR__ . '/includes/bootstrap.php';
require __DIR__ . '/includes/contact-form.php';

/* POST: JS sends Accept: application/json and gets a JSON reply; plain form posts redirect on success (POST/redirect/GET). */
$form = ['ok' => false, 'errors' => [], 'values' => contact_defaults()];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = handle_contact($_POST);
    if (str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json')) {
        http_response_code($form['ok'] ? 200 : 422);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $form['ok'], 'errors' => $form['errors']]);
        exit;
    }
    if ($form['ok']) {
        header('Location: ' . page_url('contact') . '?sent=1#contact-form', true, 303);
        exit;
    }
}
$sent   = isset($_GET['sent']) && $_SERVER['REQUEST_METHOD'] === 'GET';
$errors = $form['errors'];
$values = $form['values'];
$csrf   = csrf_token();
function invalid(string $field): bool
{
    global $errors;
    return isset($errors[$field]);
}

$current_page = 'contact';
$page = [
    'title'          => 'Contact KAJARA | Request a Proposal or Book a Discovery Call',
    'description'    => 'Talk to KAJARA about dedicated developers and engineers for your team. Leave your details for a call back, email or phone us, or book a project discovery call.',
    'og_title'       => 'Contact KAJARA',
    'og_description' => 'Leave your details and we\'ll call you to scope your technical capacity needs.',
    'json_ld'        => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "ContactPage",
      "name": "Contact KAJARA",
      "url": "https://www.kajaragroup.com/contact",
      "about": { "@id": "https://www.kajaragroup.com/#org" }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.kajaragroup.com/" },
        { "@type": "ListItem", "position": 2, "name": "Contact", "item": "https://www.kajaragroup.com/contact" }
      ]
    }
  ]
}
JSON,
];

require __DIR__ . '/includes/header.php';
?>

  <section class="hero hero-page" aria-labelledby="hero-h">
    <div class="wrap">
      <nav aria-label="Breadcrumb" class="rise"><ol class="crumbs"><li><a href="<?= page_url('home') ?>">Home</a></li><li aria-hidden="true">/</li><li aria-current="page">Contact</li></ol></nav>
      <div class="measure" style="max-width: 760px; margin-top: 48px">
        <p class="eyebrow rise" style="--d:1">Contact</p>
        <h1 id="hero-h" class="h1 rise" style="--d:2; margin-top: 20px">Let's scope your next team.</h1>
        <p class="lead rise" style="--d:3; margin-top: 24px">Leave your details and we'll call you. Your stack, roles and timeline can all be covered on a short discovery call. Prefer to reach us first? Phone, email or book a time below.</p>
      </div>
      <div class="g3" style="margin-top: 48px">
        <div class="card hover contact-card rise" style="--d:3">
          <span class="ic"><svg class="i" aria-hidden="true"><use href="#i-phone"/></svg></span>
          <h2 class="h3">Call us</h2>
          <div>
            <div class="contact-value"><?= e(cfg('phone')) ?></div>
            <div class="contact-meta"><?= e(cfg('phone_hours')) ?></div>
          </div>
          <div class="copy-row">
            <button type="button" class="copy-btn" data-copy="<?= e(cfg('phone')) ?>"><svg class="i i-sm" aria-hidden="true"><use href="#i-copy"/></svg><span data-copy-label>Copy number</span></button>
            <a href="tel:<?= e(cfg('phone_href')) ?>" class="link" style="min-height: 36px">Call now <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
          </div>
        </div>
        <div class="card hover contact-card rise" style="--d:4">
          <span class="ic"><svg class="i" aria-hidden="true"><use href="#i-mail"/></svg></span>
          <h2 class="h3">Email us</h2>
          <div>
            <div class="contact-value"><?= e(cfg('email')) ?></div>
            <div class="contact-meta">We reply within <?= e(cfg('reply_hours')) ?> business hours</div>
          </div>
          <div class="copy-row">
            <button type="button" class="copy-btn" data-copy="<?= e(cfg('email')) ?>"><svg class="i i-sm" aria-hidden="true"><use href="#i-copy"/></svg><span data-copy-label>Copy email</span></button>
            <a href="mailto:<?= e(cfg('email_href')) ?>" class="link" style="min-height: 36px">Send email <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
          </div>
        </div>
        <a href="#call" class="card hover contact-card rise" style="--d:5">
          <span class="ic"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
          <h2 class="h3">Book a discovery call</h2>
          <div>
            <div class="contact-value"><?= e(cfg('call_minutes')) ?>-minute video call</div>
            <div class="contact-meta">Pick a time that suits you</div>
          </div>
          <span class="link" style="min-height: 36px; margin-top: auto">Choose a time <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></span>
        </a>
      </div>
    </div>
  </section>

  <section class="sec" aria-label="Contact form and discovery call">
    <div class="wrap contact-grid">

      <div class="card form-card reveal" id="contact-form">
        <form class="form-wrap" method="post" action="<?= page_url('contact') ?>#contact-form" data-contact-form novalidate aria-labelledby="form-h"<?= $sent ? ' hidden' : '' ?>>
          <p class="eyebrow">Request a call back</p>
          <h2 id="form-h" class="h2" style="font-size: clamp(28px, 3vw, 36px); margin-top: 14px">Leave your details. We'll call you.</h2>
          <p class="body" style="margin-top: 12px">Takes under a minute. We'll cover your requirements on the call.</p>

          <p class="form-alert" role="alert" data-form-error<?= isset($errors['form']) ? '' : ' hidden' ?>><?= e($errors['form'] ?? '') ?></p>

          <div class="form">
            <input type="hidden" name="csrf" value="<?= e($csrf) ?>">
            <div class="hp" aria-hidden="true"><label for="f-website">Website</label><input id="f-website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
            <div class="fgrid">
              <div class="field<?= invalid('name') ? ' has-error' : '' ?>">
                <label for="f-name">Full name <span class="req" aria-hidden="true">*</span></label>
                <input id="f-name" name="name" class="inp<?= invalid('name') ? ' is-invalid' : '' ?>" type="text" autocomplete="name" required data-validate placeholder="Jane Smith" aria-describedby="f-name-err" aria-invalid="<?= invalid('name') ? 'true' : 'false' ?>" value="<?= e($values['name']) ?>">
                <span class="err" id="f-name-err"><?= CONTACT_ERRORS['name'] ?></span>
              </div>
              <div class="field">
                <label for="f-company">Company <span class="opt-tag">(optional)</span></label>
                <input id="f-company" name="company" class="inp" type="text" autocomplete="organization" placeholder="Company name" value="<?= e($values['company']) ?>">
              </div>
              <div class="field<?= invalid('email') ? ' has-error' : '' ?>">
                <label for="f-email">Work email <span class="req" aria-hidden="true">*</span></label>
                <input id="f-email" name="email" class="inp<?= invalid('email') ? ' is-invalid' : '' ?>" type="email" autocomplete="email" inputmode="email" required data-validate placeholder="jane@company.com" aria-describedby="f-email-err" aria-invalid="<?= invalid('email') ? 'true' : 'false' ?>" value="<?= e($values['email']) ?>">
                <span class="err" id="f-email-err"><?= CONTACT_ERRORS['email'] ?></span>
              </div>
              <div class="field<?= invalid('phone') ? ' has-error' : '' ?>">
                <label for="f-phone">Phone number <span class="req" aria-hidden="true">*</span></label>
                <input id="f-phone" name="phone" class="inp<?= invalid('phone') ? ' is-invalid' : '' ?>" type="tel" autocomplete="tel" inputmode="tel" required data-validate pattern="[0-9+()\-\s]{7,}" placeholder="+44 20 1234 5678" aria-describedby="f-phone-err" aria-invalid="<?= invalid('phone') ? 'true' : 'false' ?>" value="<?= e($values['phone']) ?>">
                <span class="err" id="f-phone-err"><?= CONTACT_ERRORS['phone'] ?></span>
              </div>
            </div>

            <fieldset class="field">
              <legend class="legend">Best way to reach you</legend>
              <div class="seg">
                <label><input type="radio" name="reach" value="phone"<?= $values['reach'] === 'phone' ? ' checked' : '' ?>><span><svg class="i i-sm" aria-hidden="true"><use href="#i-phone"/></svg>Phone call</span></label>
                <label><input type="radio" name="reach" value="email"<?= $values['reach'] === 'email' ? ' checked' : '' ?>><span><svg class="i i-sm" aria-hidden="true"><use href="#i-mail"/></svg>Email</span></label>
                <label><input type="radio" name="reach" value="either"<?= $values['reach'] === 'either' ? ' checked' : '' ?>><span>Either is fine</span></label>
              </div>
            </fieldset>

            <label class="consent<?= invalid('consent') ? ' has-error' : '' ?>"><input type="checkbox" name="consent" value="1" data-consent required<?= $values['consent'] ? ' checked' : '' ?>>I agree to KAJARA using these details to contact me about my enquiry, as described in the <a href="#">Privacy Policy</a>.</label>

            <div class="form-foot">
              <button type="submit" class="btn btn-primary">Request a call back <span class="spinner" aria-hidden="true"></span><svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></button>
              <span class="assure"><svg class="i i-sm" aria-hidden="true"><use href="#i-shield"/></svg>No commitment. Your details stay private.</span>
            </div>
          </div>
        </form>

        <div class="success" data-form-success<?= $sent ? '' : ' hidden' ?> aria-live="polite">
          <span class="success-icon"><svg class="i" viewBox="0 0 24 24" aria-hidden="true" style="width: 28px; height: 28px; stroke-width: 2.2"><path d="M20 6 9 17l-5-5"/></svg></span>
          <h2 class="h2">Thanks, we've got your details.</h2>
          <p class="body">Someone from our team will be in touch within <?= e(cfg('reply_hours')) ?> business hours to arrange your discovery call.</p>
          <div class="row" style="justify-content: center; margin-top: 28px">
            <a href="<?= page_url('services') ?>" class="btn btn-ghost">Explore services</a>
            <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-dark" data-form-reset>Send another request</a>
          </div>
        </div>
      </div>

      <div class="stack" style="gap: 24px">
        <div class="call-card reveal" id="call" style="--d:1">
          <span class="ic"><svg class="i" aria-hidden="true"><use href="#i-calendar"/></svg></span>
          <h2 class="h3" style="font-size: 24px; margin-top: 20px">Schedule a project discovery call</h2>
          <p>A <?= e(cfg('call_minutes')) ?>-minute video call with our team. No sales pitch, just a clear plan for your capacity needs.</p>
          <p class="label">We'll cover</p>
          <ul class="ticks">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Your stack, infrastructure and workflows</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>The roles, skills and seniority you need</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Team size, timeline and how scaling works</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>How you'll interview and select candidates</li>
          </ul>
          <a href="<?= e(cfg('booking_url')) ?>" class="btn btn-light btn-block" style="margin-top: 32px">Choose a time <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>

        <div class="card reveal" style="--d:2; padding: 32px">
          <h2 class="label">What happens next</h2>
          <ol class="next-light">
            <li><span class="n-badge">1</span><div><strong>We call you back</strong><span>Within <?= e(cfg('reply_hours')) ?> business hours, at the contact you chose.</span></div></li>
            <li><span class="n-badge">2</span><div><strong>Discovery call</strong><span>We align on scope, skills and ways of working.</span></div></li>
            <li><span class="n-badge">3</span><div><strong>You interview your shortlist</strong><span>Review profiles, run interviews, make the final call.</span></div></li>
          </ol>
        </div>

        <div class="card reveal" style="--d:3; padding: 32px; background: var(--bg-alt)">
          <div class="row" style="align-items: flex-start; flex-wrap: nowrap; gap: 14px">
            <span class="ic" style="background: var(--bg); border: 1px solid var(--line)"><svg class="i" aria-hidden="true"><use href="#i-pin"/></svg></span>
            <div>
              <h2 class="h3">Registered office</h2>
              <address class="body" style="font-style: normal; margin-top: 8px"><?= e(cfg('company')) ?><br><?= e(cfg('office_address')) ?><br>Registered in England &amp; Wales<br>Company No. <?= e(cfg('company_no')) ?></address>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="sec band" aria-labelledby="faq-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">Before you get in touch</p>
        <h2 id="faq-h" class="h2">Common questions.</h2>
      </div>
      <div class="faq reveal" style="--d:1">
        <details open>
          <summary>Is there any cost to request a proposal?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>No. Proposals and discovery calls are free and come with no obligation. When you do engage resources, there are zero setup fees.</p></div>
        </details>
        <details>
          <summary>What should I prepare for the discovery call?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>A rough picture of your technology stack, the roles you're struggling to fill, and how many people you might need. We'll help shape the rest.</p></div>
        </details>
        <details>
          <summary>Will my information be kept confidential?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Yes. We match and brief resources privately, and your details are used only to respond to your enquiry.</p></div>
        </details>
      </div>
    </div>
  </section>


<?php require __DIR__ . '/includes/footer.php'; ?>
