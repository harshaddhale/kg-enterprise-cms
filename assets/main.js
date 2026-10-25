/* KAJARA — site interactions: sticky header, mobile menu, scroll reveal, FAQ accordion, copy buttons, contact form */
(function () {
  'use strict';
  var doc = document.documentElement;
  doc.classList.add('js');
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Year */
  document.querySelectorAll('[data-year]').forEach(function (el) { el.textContent = new Date().getFullYear(); });

  /* Header shadow on scroll */
  var header = document.querySelector('[data-header]');
  function onScroll() {
    if (header) header.classList.toggle('is-scrolled', window.scrollY > 8);
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* Mobile menu */
  var menuBtn = document.querySelector('[data-menu-btn]');
  var mobileNav = document.querySelector('[data-mobile-nav]');
  function setMenu(open) {
    if (!menuBtn || !mobileNav) return;
    menuBtn.setAttribute('aria-expanded', String(open));
    menuBtn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    mobileNav.classList.toggle('is-open', open);
    if (open) mobileNav.removeAttribute('inert'); else mobileNav.setAttribute('inert', '');
  }
  if (menuBtn && mobileNav) {
    setMenu(false);
    menuBtn.addEventListener('click', function () {
      setMenu(menuBtn.getAttribute('aria-expanded') !== 'true');
    });
    mobileNav.addEventListener('click', function (e) {
      if (e.target.closest('a')) setMenu(false);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menuBtn.getAttribute('aria-expanded') === 'true') { setMenu(false); menuBtn.focus(); }
    });
    window.addEventListener('resize', function () { if (window.innerWidth > 1080) setMenu(false); });
  }

  /* Scroll reveal — only elements that start below the fold are hidden, so the first view is always complete */
  var revealEls = Array.prototype.slice.call(document.querySelectorAll('.reveal'));
  if (!reduceMotion && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          el.classList.add('is-revealing', 'is-in');
          el.classList.remove('is-pending');
          setTimeout(function () { el.classList.remove('is-revealing'); }, 1400);
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    var fold = window.innerHeight || 800;
    revealEls.forEach(function (el) {
      if (el.getBoundingClientRect().top > fold * 0.92) {
        el.classList.add('is-pending');
        io.observe(el);
      } else {
        el.classList.add('is-in');
      }
    });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-in'); });
  }

  /* FAQ accordion with smooth height */
  document.querySelectorAll('.faq details').forEach(function (details) {
    var summary = details.querySelector('summary');
    var panel = details.querySelector('.faq-a');
    if (!summary || !panel || reduceMotion || !panel.animate) return;
    var running = null;
    summary.addEventListener('click', function (e) {
      e.preventDefault();
      if (running) running.cancel();
      var start = panel.offsetHeight;
      if (details.open) {
        running = panel.animate([{ height: start + 'px', opacity: 1 }, { height: '0px', opacity: 0 }],
          { duration: 280, easing: 'cubic-bezier(.2,.7,.2,1)' });
        running.onfinish = function () { details.open = false; running = null; };
      } else {
        details.open = true;
        var end = panel.scrollHeight;
        running = panel.animate([{ height: '0px', opacity: 0 }, { height: end + 'px', opacity: 1 }],
          { duration: 340, easing: 'cubic-bezier(.2,.7,.2,1)' });
        running.onfinish = function () { running = null; };
      }
    });
  });

  /* Copy buttons */
  document.querySelectorAll('[data-copy]').forEach(function (btn) {
    var label = btn.querySelector('[data-copy-label]');
    var original = label ? label.textContent : '';
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var text = btn.getAttribute('data-copy');
      function done(ok) {
        btn.classList.toggle('is-copied', ok);
        if (label) label.textContent = ok ? 'Copied' : 'Select to copy';
        setTimeout(function () { btn.classList.remove('is-copied'); if (label) label.textContent = original; }, 1800);
      }
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function () { done(true); }, function () { done(false); });
      } else {
        done(false);
      }
    });
  });

  /* Contact form — visual only: validates, shows a loading state, then a confirmation */
  var form = document.querySelector('[data-contact-form]');
  if (form) {
    var success = document.querySelector('[data-form-success]');
    var submit = form.querySelector('[type="submit"]');
    var fields = Array.prototype.slice.call(form.querySelectorAll('[data-validate]'));

    function check(input) {
      var wrap = input.closest('.field');
      var ok = input.checkValidity();
      input.classList.toggle('is-invalid', !ok);
      input.setAttribute('aria-invalid', String(!ok));
      if (wrap) wrap.classList.toggle('has-error', !ok);
      return ok;
    }
    fields.forEach(function (input) {
      input.addEventListener('blur', function () { if (input.value) check(input); });
      input.addEventListener('input', function () { if (input.classList.contains('is-invalid')) check(input); });
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var firstBad = null;
      fields.forEach(function (input) { if (!check(input) && !firstBad) firstBad = input; });
      var consent = form.querySelector('[data-consent]');
      if (consent && !consent.checked) {
        consent.closest('.consent').classList.add('has-error');
        if (!firstBad) firstBad = consent;
      }
      if (firstBad) { firstBad.focus(); return; }
      submit.classList.add('is-loading');
      submit.setAttribute('aria-busy', 'true');
      setTimeout(function () {
        form.hidden = true;
        if (success) {
          success.hidden = false;
          var heading = success.querySelector('h2');
          if (heading) { heading.setAttribute('tabindex', '-1'); heading.focus(); }
        }
      }, 900);
    });

    var again = document.querySelector('[data-form-reset]');
    if (again) {
      again.addEventListener('click', function () {
        form.reset();
        submit.classList.remove('is-loading');
        submit.removeAttribute('aria-busy');
        form.hidden = false;
        success.hidden = true;
        var first = form.querySelector('input');
        if (first) first.focus();
      });
    }
    var consentBox = form.querySelector('[data-consent]');
    if (consentBox) consentBox.addEventListener('change', function () { consentBox.closest('.consent').classList.remove('has-error'); });
  }
})();
