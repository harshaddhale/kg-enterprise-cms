<?php
/* KAJARA — router for PHP's built-in dev server, mirroring .htaccess:
   php -S localhost:8000 router.php */

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$routes = ['/' => 'index.php', '/about' => 'about.php', '/services' => 'services.php', '/contact' => 'contact.php'];

if (preg_match('#^/(includes|storage)(/|$)|^/(config(\.local)?|router)\.php$|/\.#', $path)) {
    http_response_code(403);
    exit('Forbidden');
}

if (preg_match('#^/(index|about|services|contact)\.(html|php)$#', $path, $m)) {
    $query = $_SERVER['QUERY_STRING'] ?? '';
    header('Location: /' . ($m[1] === 'index' ? '' : $m[1]) . ($query !== '' ? '?' . $query : ''), true, 301);
    exit;
}

$route = $path === '/' ? '/' : rtrim($path, '/');
if (isset($routes[$route])) {
    require __DIR__ . '/' . $routes[$route];
    return true;
}

if (is_file(__DIR__ . $path)) {
    return false; // static asset
}

http_response_code(404);
require __DIR__ . '/404.php';
