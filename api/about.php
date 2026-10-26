<?php
require __DIR__ . '/includes/bootstrap.php';

$current_page = 'about';
$page = [
    'title'          => 'About KAJARA | Human Infrastructure for Engineering Teams',
    'description'    => 'KAJARA Ltd (Company No. 11041244) helps technology leaders expand engineering capacity with dedicated, full-time professionals who work as part of their team. Learn our story, principles and the KAJARA Advantage.',
    'og_title'       => 'About KAJARA — human infrastructure for teams that ship',
    'og_description' => 'Dedicated technical talent that works like an in-house hire, with none of the hiring overhead.',
    'json_ld'        => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "AboutPage",
      "name": "About KAJARA",
      "url": "https://www.kajaragroup.com/about",
      "about": { "@id": "https://www.kajaragroup.com/#org" }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.kajaragroup.com/" },
        { "@type": "ListItem", "position": 2, "name": "About", "item": "https://www.kajaragroup.com/about" }
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
      <nav aria-label="Breadcrumb" class="rise"><ol class="crumbs"><li><a href="<?= page_url('home') ?>">Home</a></li><li aria-hidden="true">/</li><li aria-current="page">About</li></ol></nav>
      <div class="hero-grid" style="margin-top: 48px; align-items: end">
        <div>
          <p class="eyebrow rise" style="--d:1">About KAJARA</p>
          <h1 id="hero-h" class="h1 rise" style="--d:2; margin-top: 20px">Human infrastructure for teams that ship.</h1>
          <p class="lead rise" style="--d:3; max-width: 600px; margin-top: 24px">We help technology leaders expand engineering capacity with dedicated, full-time professionals who work as part of their team, not as a vendor on the side.</p>
          <div class="row rise" style="--d:4; margin-top: 36px">
            <a href="<?= page_url('contact') ?>" class="btn btn-primary">Talk to our team <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <a href="<?= page_url('services') ?>" class="btn btn-ghost">View services</a>
          </div>
        </div>
        <aside class="card rise" style="--d:4; padding: 28px 32px" aria-labelledby="facts-h">
          <h2 id="facts-h" class="label" style="margin-bottom: 8px">Company at a glance</h2>
          <dl class="facts">
            <div><dt>Company</dt><dd>KAJARA Ltd</dd></div>
            <div><dt>Registered in</dt><dd>England &amp; Wales</dd></div>
            <div><dt>Company number</dt><dd class="mono">11041244</dd></div>
            <div><dt>Founded</dt><dd>[Year]</dd></div>
            <div><dt>Headquarters</dt><dd>[City, Country]</dd></div>
            <div><dt>Delivery model</dt><dd>Onshore · Offshore · On demand</dd></div>
          </dl>
        </aside>
      </div>
    </div>
  </section>

  <section class="sec" id="story" aria-labelledby="story-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">Our story</p>
        <h2 id="story-h" class="h2">Built on a simple idea: your team, your rules.</h2>
      </div>
      <div class="stack reveal" style="--d:1; gap: 20px">
        <p class="lead" style="color: var(--ink)">Hiring great engineers takes months. Agencies move faster, but they take the work, and the control, out of your hands. KAJARA was founded to close that gap.</p>
        <p class="body" style="font-size: 17px">We give organisations immediate access to dedicated technical talent that functions exactly like an in-house hire. They follow your standards, sit in your standups and ship through your pipelines, while we absorb the sourcing, contracts, compliance and international payroll that slow everyone down.</p>
        <p class="body" style="font-size: 17px">[Add the founding story here: the year, the founders, and the problem they saw first-hand that led to KAJARA.]</p>
      </div>
    </div>
    <div class="wrap split" style="margin-top: 80px">
      <h3 class="label reveal">Our journey</h3>
      <ol class="tl">
        <li class="reveal"><div class="when">[Year]</div><div class="h3" style="margin-top: 6px">KAJARA Ltd incorporated in England &amp; Wales</div><p class="body" style="margin-top: 6px">Company No. 11041244, founded to make dedicated technical talent accessible without the overhead of permanent hiring.</p></li>
        <li class="reveal" style="--d:1"><div class="when">[Year]</div><div class="h3" style="margin-top: 6px">[Milestone: first dedicated teams placed]</div><p class="body" style="margin-top: 6px">[One line on who you started working with and what they needed.]</p></li>
        <li class="reveal" style="--d:2"><div class="when">[Year]</div><div class="h3" style="margin-top: 6px">[Milestone: expansion into cloud and DevOps]</div><p class="body" style="margin-top: 6px">[One line on how the offering grew.]</p></li>
        <li class="reveal" style="--d:3"><div class="when">Today</div><div class="h3" style="margin-top: 6px">Onshore, offshore and on-demand resources</div><p class="body" style="margin-top: 6px">Specialists across enterprise CMS, ecommerce, application development, cloud and DevOps, embedded in client teams.</p></li>
      </ol>
    </div>
  </section>

  <section class="sec no-top" aria-labelledby="believe-h">
    <div class="wrap">
      <div class="reveal">
        <p class="eyebrow">What we believe</p>
        <h2 id="believe-h" class="h2" style="max-width: 640px">Three principles behind every placement.</h2>
      </div>
      <div class="g3" style="margin-top: 48px">
        <article class="card hover feature reveal">
          <h3 class="h3">Your direction, always</h3>
          <p class="body">Our people report to your leaders. We support from the side and never stand between you and your team.</p>
        </article>
        <article class="card hover feature reveal" style="--d:1">
          <h3 class="h3">Ownership is non-negotiable</h3>
          <p class="body">Every line of code, every asset and every royalty belongs to you. No exceptions, no fine print.</p>
        </article>
        <article class="card hover feature reveal" style="--d:2">
          <h3 class="h3">Certainty over surprises</h3>
          <p class="body">One transparent rate per resource. No setup fees, no revenue share, no hidden margins on your success.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="sec dark" id="why-us" aria-labelledby="why-h">
    <div class="wrap">
      <p class="eyebrow reveal">Why us</p>
      <h2 id="why-h" class="why-statement reveal" style="--d:1">Human infrastructure to scale your IT and engineering output, with <span>absolute control</span> over your deployments, code reviews, release cycles and digital assets.</h2>
      <div class="g3 why-grid">
        <div class="reveal">
          <svg class="i i-lg" aria-hidden="true"><use href="#i-users"/></svg>
          <h3 class="h3" style="margin-top: 16px">Reporting to your leads</h3>
          <p>Resources take priorities from your managers, not from an account manager on our side.</p>
        </div>
        <div class="reveal" style="--d:1">
          <svg class="i i-lg" aria-hidden="true"><use href="#i-branch"/></svg>
          <h3 class="h3" style="margin-top: 16px">Inside your workflow</h3>
          <p>Your repos, your code reviews, your deployment cycles. Nothing runs through a black box.</p>
        </div>
        <div class="reveal" style="--d:2">
          <svg class="i i-lg" aria-hidden="true"><use href="#i-expand"/></svg>
          <h3 class="h3" style="margin-top: 16px">Capacity on your terms</h3>
          <p>Expand operational capacity when demand spikes and scale back when it settles.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="sec" id="advantage" aria-labelledby="adv-h">
    <div class="wrap">
      <div class="measure reveal">
        <p class="eyebrow">The KAJARA Advantage</p>
        <h2 id="adv-h" class="h2">Strategic IT augmentation, not outsourcing.</h2>
        <p class="lead">We do not operate as an outsourced agency, software development firm or managed service provider. We deliver immediate capacity and optimised efficiency, inside your organisation.</p>
      </div>
      <div class="g6" style="margin-top: 56px">
        <article class="card hover feature span2 reveal">
          <h3 class="h3">On-demand</h3>
          <p class="body">Missing an in-house expert for a critical or short-term task? Access a diverse pool of vetted technical resources and plug capacity gaps quickly.</p>
        </article>
        <article class="card hover feature span2 reveal" style="--d:1">
          <h3 class="h3">Scale with flexibility</h3>
          <p class="body">Size your technical team up and down to meet changing demand, without the long-term commitment, admin or onboarding delays of permanent hires.</p>
        </article>
        <article class="card hover feature span2 reveal" style="--d:2">
          <h3 class="h3">Cost-effectiveness</h3>
          <p class="body">Realise significant savings by removing localised benefits, ongoing training programme expenses and physical infrastructure costs.</p>
        </article>
        <article class="card hover feature span3 reveal">
          <h3 class="h3">Code ownership</h3>
          <p class="body">Keep total control over your code and digital products. All intellectual property, generated source code and associated royalties remain 100% owned by your organisation.</p>
        </article>
        <article class="card hover feature span3 reveal" style="--d:1">
          <h3 class="h3">Known outcomes</h3>
          <p class="body">Operate with financial certainty. Dedicated, full-time personnel at a transparent, predictable resource rate, with zero setup fees and zero revenue share.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="sec band" aria-labelledby="resp-h">
    <div class="wrap">
      <div class="center reveal">
        <p class="eyebrow">Clear lines of responsibility</p>
        <h2 id="resp-h" class="h2">We handle the overhead. You keep the wheel.</h2>
      </div>
      <div class="g2" style="margin-top: 56px">
        <div class="card card-lg reveal">
          <div class="row" style="gap: 12px"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-chevron"/></svg></span><h3 class="h3" style="font-size: 22px">KAJARA handles</h3></div>
          <ul class="ticks" style="margin-top: 28px">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Sourcing and vetting technical candidates</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Contracts and legal compliance</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>International payroll and benefits</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Ongoing administrative support</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Scaling your team up or down</li>
          </ul>
        </div>
        <div class="card card-lg resp-you reveal" style="--d:1">
          <div class="row" style="gap: 12px"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-users"/></svg></span><h3 class="h3" style="font-size: 22px">You control</h3></div>
          <ul class="ticks" style="margin-top: 28px">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Interviews and final candidate selection</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Onboarding to your stack and standards</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Priorities, sprints and roadmap</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Code reviews and deployment approvals</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>All code, IP and digital assets</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="sec" aria-labelledby="faq-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-h" class="h2">About working with KAJARA.</h2>
      </div>
      <div class="faq reveal" style="--d:1">
        <details open>
          <summary>Is KAJARA a recruitment agency?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>No. A recruiter places a permanent hire on your payroll and steps away. KAJARA keeps the resource on our payroll, handles contracts, compliance and benefits, and supports the placement for as long as you need it, while the person works full-time for your team.</p></div>
        </details>
        <details>
          <summary>Where are KAJARA resources based?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>We provide onshore, offshore and on-demand resources, so you can choose the location and working pattern that suits your team. [Add the countries or regions you recruit from.]</p></div>
        </details>
        <details>
          <summary>Who manages the resource day to day?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Your internal leadership does. Resources embed in your sprint cycles, standups and roadmap tools and report to your managers. KAJARA provides administrative support in the background.</p></div>
        </details>
      </div>
    </div>
  </section>

  <section class="sec no-top" aria-labelledby="cta-h">
    <div class="wrap">
      <div class="cta reveal">
        <div class="split" style="align-items: center">
          <div>
            <p class="eyebrow">Work with us</p>
            <h2 id="cta-h" class="h2">Add capacity without giving up control.</h2>
            <p class="lead">Tell us what you're building and the skills you're missing. We'll come back with a tailored resourcing proposal.</p>
          </div>
          <div class="row cta-actions" style="justify-content: flex-end">
            <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-primary">Request a proposal <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
            <a href="<?= page_url('contact', 'call') ?>" class="btn btn-outline-light">Book a discovery call</a>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php require __DIR__ . '/includes/footer.php'; ?>
