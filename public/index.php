<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/../functions/environment.php';
require_once __DIR__ . '/../functions/database.php';

// --- Functions ---
function renderPage(string $view_dir, array $data = []): void
{
    extract($data);
    ob_start();
    require __DIR__ . '/../views/' . $view_dir . '.php';
    $view = ob_get_clean();
    $title   = $data['title'] ?? 'E-Wallet';
    require __DIR__ . '/../views/layout.php';
}

// use this if using htmx
function renderSection(string $view_dir, array $data = []): void
{
    extract($data);
    require __DIR__ . '/../views/' . $view_dir . '.php';
}
// use this if using htmx
function renderComponent(string $view_dir, array $data = []): void
{
    extract($data);
    require __DIR__ . '/../views/' . $view_dir . '.php';
}


// --- Routes ---
$routes = [
    '/'         => ['page'      => 'public/home-page', 'title' => 'Home'],
    '/home'     => ['page'      => 'public/home-page', 'title' => 'Home'],
    '/features' => ['section'   => 'public/sections/features'],
    '/users'    => ['section'   => 'public/sections/users'],
];

// --- Router ---
$path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = $routes[$path] ?? null;

if (!$route) {
    http_response_code(404);
    renderPage('errors/404', ['title' => 'Page Not Found']);
    exit;
}

if (isset($route['page'])) {
    renderPage($route['page'], ['title' => $route['title']]);
    exit;
}

if (isset($route['section'])) {
    renderSection($route['section']);
    exit;
}

if (isset($route['component'])) {
    renderComponent($route['component']);
    exit;
}