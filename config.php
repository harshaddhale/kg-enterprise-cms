<?php
/* KAJARA — site settings.
   Values in [brackets] are placeholders carried over from the design; replace them before launch.
   To keep secrets or per-server values out of git, copy any keys into config.local.php
   (same shape, returns an array) — it is merged over these defaults and ignored by git. */

$config = [
    'site_url' => 'https://www.kajaragroup.com',
    // 'base_path' => '/',  // URL folder the site is served from; auto-detected, set only if links come out wrong
    'company'  => 'KAJARA Ltd',
    'company_no' => '11041244',

    /* Contact details shown on the site */
    'email'          => '[Email address]',
    'email_href'     => 'hello@example.com',
    'phone'          => '[Phone number]',
    'phone_href'     => '+440000000000',
    'phone_hours'    => '[Mon–Fri, hours, time zone]',
    'reply_hours'    => '[X]',
    'call_minutes'   => '[30]',
    'booking_url'    => '#',
    'office_address' => '[Registered office address]',

    /* Contact form delivery */
    'mail_to'      => '',                          // where enquiries are emailed; empty = log only
    'mail_from'    => 'no-reply@kajaragroup.com',  // must be a domain your server may send for
    'mail_subject' => 'New call-back request from the website',
    'storage_dir'  => __DIR__ . '/storage',        // every enquiry is also appended here
    'rate_limit'   => 5,                           // max submissions per visitor session per hour
];

if (is_file(__DIR__ . '/config.local.php')) {
    $config = array_replace($config, require __DIR__ . '/config.local.php');
}

return $config;
