<?php
require_once __DIR__ . '/../functions/database.php';

function create_users_table() {
    try {
        $pdo = getDbConnection();
        
        // Create users table
        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT(11) NOT NULL AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            balance DECIMAL(10,2) DEFAULT 0.00,
            role ENUM('user', 'admin') DEFAULT 'user',
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY username (username),
            UNIQUE KEY email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        echo "Users table created successfully\n";
    } catch(PDOException $e) {
        die("Creation of users table failed: " . $e->getMessage() . "\n");
    }
}
