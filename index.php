<?php
require __DIR__ . '/includes/bootstrap.php';

$current_page = 'home';
$page = [
    'title'          => 'KAJARA | On-Demand Technical Talent & IT Staff Augmentation',
    'description'    => 'KAJARA provides dedicated, full-time developers and engineers who embed in your team and report to your leaders. You keep control, 100% IP ownership and a transparent rate with zero setup fees.',
    'og_title'       => 'On-demand technical talent. Scale your I.T. output.',
    'og_description' => 'Dedicated, full-time technical resources embedded in your team. Sourced, vetted and payroll-managed by KAJARA. Directed by you.',
    'json_ld'        => <<<'JSON'
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://www.kajaragroup.com/#org",
      "name": "KAJARA Ltd",
      "alternateName": "KAJARA",
      "url": "https://www.kajaragroup.com/",
      "description": "IT staff augmentation partner providing dedicated, full-time technical professionals who embed in client teams and report to client leadership.",
      "identifier": { "@type": "PropertyValue", "propertyID": "UK Companies House", "value": "11041244" },
      "knowsAbout": ["IT staff augmentation", "WordPress development", "Drupal development", "AWS infrastructure", "DevOps", "Ecommerce development"]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        { "@type": "Question", "name": "What is IT staff augmentation?", "acceptedAnswer": { "@type": "Answer", "text": "IT staff augmentation adds dedicated technical professionals to your existing team. They work full-time on your projects and report to your managers, while a partner like KAJARA handles sourcing, contracts, compliance and payroll." } },
        { "@type": "Question", "name": "How is KAJARA different from an outsourcing agency?", "acceptedAnswer": { "@type": "Answer", "text": "KAJARA is not an outsourced agency, software development firm or managed service provider. Its resources join your team and follow your direction, code reviews and deployment cycles." } },
        { "@type": "Question", "name": "Who owns the code KAJARA resources write?", "acceptedAnswer": { "@type": "Answer", "text": "You do. All intellectual property, generated source code and associated royalties remain 100% owned by your organisation." } },
        { "@type": "Question", "name": "Do we choose the developers?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. KAJARA shortlists vetted candidates. You review résumés, run technical interviews and make the final selection." } },
        { "@type": "Question", "name": "How does KAJARA pricing work?", "acceptedAnswer": { "@type": "Answer", "text": "One transparent, predictable rate for each dedicated full-time resource, with no setup fees and no revenue share." } },
        { "@type": "Question", "name": "Can we scale the team up or down?", "acceptedAnswer": { "@type": "Answer", "text": "Yes. You can grow or reduce your team as project demand shifts, without the long-term commitment of permanent hiring." } }
      ]
    }
  ]
}
JSON,
];

