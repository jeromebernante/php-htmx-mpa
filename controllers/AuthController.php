<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

$pdo = getDbConnection();
$userModel = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'register':
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                if ($userModel->register($username, $email, $password)) {
                    header('Location: /login');
                } else {
                    echo "Registration failed.";
                }
                break;
            case 'login':
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = $userModel->login($username, $password);
                if ($user) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    if ($user['role'] === 'admin') {
                        header('Location: /admin/dashboard');
                    } else {
                        header('Location: /user/dashboard');
                    }
                } else {
                    echo "Invalid credentials.";
                }
                break;
        }
    }
}