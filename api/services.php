<?php
require __DIR__ . '/includes/bootstrap.php';

$current_page = 'services';
$page = [
    'title'          => 'Services | Dedicated WordPress, Drupal & AWS Engineers | KAJARA',
    'description'    => 'Embed dedicated, full-time Senior WordPress and Drupal developers, DevOps and AWS cloud engineers in your team. Mapped to your stack across ecommerce, CMS, development, cloud and DevOps.',
    'og_title'       => 'KAJARA services — dedicated engineers, mapped to your stack',
    'og_description' => 'Enterprise CMS and AWS infrastructure specialists who report to your leads.',
    'json_ld'        => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "name": "Enterprise CMS developers",
      "serviceType": "IT staff augmentation",
      "provider": { "@id": "https://www.kajaragroup.com/#org" },
      "description": "Dedicated Senior Drupal and WordPress developers for legacy migrations, headless configurations, custom module and block development, database entity optimisation and custom theme optimisation."
    },
    {
      "@type": "Service",
      "name": "AWS Infrastructure Support",
      "serviceType": "IT staff augmentation",
      "provider": { "@id": "https://www.kajaragroup.com/#org" },
      "description": "Dedicated DevOps and cloud engineers for CI/CD pipelines, EC2 instance scaling, RDS database monitoring, infrastructure automation and FinOps."
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.kajaragroup.com/" },
        { "@type": "ListItem", "position": 2, "name": "Services", "item": "https://www.kajaragroup.com/services" }
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
      <nav aria-label="Breadcrumb" class="rise"><ol class="crumbs"><li><a href="<?= page_url('home') ?>">Home</a></li><li aria-hidden="true">/</li><li aria-current="page">Services</li></ol></nav>
      <div style="margin-top: 48px">
        <p class="eyebrow rise" style="--d:1">Services</p>
        <h1 id="hero-h" class="h1 rise" style="--d:2; margin-top: 20px">Dedicated engineers, mapped to your stack.</h1>
      </div>
      <div class="split" style="margin-top: 24px; align-items: end">
        <div>
          <p class="lead rise" style="--d:3; max-width: 600px">Embed full-time professionals across targeted technology segments. Every resource reports to your internal leads and works inside your infrastructure, pipelines and deployment architecture.</p>
          <nav class="row rise" aria-label="On this page" style="--d:4; gap: 10px; margin-top: 32px">
            <a href="#cms" class="jump">Enterprise CMS</a>
            <a href="#aws" class="jump">AWS Infrastructure</a>
            <a href="#tech" class="jump">Core technologies</a>
            <a href="#model" class="jump">Engagement model</a>
          </nav>
        </div>
        <aside class="card rise" style="--d:4; padding: 32px" aria-labelledby="every-h">
          <h2 id="every-h" class="label">Every KAJARA resource is</h2>
          <ul class="ticks" style="margin-top: 20px">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Full-time and dedicated to your team</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Vetted by us, selected by you</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Payroll-managed and compliant</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Reporting directly to your leadership</li>
          </ul>
        </aside>
      </div>
    </div>
  </section>

  <section class="sec" id="cms" aria-labelledby="cms-h">
    <div class="wrap svc-grid">
      <div class="reveal">
        <p class="eyebrow">Frontend &amp; CMS</p>
        <h2 id="cms-h" class="h2">Enterprise CMS</h2>
        <p class="lead"><strong style="color: var(--ink); font-weight: 600">Senior Drupal and WordPress developers</strong> for complex, content-heavy platforms. They take on migrations, headless builds and deep performance work alongside your in-house team.</p>
        <ul class="caps">
          <li><strong>Legacy migrations</strong><span>Move content, users and functionality off ageing platforms with minimal disruption.</span></li>
          <li><strong>Headless configurations</strong><span>Decoupled front ends powered by Drupal or WordPress APIs.</span></li>
          <li><strong>Custom modules and blocks</strong><span>Bespoke Drupal modules and WordPress block development.</span></li>
          <li><strong>Database entity optimisation</strong><span>Leaner queries and entity structures for faster, more stable sites.</span></li>
          <li><strong>Custom theme optimisation</strong><span>Performance-focused themes that fit your design system.</span></li>
          <li><strong>Ongoing platform care</strong><span>A dedicated pair of hands inside your release cycle.</span></li>
        </ul>
        <div class="row" style="margin-top: 36px">
          <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-primary">Request CMS developers <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <div class="roles reveal" style="--d:1">
        <p class="label" style="margin: 4px 4px 16px">Roles you can embed</p>
        <div class="role">
          <div class="role-head"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-code"/></svg></span><div><h3 class="h3" style="font-size: 17px">Senior WordPress Developer</h3><small>Full-time · Dedicated</small></div></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">Custom blocks</li><li class="chip">Headless WP</li><li class="chip">Theme performance</li><li class="chip">WooCommerce</li><li class="chip">Migrations</li></ul>
        </div>
        <div class="role">
          <div class="role-head"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-layers"/></svg></span><div><h3 class="h3" style="font-size: 17px">Senior Drupal Developer</h3><small>Full-time · Dedicated</small></div></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">Custom modules</li><li class="chip">Entity optimisation</li><li class="chip">Decoupled Drupal</li><li class="chip">Version upgrades</li></ul>
        </div>
      </div>
    </div>
  </section>

  <section class="sec band" id="aws" aria-labelledby="aws-h">
    <div class="wrap svc-grid">
      <div class="reveal">
        <p class="eyebrow">Cloud operations</p>
        <h2 id="aws-h" class="h2">AWS Infrastructure Support</h2>
        <p class="lead"><strong style="color: var(--ink); font-weight: 600">DevOps and cloud engineers</strong> who build and run scalable, automated and reliable infrastructure, following your change processes and on-call practices.</p>
        <ul class="caps">
          <li><strong>CI/CD pipelines</strong><span>Automated build, test and release workflows your team can trust.</span></li>
          <li><strong>EC2 instance scaling</strong><span>Right-sized compute that grows with traffic and shrinks when it settles.</span></li>
          <li><strong>RDS database monitoring</strong><span>Proactive visibility into database health and performance.</span></li>
          <li><strong>Infrastructure as Code</strong><span>Repeatable, reviewable environments managed in version control.</span></li>
          <li><strong>Cloud automation</strong><span>Less manual toil across provisioning, backups and maintenance.</span></li>
          <li><strong>FinOps</strong><span>Cost visibility and optimisation across your cloud spend.</span></li>
        </ul>
        <div class="row" style="margin-top: 36px">
          <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-primary">Request cloud engineers <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </div>
      </div>
      <div class="roles reveal" style="--d:1">
        <p class="label" style="margin: 4px 4px 16px">Roles you can embed</p>
        <div class="role">
          <div class="role-head"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-branch"/></svg></span><div><h3 class="h3" style="font-size: 17px">DevOps Engineer</h3><small>Full-time · Dedicated</small></div></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">CI/CD</li><li class="chip">IaC</li><li class="chip">Automation</li><li class="chip">Release management</li></ul>
        </div>
        <div class="role">
          <div class="role-head"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-cloud"/></svg></span><div><h3 class="h3" style="font-size: 17px">Cloud Engineer · AWS</h3><small>Full-time · Dedicated</small></div></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">EC2</li><li class="chip">RDS</li><li class="chip">Scalability</li><li class="chip">Monitoring</li><li class="chip">FinOps</li></ul>
        </div>
      </div>
    </div>
  </section>

  <section class="sec" id="tech" aria-labelledby="tech-h">
    <div class="wrap">
      <div class="measure reveal">
        <p class="eyebrow">Core Technology Alignment</p>
        <h2 id="tech-h" class="h2">Matched to the tools you already run.</h2>
        <p class="lead">Resources are mapped directly to your infrastructure requirements, software pipelines and deployment architectures, so they're productive from their first sprint.</p>
      </div>
      <div class="g3" style="margin-top: 56px">
        <article class="card hover tech-card reveal">
          <div class="row"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-bag"/></svg></span><h3 class="h3">Ecommerce</h3></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">Adobe Commerce</li><li class="chip">Shopify</li><li class="chip">WooCommerce</li></ul>
        </article>
        <article class="card hover tech-card reveal" style="--d:1">
          <div class="row"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-file"/></svg></span><h3 class="h3">CMS</h3></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">WordPress</li><li class="chip">Drupal</li><li class="chip">Joomla</li></ul>
        </article>
        <article class="card hover tech-card reveal" style="--d:2">
          <div class="row"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-code"/></svg></span><h3 class="h3">Development</h3></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">PHP</li><li class="chip">Python</li><li class="chip">Laravel</li><li class="chip">.NET</li><li class="chip">Node.js</li><li class="chip">Angular</li></ul>
        </article>
        <article class="card hover tech-card reveal">
          <div class="row"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-cloud"/></svg></span><h3 class="h3">Cloud</h3></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">AWS</li><li class="chip">Azure</li><li class="chip">Google Cloud</li></ul>
        </article>
        <article class="card hover tech-card reveal" style="--d:1">
          <div class="row"><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-server"/></svg></span><h3 class="h3">DevOps</h3></div>
          <ul class="chips" style="list-style: none; margin: 0; padding: 0"><li class="chip">IaC</li><li class="chip">CI/CD</li><li class="chip">FinOps</li></ul>
        </article>
        <article class="card tech-card tech-cta reveal" style="--d:2">
          <h3 class="h3">Don't see your stack?</h3>
          <p>Tell us what you run. We'll map resources to your exact requirements.</p>
          <a href="<?= page_url('contact', 'contact-form') ?>" class="link">Share your stack <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>
      </div>
    </div>
  </section>

  <section class="sec band" id="model" aria-labelledby="model-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">Engagement model</p>
        <h2 id="model-h" class="h2">From requirement to embedded resource.</h2>
        <p class="lead">A simple, transparent path. You stay in control of who joins and how they work.</p>
        <div class="card" style="margin-top: 36px">
          <h3 class="label">Included with every placement</h3>
          <ul class="ticks" style="margin-top: 18px">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Contracts and legal compliance</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>International payroll and benefits</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Ongoing administrative support</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Flexible scaling, up or down</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Zero setup fees, zero revenue share</li>
          </ul>
        </div>
      </div>
      <ol class="step-list">
        <li class="card hover step-card reveal">
          <span class="num-badge">01</span>
          <div><h3 class="h3">Needs assessment and candidate selection</h3><p class="body" style="margin-top: 10px">We analyse your staffing requirements and define the technical skills and experience needed. You stay in control of the pipeline: review résumés, run technical interviews and make the final selection.</p></div>
        </li>
        <li class="card hover step-card reveal" style="--d:1">
          <span class="num-badge">02</span>
          <div><h3 class="h3">Onboarding and integration</h3><p class="body" style="margin-top: 10px">We handle contracts, legal compliance and international payroll for a hassle-free start. Your leadership directs onboarding, training resources on your infrastructure, coding standards and workflows.</p></div>
        </li>
        <li class="card hover step-card reveal" style="--d:2">
          <span class="num-badge">03</span>
          <div><h3 class="h3">Working inside your sprints</h3><p class="body" style="margin-top: 10px">Resources embed in your sprint cycles, standups and roadmap tools, reporting to your management. We keep handling admin and benefits and let you scale team size as project demands shift.</p></div>
        </li>
      </ol>
    </div>
  </section>

  <section class="sec" aria-labelledby="faq-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-h" class="h2">Service questions.</h2>
        <a href="<?= page_url('contact') ?>" class="btn btn-dark" style="margin-top: 32px">Ask about your stack</a>
      </div>
      <div class="faq reveal" style="--d:1">
        <details open>
          <summary>Do you take on fixed-scope projects?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>No. KAJARA provides dedicated, full-time resources who work under your direction. If you need a project delivered, your embedded team delivers it, with you in control of scope, priorities and releases.</p></div>
        </details>
        <details>
          <summary>Can a resource use our existing tools and processes?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Yes. Resources join your sprint cycles, standups, repositories and roadmap tools, and follow your coding standards and deployment approvals.</p></div>
        </details>
        <details>
          <summary>Can we mix CMS and cloud roles in one team?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Yes. Many teams combine CMS developers with a DevOps or cloud engineer so content, code and infrastructure move together. Tell us your mix and we'll match each role.</p></div>
        </details>
        <details>
          <summary>Which technologies do your resources cover?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Ecommerce (Adobe Commerce, Shopify, WooCommerce), CMS (WordPress, Drupal, Joomla), development (PHP, Python, Laravel, .NET, Node.js, Angular), cloud (AWS, Azure, Google Cloud) and DevOps (IaC, CI/CD, FinOps).</p></div>
        </details>
      </div>
    </div>
  </section>

  <section class="sec no-top" aria-labelledby="cta-h">
    <div class="wrap">
      <div class="cta reveal">
        <div class="split" style="align-items: center">
          <div>
            <p class="eyebrow">Build your team</p>
            <h2 id="cta-h" class="h2">Tell us your stack. We'll match the people.</h2>
            <p class="lead">Leave your contact details and we'll call to understand your requirements, then privately match and brief dedicated resources for you to interview.</p>
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
