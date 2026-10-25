# KAJARA website

PHP site for kajaragroup.com: Home, About, Services and Contact, with a working call-back form.

Requires PHP 8.0+. No database, no Composer packages.

## Run locally

```sh
php -S localhost:8000 router.php
```

Then open http://localhost:8000. `router.php` mirrors the Apache rules below and is only for local development.

## Deploy

Upload the whole folder to any PHP host.

- **Apache** (most shared hosting): works as-is through `.htaccess`. It needs `mod_rewrite` and `AllowOverride All`. If the site lives in a subfolder, update `RewriteBase` and `ErrorDocument` in `.htaccess`.
- **nginx**: add equivalent rules to the server block. This is a starting point, not tested; adjust `fastcgi_pass` for your PHP-FPM socket:

  ```nginx
  index index.php;
  error_page 404 /404.php;
  location ~ ^/(includes|storage)/ { deny all; }
  location ~ ^/(config(\.local)?|router)\.php$ { deny all; }
  location ~ ^/(index|about|services|contact)\.(html|php)$ { rewrite ^/(index|about|services|contact)\.(html|php)$ /$1 permanent; }
  location ~ ^/(about|services|contact)/?$ { try_files /$1.php =404; include fastcgi_params; fastcgi_param SCRIPT_FILENAME $document_root/$1.php; fastcgi_pass php-fpm; }
  location ~ \.php$ { include fastcgi_params; fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; fastcgi_pass php-fpm; }
  ```

The web server user must be able to write to `storage/`.

## Configure

Edit `config.php`, or put overrides in `config.local.php` (git-ignored, returns an array with the same keys).

- Contact details (`email`, `phone`, `phone_hours`, `reply_hours`, `call_minutes`, `booking_url`, `office_address`) are still the design's `[placeholder]` values. Replace them before launch.
- `mail_to`: the address that receives enquiries. When it's empty, enquiries are only logged.
- `mail_from`: must be on a domain your server is allowed to send for (SPF/DKIM), or the emails will land in spam.

Some About-page copy also still has placeholders (`[Year]`, founding story, milestones). Edit those in `about.php`.

## Contact form

`contact.php` posts to itself and is handled by `includes/contact-form.php`:

- Validates on the server too, so it works without JavaScript. With JS it submits through `fetch` and shows errors inline.
- Protected by a CSRF token, a hidden honeypot field and a per-session rate limit (`rate_limit` per hour).
- Every enquiry is appended to `storage/enquiries.jsonl`. It's also emailed with PHP `mail()` when `mail_to` is set. If email fails, the enquiry is still saved, so no lead is lost.

## Structure

```
index.php, about.php, services.php, contact.php, 404.php   pages: metadata + page content
includes/bootstrap.php     config, URL helpers, session/CSRF
includes/header.php        <head>, icon sprite, site header (opens <main>)
includes/footer.php        site footer (closes <main>)
includes/sprite.svg        shared SVG icons
includes/contact-form.php  form validation, storage and email
assets/                    styles.css, main.js
storage/                   enquiry log (not web-accessible, not in git)
```

Old `.html` URLs redirect (301) to the clean URLs (`/about`, `/services`, `/contact`).
