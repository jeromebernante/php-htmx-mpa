<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../middleware/auth.php';
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

// Define route groups
$publicRoutes = ['/login', '/register', '/auth/login', '/auth/register'];
$userRoutes = ['/user/dashboard', '/user/deposit', '/user/withdraw', '/user/transfer'];
$adminRoutes = ['/admin/dashboard', '/admin/users', '/admin/manage-user'];

// Check if current path is in a route group
$isPublicRoute = in_array($path, $publicRoutes);
$isUserRoute = in_array($path, $userRoutes);
$isAdminRoute = in_array($path, $adminRoutes);

// Handle root path
if ($path === '/' || $path === '') {
    if (isset($_SESSION['user_id'])) {
        $role = $_SESSION['role'] ?? 'user';
        header('Location: ' . ($role === 'admin' ? '/admin/dashboard' : '/user/dashboard'));
    } else {
        header('Location: /login');
    }
    exit();
}

// Route protection logic
if ($isPublicRoute) {
    // Redirect logged-in users away from public routes
    if (isset($_SESSION['user_id'])) {
        $role = $_SESSION['role'] ?? 'user';
        header('Location: ' . ($role === 'admin' ? '/admin/dashboard' : '/user/dashboard'));
        exit();
    }
} elseif ($isUserRoute || $isAdminRoute) {
    // Ensure user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit();
    }
    
    // Check admin access
    if ($isAdminRoute && $_SESSION['role'] !== 'admin') {
        header('Location: /user/dashboard');
        exit();
    }
    
    // Check user access
    if ($isUserRoute && $_SESSION['role'] !== 'user') {
        header('Location: /admin/dashboard');
        exit();
    }
}

// Route handling
switch ($path) {
    case '/register':
        renderView('auth/register');
        break;
    case '/login':
        renderView('auth/login');
        break;
    case '/auth/register':
    case '/auth/login':
        require __DIR__ . '/../controllers/AuthController.php';
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
        exit();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
}