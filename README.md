# KAJARA website

PHP site for kajaragroup.com: Home, About, Services and Contact, with a working call-back form.

Requires PHP 8.0+. No database, no Composer packages.

## Run locally

```sh
php -S localhost:8000 api/router.php
```

Run it from the project root, then open http://localhost:8000. `api/router.php` mirrors the Vercel and Apache rules below and is only for local development.

## Deploy

All PHP lives in `api/`, the layout Vercel's PHP runtime expects. Static files (`assets/`) stay at the root.

- **Vercel**: `vercel.json` runs `api/*.php` on the `vercel-php` runtime and maps the clean URLs to them. See the serverless notes under Contact form.

- **Apache** (most shared hosting): upload the whole folder; it works as-is through `.htaccess`. It needs `mod_rewrite` and `AllowOverride All`. If the site lives in a subfolder, update `RewriteBase` and `ErrorDocument` in `.htaccess`.
- **nginx**: add equivalent rules to the server block. This is a starting point, not tested; adjust `fastcgi_pass` for your PHP-FPM socket:

  ```nginx
  error_page 404 /api/404.php;
  location ~ ^/(api|storage)/ { internal; }
  location ~ ^/(index|about|services|contact)\.(html|php)$ { rewrite ^/(index|about|services|contact)\.(html|php)$ /$1 permanent; }
  location = / { include fastcgi_params; fastcgi_param SCRIPT_FILENAME $document_root/api/index.php; fastcgi_pass php-fpm; }
  location ~ ^/(about|services|contact)/?$ { include fastcgi_params; fastcgi_param SCRIPT_FILENAME $document_root/api/$1.php; fastcgi_pass php-fpm; }
  ```

The web server user must be able to write to `storage/`.

## Configure

Edit `api/config.php`, or put overrides in `api/config.local.php` (git-ignored, returns an array with the same keys).

- Contact details (`email`, `phone`, `phone_hours`, `reply_hours`, `call_minutes`, `booking_url`, `office_address`) are still the design's `[placeholder]` values. Replace them before launch.
- `mail_to`: the address that receives enquiries. When it's empty, enquiries are only logged.
- `mail_from`: must be on a domain your server is allowed to send for (SPF/DKIM), or the emails will land in spam.

Some About-page copy also still has placeholders (`[Year]`, founding story, milestones). Edit those in `api/about.php`.

## Contact form

`api/contact.php` posts to itself and is handled by `api/includes/contact-form.php`:

- Validates on the server too, so it works without JavaScript. With JS it submits through `fetch` and shows errors inline.
- Protected by a CSRF token, a hidden honeypot field and a per-session rate limit (`rate_limit` per hour).
- Every enquiry is appended to `storage/enquiries.jsonl` (at the project root). It's also emailed with PHP `mail()` when `mail_to` is set. If email fails, the enquiry is still saved, so no lead is lost.

### On Vercel (serverless)

Vercel functions have a read-only filesystem, no `mail()`, and no shared PHP sessions between instances. As it stands, the form can't save or email enquiries there, and the CSRF check can fail between requests. Before relying on the form on Vercel, send enquiries through an email API (e.g. Resend, Postmark, SMTP) and switch the CSRF token to a signed, session-free one.

## Structure

```
api/index.php, about.php, services.php, contact.php, 404.php   pages: metadata + page content
api/config.php                 site settings
api/router.php                 local dev server router
api/includes/bootstrap.php     config, URL helpers, session/CSRF
api/includes/header.php        <head>, icon sprite, site header (opens <main>)
api/includes/footer.php        site footer (closes <main>)
api/includes/logo.php          inline logo
api/includes/sprite.svg        shared SVG icons
api/includes/contact-form.php  form validation, storage and email
assets/                        styles.css, main.js, favicon.svg
storage/                       enquiry log (not web-accessible, not in git)
vercel.json, .htaccess         routing for Vercel and Apache
```

Old `.html` URLs redirect (301) to the clean URLs (`/about`, `/services`, `/contact`).
