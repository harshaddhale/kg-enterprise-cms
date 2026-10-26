<?php
/* KAJARA — shared setup and template helpers, loaded first by every page. */

declare(strict_types=1);

/* PHP lives in api/ (Vercel's convention); the site root, with assets/ and storage/, is one level up. */
const SITE_ROOT = __DIR__ . '/../..';

$config = require dirname(__DIR__) . '/config.php';

/* Pages use clean URLs (/about, /contact). Links are root-relative from BASE, the site's URL folder,
   which is detected from the document root so the site also works from a subfolder. */
$root = str_replace('\\', '/', (string) realpath(SITE_ROOT));
$docroot = str_replace('\\', '/', (string) realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));
$in_docroot = $docroot !== '' && str_starts_with($root, $docroot);
define('BASE', $config['base_path'] ?? rtrim($in_docroot ? substr($root, strlen($docroot)) : '', '/') . '/');

const PAGES = [
    'home'     => ['label' => 'Home',     'path' => ''],
    'about'    => ['label' => 'About',    'path' => 'about'],
    'services' => ['label' => 'Services', 'path' => 'services'],
    'contact'  => ['label' => 'Contact',  'path' => 'contact'],
];

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function cfg(string $key): string
{
    global $config;
    return (string) ($config[$key] ?? '');
}

/* Link to a page, optionally to a section. On the current page, a section link stays a bare #anchor. */
function page_url(string $page, string $section = ''): string
{
    global $current_page;
    if ($section !== '' && $page === ($current_page ?? '')) {
        return '#' . $section;
    }
    $path = BASE . PAGES[$page]['path'];
    return $section === '' ? $path : $path . '#' . $section;
}

function nav_links(): string
{
    global $current_page;
    $html = '';
    foreach (PAGES as $key => $page) {
        $current = $key === $current_page ? ' aria-current="page"' : '';
        $html .= '<a href="' . e(BASE . $page['path']) . '"' . $current . '>' . e($page['label']) . "</a>\n";
    }
    return $html;
}

function asset(string $file): string
{
    $mtime = @filemtime(SITE_ROOT . '/assets/' . $file);
    return BASE . 'assets/' . $file . ($mtime ? '?v=' . $mtime : '');
}

function start_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'httponly' => true,
            'samesite' => 'Lax',
            'secure'   => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        ]);
        session_start();
    }
}

function csrf_token(): string
{
    start_session();
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}
