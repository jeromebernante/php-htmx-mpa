<?php
class Transaction {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function log($userId, $type, $amount, $targetUserId = null) {
        $stmt = $this->pdo->prepare("INSERT INTO transactions (user_id, type, amount, target_user_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$userId, $type, $amount, $targetUserId]);
    }

    public function getByUser($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions WHERE user_id = ? OR target_user_id = ? ORDER BY created_at DESC LIMIT 10");
        $stmt->execute([$userId, $userId]);
        return $stmt->fetchAll();
    }
}