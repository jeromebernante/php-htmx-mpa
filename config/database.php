<?php
function getDbConnection() {
    $host = 'localhost';
    $db = 'ewallet_db';
    $user = 'root';
    $pass = '';
    try {
        $pdo = new PDO("mysql:host=$host:dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection  failed " . $e->getMessage());
    }
}