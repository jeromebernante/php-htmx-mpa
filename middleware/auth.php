<?php
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isLoggedIn() && ($_SESSION['role'] === 'admin');
}

function isUser() {
    return isLoggedIn() && ($_SESSION['role'] === 'user');
}

function getUserRole() {
    return $_SESSION['role'] ?? null;
}