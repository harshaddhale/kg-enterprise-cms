<?php
/* KAJARA — call-back request handler: validates, rate-limits, stores and emails each enquiry.
   Returns ['ok' => bool, 'errors' => [field => message], 'values' => cleaned input]. */

const CONTACT_REACH = ['phone' => 'Phone call', 'email' => 'Email', 'either' => 'Either is fine'];

const CONTACT_ERRORS = [
    'name'    => 'Enter your name.',
    'email'   => 'Enter a valid email address, like name@company.com.',
    'phone'   => 'Enter a phone number, including country code.',
    'consent' => 'Tick the box so we can contact you about your enquiry.',
];

function contact_defaults(): array
{
    return ['name' => '', 'company' => '', 'email' => '', 'phone' => '', 'reach' => 'phone', 'consent' => false];
}

function handle_contact(array $post): array
{
    start_session();

    $one_line = fn($key, $max) => mb_substr(trim(preg_replace('/[\r\n\t]+/', ' ', (string) ($post[$key] ?? ''))), 0, $max);
    $values = [
        'name'    => $one_line('name', 120),
        'company' => $one_line('company', 160),
        'email'   => $one_line('email', 254),
        'phone'   => $one_line('phone', 40),
        'reach'   => array_key_exists($post['reach'] ?? '', CONTACT_REACH) ? $post['reach'] : 'phone',
        'consent' => !empty($post['consent']),
    ];

    if (!hash_equals($_SESSION['csrf'] ?? '', (string) ($post['csrf'] ?? ''))) {
        return ['ok' => false, 'errors' => ['form' => 'Your session expired. Please submit the form again.'], 'values' => $values];
    }

    /* Honeypot: real visitors never see or fill this field. Pretend success so bots learn nothing. */
    if (trim((string) ($post['website'] ?? '')) !== '') {
        return ['ok' => true, 'errors' => [], 'values' => $values];
    }

    $errors = [];
    if ($values['name'] === '') $errors['name'] = CONTACT_ERRORS['name'];
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = CONTACT_ERRORS['email'];
    if (!preg_match('/^[0-9+()\-\s]{7,}$/', $values['phone'])) $errors['phone'] = CONTACT_ERRORS['phone'];
    if (!$values['consent']) $errors['consent'] = CONTACT_ERRORS['consent'];
    if ($errors) {
        return ['ok' => false, 'errors' => $errors, 'values' => $values];
    }

    $now = time();
    $recent = array_filter($_SESSION['contact_sent'] ?? [], fn($t) => $t > $now - 3600);
    if (count($recent) >= (int) cfg('rate_limit')) {
        return ['ok' => false, 'errors' => ['form' => 'You have sent several requests already. Please call or email us instead.'], 'values' => $values];
    }

    $enquiry = [
        'received' => date('c', $now),
        'name'     => $values['name'],
        'company'  => $values['company'],
        'email'    => $values['email'],
        'phone'    => $values['phone'],
        'reach'    => CONTACT_REACH[$values['reach']],
        'ip'       => $_SERVER['REMOTE_ADDR'] ?? '',
    ];

    $stored = store_enquiry($enquiry);
    $mailed = email_enquiry($enquiry);
    if (!$stored && !$mailed) {
        return ['ok' => false, 'errors' => ['form' => 'We could not send your request just now. Please call or email us instead.'], 'values' => $values];
    }

    $recent[] = $now;
    $_SESSION['contact_sent'] = array_values($recent);
    return ['ok' => true, 'errors' => [], 'values' => contact_defaults()];
}

function store_enquiry(array $enquiry): bool
{
    $dir = cfg('storage_dir');
    if (!is_dir($dir) && !@mkdir($dir, 0750, true)) {
        error_log('KAJARA contact: cannot create storage dir ' . $dir);
        return false;
    }
    $line = json_encode($enquiry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
    $ok = @file_put_contents($dir . '/enquiries.jsonl', $line, FILE_APPEND | LOCK_EX) !== false;
    if (!$ok) error_log('KAJARA contact: cannot write to ' . $dir . '/enquiries.jsonl');
    return $ok;
}

function email_enquiry(array $enquiry): bool
{
    $to = cfg('mail_to');
    if ($to === '') return false;

    $body = "New call-back request from the KAJARA website\n\n";
    foreach (['name' => 'Name', 'company' => 'Company', 'email' => 'Email', 'phone' => 'Phone', 'reach' => 'Best way to reach', 'received' => 'Received'] as $key => $label) {
        $body .= str_pad($label . ':', 20) . ($enquiry[$key] !== '' ? $enquiry[$key] : '—') . "\n";
    }

    /* Name and email are already stripped of line breaks, so they are safe in headers. */
    $headers = [
        'From'         => 'KAJARA website <' . cfg('mail_from') . '>',
        'Reply-To'     => $enquiry['email'],
        'Content-Type' => 'text/plain; charset=UTF-8',
    ];
    $subject = '=?UTF-8?B?' . base64_encode(cfg('mail_subject') . ' — ' . $enquiry['name']) . '?=';

    $ok = @mail($to, $subject, $body, $headers);
    if (!$ok) error_log('KAJARA contact: mail() failed for enquiry from ' . $enquiry['email']);
    return $ok;
}
