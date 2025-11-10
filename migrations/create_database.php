<?php
require_once __DIR__ . '/../functions/database.php';

function create_database() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
        echo "Database created or already exists successfully\n";
    } catch(PDOException $e) {
        die("Database creation failed: " . $e->getMessage() . "\n");
    }
}
