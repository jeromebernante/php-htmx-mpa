<?php
require_once __DIR__ . '/../functions/database.php';
require_once __DIR__ . '/../models/User.php';

$pdo = getDbConnection();
$userModel = new User($pdo);

$username = 'admin';
$email = 'admin@example.com';
$password = 'admin123'; // In a real app, use a more secure password and handle it properly.

if ($userModel->register($username, $email, $password, 'admin')) {
    echo "Admin user created successfully.\n";
} else {
    echo "Failed to create admin user. It might already exist.\n";
}

