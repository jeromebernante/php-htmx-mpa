<?php
require_once __DIR__ . '/../functions/database.php';

function create_transactions_table() {
    try {
        $pdo = getDbConnection();
        
        // Create transactions table
        $pdo->exec("CREATE TABLE IF NOT EXISTS transactions (
            id INT(11) NOT NULL AUTO_INCREMENT,
            user_id INT(11) NOT NULL,
            type ENUM('deposit', 'withdraw', 'transfer_sent', 'transfer_received') NOT NULL,
            amount DECIMAL(10,2) NOT NULL,
            target_user_id INT(11) DEFAULT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY user_id (user_id),
            CONSTRAINT transactions_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        echo "Transactions table created successfully\n";
    } catch(PDOException $e) {
        die("Creation of transactions table failed: " . $e->getMessage() . "\n");
    }
}
