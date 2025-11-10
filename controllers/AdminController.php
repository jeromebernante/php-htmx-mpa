<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Transaction.php';

$pdo = getDbConnection();
$userModel = new User($pdo);
$transactionModel = new Transaction($pdo);

require_once __DIR__ . '/../middleware/auth.php';

if (!isLoggedIn()) {
    header('Location: /login');
    exit;
}

if (!isAdmin()) {
    header('Location: /user/dashboard');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $userId = intval($_POST['user_id']);

    switch ($action) {
        case 'deposit':
        case 'withdraw':
            $amount = floatval($_POST['amount']);
            $targetUser = $userModel->getById($userId);
            $newBalance = ($action === 'deposit') ? $targetUser['balance'] + $amount : $targetUser['balance'] - $amount;
            if ($action === 'withdraw' && $newBalance < 0) {
                echo "Insufficient balance.";
                break;
            }
            $userModel->updateBalance($userId, $newBalance);
            $transactionModel->log($userId, $action, $amount);
            echo ucfirst($action) . " successful for user.";
            break;
        case 'update_profile':
            $username = $_POST['username'];
            $email = $_POST['email'];
            $userModel->updateProfile($userId, $username, $email);
            echo "Profile updated.";
            break;
        case 'delete':
            $userModel->delete($userId);
            echo "User deleted.";
            break;
    }
    exit;
}