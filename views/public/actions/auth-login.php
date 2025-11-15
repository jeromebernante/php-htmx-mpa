<?php
if (!isset($_SERVER['HTTP_HX_REQUEST'])) {
    http_response_code(403);
    exit('Forbidden');
}

require_once __DIR__ . '/../../../models/User.php';
$userModel = new User(getDbConnection());

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    echo<<<HTML
            <div class="alert alert-error">All fields are required.</div>
        HTML;
    exit;
}

$user = $userModel->login($username, $password);

if (!$user) {
    echo<<<HTML
            <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Invalid Cridential.</span>
            </div>
        HTML;
    exit;
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['role'] = $user['role'];

// HTMX redirect
// header("HX-Redirect: /home");
echo    <<<HTML
            <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Login Success.</span>
            </div>
        HTML;
exit;