require __DIR__ . '/includes/header.php';
?>

  <section class="hero hero-home" aria-labelledby="hero-h">
    <div class="wrap hero-grid">
      <div>
        <p class="eyebrow eyebrow-dot">Onshore, offshore and on-demand IT staff augmentation</p>
        <h1 id="hero-h" class="h1 rise" style="--d:1; margin-top: 20px">On-demand technical talent. <span class="accent">Scale your I.T. output.</span></h1>
        <p class="lead rise" style="--d:2; max-width: 560px; margin-top: 24px">Dedicated, full-time developers and engineers embedded directly in your team. We source, vet and manage payroll. They report to your leadership, so strategic control, IP ownership and deployment authority stay with you.</p>
        <div class="row rise" style="--d:3; margin-top: 36px">
          <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-primary">Request a proposal <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
          <a href="<?= page_url('contact', 'call') ?>" class="btn btn-ghost"><svg class="i i-sm" aria-hidden="true"><use href="#i-calendar"/></svg>Book a discovery call</a>
        </div>
        <ul class="ticks hero-ticks rise" style="--d:4; margin-top: 40px">
          <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>You interview and select</li>
          <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>100% IP ownership</li>
          <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Zero setup fees</li>
          <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Zero revenue share</li>
        </ul>
      </div>

      <figure class="pod rise" style="--d:3" aria-label="Illustration: KAJARA resources embedded in your engineering team, reporting to your lead">
        <div class="pod-card">
          <div class="pod-head">
            <span class="label">Your engineering org</span>
            <span class="chip chip-blue">Directed by you</span>
          </div>
          <div class="pod-body">
            <div class="pod-lead">
              <span class="ic"><svg class="i" aria-hidden="true"><use href="#i-users"/></svg></span>
              <div><strong style="font-size: 15px; font-weight: 600">Your CTO / Engineering lead</strong><small>Sets priorities, reviews code, owns deployments</small></div>
            </div>
            <div class="pod-tree">
              <div class="pod-row" style="--d:0">
                <span class="ic ic-sm"><svg class="i i-sm" aria-hidden="true"><use href="#i-code"/></svg></span>
                <div><strong>Senior WordPress Developer</strong><small>Full-time · In your sprint cycle</small></div>
                <span class="chip">Embedded</span>
              </div>
              <div class="pod-row" style="--d:1">
                <span class="ic ic-sm"><svg class="i i-sm" aria-hidden="true"><use href="#i-layers"/></svg></span>
                <div><strong>Senior Drupal Developer</strong><small>Full-time · Joins your standups</small></div>
                <span class="chip">Embedded</span>
              </div>
              <div class="pod-row" style="--d:2">
                <span class="ic ic-sm"><svg class="i i-sm" aria-hidden="true"><use href="#i-cloud"/></svg></span>
                <div><strong>DevOps Engineer · AWS</strong><small>Full-time · Works in your roadmap tools</small></div>
                <span class="chip">Embedded</span>
              </div>
            </div>
          </div>
          <div class="pod-foot">
            <div><span class="label">KAJARA handles</span><p>Sourcing · Contracts · Payroll · Compliance</p></div>
            <div><span class="label" style="color: var(--blue-d)">You control</span><p>Selection · Roadmap · Reviews · Deploys</p></div>
          </div>
        </div>
      </figure>
    </div>
  </section>

  <section class="sec" aria-labelledby="what-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">What is KAJARA?</p>
        <h2 id="what-h" class="h2">An extension of your team, not an outside agency.</h2>
        <p class="lead">KAJARA is an IT staff augmentation partner. We provide dedicated, full-time technical professionals who work inside your workflows and report to your internal leads, while we take care of sourcing, contracts, compliance and international payroll.</p>
        <a href="<?= page_url('about') ?>" class="link" style="margin-top: 24px">Read our story <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
      </div>
      <div class="table-wrap reveal" style="--d:1">
        <table class="cmp">
          <caption class="sr-only">How KAJARA compares with a typical outsourced agency and a typical managed service provider</caption>
          <thead>
            <tr><td></td><th scope="col">Typical agency</th><th scope="col">Typical MSP</th><th scope="col" class="k">KAJARA</th></tr>
          </thead>
          <tbody>
            <tr><th scope="row">Who directs daily work</th><td>Agency project manager</td><td>Provider, under an SLA</td><td class="k">Your internal leads</td></tr>
            <tr><th scope="row">Who picks the people</th><td>The agency</td><td>The provider</td><td class="k">You interview and choose</td></tr>
            <tr><th scope="row">Who owns code and IP</th><td>Negotiated per contract</td><td>Depends on contract</td><td class="k">100% your organisation</td></tr>
            <tr><th scope="row">How you pay</th><td>Project fees plus markup</td><td>Retainer or SLA tiers</td><td class="k">One transparent resource rate</td></tr>
            <tr><th scope="row">Scaling the team</th><td>New scope, new quote</td><td>Change of tier</td><td class="k">Up or down as demand shifts</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <section class="sec band" aria-labelledby="adv-h">
    <div class="wrap">
      <div class="between reveal">
        <div class="measure">
          <p class="eyebrow">The KAJARA Advantage</p>
          <h2 id="adv-h" class="h2">Extra capacity, without giving up control.</h2>
          <p class="lead">Strategic IT augmentation designed to deliver immediate capacity and optimised efficiency, without handing your product to an outside firm.</p>
        </div>
        <a href="<?= page_url('about', 'advantage') ?>" class="btn btn-ghost">Why teams choose KAJARA</a>
      </div>
      <div class="g3" style="margin-top: 56px">
        <article class="card card-lg hover feature span2 reveal">
          <h3 class="h3" style="font-size: 24px">On-demand expertise</h3>
          <p class="body" style="max-width: 560px">Missing an in-house expert for a critical or short-term task? Tap a diverse pool of vetted technical professionals and plug capacity gaps fast, without a months-long hiring cycle.</p>
        </article>
        <article class="card hover feature reveal" style="--d:1">
          <h3 class="h3">Scale with flexibility</h3>
          <p class="body">Size your team up or down as demand changes, without the commitment and admin of permanent hires.</p>
        </article>
        <article class="card hover feature reveal">
          <h3 class="h3">Cost-effective</h3>
          <p class="body">Save on localised benefits, ongoing training programmes and physical infrastructure.</p>
        </article>
        <article class="card hover feature reveal" style="--d:1">
          <h3 class="h3">You own the code</h3>
          <p class="body">All IP, source code and associated royalties stay 100% with your organisation.</p>
        </article>
        <article class="card hover feature reveal" style="--d:2">
          <h3 class="h3">Known outcomes</h3>
          <p class="body">A transparent, predictable resource rate. Zero setup fees, zero revenue share.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="sec" id="how-it-works" aria-labelledby="proc-h">
    <div class="wrap">
      <div class="center reveal">
        <p class="eyebrow">How it works</p>
        <h2 id="proc-h" class="h2">From first call to first commit.</h2>
        <p class="lead">We grow your resource capacity alongside you, so every individual works under your operational direction.</p>
      </div>
      <ol class="g3 steps">
        <li class="step reveal" style="--d:0">
          <span class="step-num">Step 1 &nbsp;/&nbsp; Assess and select</span>
          <h3 class="h3">Define the role. Choose your people.</h3>
          <p class="body">We map the skills and seniority you need. You review résumés, run technical interviews and make the final call.</p>
        </li>
        <li class="step reveal" style="--d:1">
          <span class="step-num">Step 2 &nbsp;/&nbsp; Onboard and integrate</span>
          <h3 class="h3">We handle the admin. You lead onboarding.</h3>
          <p class="body">Contracts, legal compliance and international payroll are on us. Your leaders train them on your stack and standards.</p>
        </li>
        <li class="step reveal" style="--d:2">
          <span class="step-num">Step 3 &nbsp;/&nbsp; Embed and scale</span>
          <h3 class="h3">They join your sprints. You scale at will.</h3>
          <p class="body">Resources work in your standups and roadmap tools. We keep supporting admin and benefits as your needs change.</p>
        </li>
      </ol>
      <div class="row reveal" style="justify-content: center; margin-top: 56px">
        <a href="<?= page_url('contact', 'call') ?>" class="btn btn-primary">Start with a discovery call <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
      </div>
    </div>
  </section>

  <section class="sec no-top" aria-labelledby="svc-h">
    <div class="wrap">
      <div class="between reveal">
        <div class="measure">
          <p class="eyebrow">Services</p>
          <h2 id="svc-h" class="h2">Specialists for the systems you run.</h2>
          <p class="lead">Embed dedicated, full-time professionals across targeted technology segments, reporting to your internal leads.</p>
        </div>
        <a href="<?= page_url('services') ?>" class="btn btn-ghost">All services</a>
      </div>
      <div class="g2" style="margin-top: 48px">
        <article class="card card-lg hover feature reveal" style="gap: 20px">
          <div class="between" style="align-items: center"><span class="eyebrow">Frontend &amp; CMS</span><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-layers"/></svg></span></div>
          <h3 class="h3" style="font-size: 26px">Enterprise CMS</h3>
          <p class="body">Senior Drupal and WordPress developers for complex, high-traffic platforms.</p>
          <ul class="ticks">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Legacy migrations and headless builds</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Custom modules and block development</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>Database and theme optimisation</li>
          </ul>
          <a href="<?= page_url('services', 'cms') ?>" class="link" style="margin-top: auto">Explore Enterprise CMS <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>
        <article class="card card-lg hover feature reveal" style="--d:1; gap: 20px">
          <div class="between" style="align-items: center"><span class="eyebrow">Cloud operations</span><span class="ic"><svg class="i" aria-hidden="true"><use href="#i-cloud"/></svg></span></div>
          <h3 class="h3" style="font-size: 26px">AWS Infrastructure Support</h3>
          <p class="body">DevOps and cloud engineers who keep your platform fast, automated and reliable.</p>
          <ul class="ticks">
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>CI/CD pipelines and automation</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>EC2 instance scaling</li>
            <li><svg class="i i-sm" aria-hidden="true"><use href="#i-check"/></svg>RDS database monitoring</li>
          </ul>
          <a href="<?= page_url('services', 'aws') ?>" class="link" style="margin-top: auto">Explore AWS support <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
        </article>
      </div>
      <div class="tech-strip reveal">
        <span class="label">Core technologies</span>
        <div class="marquee">
          <div class="marquee-track">
            <ul>
              <li class="chip">WordPress</li><li class="chip">Drupal</li><li class="chip">Joomla</li><li class="chip">Adobe Commerce</li><li class="chip">Shopify</li><li class="chip">WooCommerce</li><li class="chip">PHP</li><li class="chip">Laravel</li><li class="chip">Python</li><li class="chip">.NET</li><li class="chip">Node.js</li><li class="chip">Angular</li><li class="chip">AWS</li><li class="chip">Azure</li><li class="chip">Google Cloud</li><li class="chip">IaC</li><li class="chip">CI/CD</li><li class="chip">FinOps</li>
            </ul>
            <ul aria-hidden="true">
              <li class="chip">WordPress</li><li class="chip">Drupal</li><li class="chip">Joomla</li><li class="chip">Adobe Commerce</li><li class="chip">Shopify</li><li class="chip">WooCommerce</li><li class="chip">PHP</li><li class="chip">Laravel</li><li class="chip">Python</li><li class="chip">.NET</li><li class="chip">Node.js</li><li class="chip">Angular</li><li class="chip">AWS</li><li class="chip">Azure</li><li class="chip">Google Cloud</li><li class="chip">IaC</li><li class="chip">CI/CD</li><li class="chip">FinOps</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sec band" id="faq" aria-labelledby="faq-h">
    <div class="wrap split">
      <div class="reveal">
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-h" class="h2">Frequently asked questions</h2>
        <p class="lead">Everything technology leaders usually ask before adding a KAJARA resource to their team.</p>
        <a href="<?= page_url('contact') ?>" class="btn btn-dark" style="margin-top: 32px">Ask us directly</a>
      </div>
      <div class="faq reveal" style="--d:1">
        <details open>
          <summary>What is IT staff augmentation?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>IT staff augmentation adds dedicated technical professionals to your existing team. They work full-time on your projects and report to your managers, while a partner like KAJARA handles sourcing, contracts, compliance and payroll.</p></div>
        </details>
        <details>
          <summary>How is KAJARA different from an outsourcing agency?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>We are not an outsourced agency, software development firm or managed service provider. We don't take over your projects. Our resources join your team and follow your direction, your code reviews and your deployment cycles.</p></div>
        </details>
        <details>
          <summary>Who owns the code our resources write?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>You do. All intellectual property, generated source code and associated royalties remain 100% owned by your organisation.</p></div>
        </details>
        <details>
          <summary>Do we choose the developers?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Yes. We shortlist vetted candidates against your requirements. You review résumés, run technical interviews and make the final selection.</p></div>
        </details>
        <details>
          <summary>How does pricing work?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>You pay one transparent, predictable rate for each dedicated full-time resource. There are no setup fees and no revenue share.</p></div>
        </details>
        <details>
          <summary>Can we scale the team up or down?<svg class="i" aria-hidden="true"><use href="#i-plus"/></svg></summary>
          <div class="faq-a"><p>Yes. You can grow or reduce your team as project demand shifts, without the long-term commitment of permanent hiring.</p></div>
        </details>
      </div>
    </div>
  </section>

  <section class="sec" aria-labelledby="cta-h">
    <div class="wrap">
      <div class="cta reveal">
        <div class="split" style="align-items: center">
          <div>
            <h2 id="cta-h" class="h2">Add engineers to your team without the hiring cycle.</h2>
            <p class="lead">Share your technology stack and capacity requirements. We'll privately match and brief dedicated resources. You interview and decide.</p>
            <div class="row" style="margin-top: 32px">
              <a href="<?= page_url('contact', 'contact-form') ?>" class="btn btn-primary">Request a proposal <svg class="i i-sm arrow" aria-hidden="true"><use href="#i-arrow"/></svg></a>
              <a href="<?= page_url('contact', 'call') ?>" class="btn btn-outline-light">Book a discovery call</a>
            </div>
          </div>
          <div class="cta-panel">
            <p class="label" style="color: var(--sky)">What happens next</p>
            <ol class="next">
              <li><span class="n">01</span><div><strong>Leave your details</strong><span>Name, email and phone. That's all we need.</span></div></li>
              <li><span class="n">02</span><div><strong>Discovery call</strong><span>We align on your stack, roles, skills and timeline.</span></div></li>
              <li><span class="n">03</span><div><strong>Interview your shortlist</strong><span>You review profiles and make the final selection.</span></div></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php require __DIR__ . '/includes/footer.php'; ?>
