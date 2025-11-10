<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/AdminController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Transaction.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function renderView($view, $layout = 'main') {
    ob_start();
    include __DIR__ . '/../views/' . $view . '.php';
    $content = ob_get_clean();
    include __DIR__ . '/../views/layouts/' . $layout . '.php';
}

switch ($path) {
    case '/':
    case '':
        header('Location: /login');
        break;
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
    case '/user/dashboard':
        renderView('user/dashboard');
        break;
    case '/user/deposit':
        renderView('user/deposit');
        break;
    case '/user/withdraw':
        renderView('user/withdraw');
        break;
    case '/user/transfer':
        renderView('user/transfer');
        break;
    case '/admin/dashboard':
        renderView('admin/dashboard');
        break;
    case '/admin/users':
        renderView('admin/users');
        break;
    case '/admin/manage-user':
        renderView('admin/manage_user');
        break;
    case '/logout':
        session_destroy();
        header('Location: /login');
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
}