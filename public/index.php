<?php
session_start();
require_once __DIR__ . '/../config/database.php';
// Include models and controllers as needed

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function renderView($view, $layout = 'main') {
    ob_start();
    include __DIR__ . '/../views/' . $view . '.php';
    $content = ob_get_clean();
    include __DIR__ . '/../views/layouts/' . $layout . '.php';
}

switch ($path) {
    case '/register':
        renderView('auth/register');
        break;
    case '/login':
        renderView('auth/login');
        break;
    case '/auth/register':
    case '/auth/login':
        include __DIR__ . '/../controllers/AuthController.php';  // Handles POST
        break;
    // Add more cases for other paths
    default:
        echo "404 Not Found";
}