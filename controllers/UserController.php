<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Transaction.php';

$pdo = getDbConnection();
$userModel = new User($pdo);
$transactionModel = new Transaction($pdo);

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: /login');
    exit;
}

$user = $userModel->getById($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $amount = floatval($_POST['amount']);
    $currentBalance = $user['balance'];

    switch ($action) {
        case 'deposit':
            $newBalance = $currentBalance + $amount;
            $userModel->updateBalance($user['id'], $newBalance);
            $transactionModel->log($user['id'], 'deposit', $amount);
            echo "Deposit successful. New balance: $newBalance";  // For HTMX response
            break;
        case 'withdraw':
            if ($amount <= $currentBalance) {
                $newBalance = $currentBalance - $amount;
                $userModel->updateBalance($user['id'], $newBalance);
                $transactionModel->log($user['id'], 'withdraw', $amount);
                echo "Withdrawal successful. New balance: $newBalance";
            } else {
                echo "Insufficient balance.";
            }
            break;
        case 'transfer':
            $targetUsername = $_POST['target_username'];
            $targetStmt = $pdo->prepare("SELECT id, balance FROM users WHERE username = ?");
            $targetStmt->execute([$targetUsername]);
            $target = $targetStmt->fetch();
            if ($target && $amount <= $currentBalance) {
                $newSenderBalance = $currentBalance - $amount;
                $newReceiverBalance = $target['balance'] + $amount;
                $userModel->updateBalance($user['id'], $newSenderBalance);
                $userModel->updateBalance($target['id'], $newReceiverBalance);
                $transactionModel->log($user['id'], 'transfer_sent', $amount, $target['id']);
                $transactionModel->log($target['id'], 'transfer_received', $amount, $user['id']);
                echo "Transfer successful. New balance: $newSenderBalance";
            } else {
                echo "Invalid target or insufficient balance.";
            }
            break;
    }
    exit;  // For HTMX partial responses
}