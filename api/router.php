<?php
/* KAJARA — router for PHP's built-in dev server, mirroring vercel.json and .htaccess.
   Run from the project root so assets/ is the document root's sibling of api/:
   php -S localhost:8000 api/router.php */

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$routes = ['/' => 'index.php', '/about' => 'about.php', '/services' => 'services.php', '/contact' => 'contact.php'];

if (preg_match('#^/(api|storage)(/|$)|/\.#', $path)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return true;
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

if (is_file(dirname(__DIR__) . $path)) {
    return false; // static asset, served from the project root
}

http_response_code(404);
require __DIR__ . '/404.php';
