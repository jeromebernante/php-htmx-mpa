<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Wallet App</title>
    <link rel="stylesheet" href="/css/tailwind-output.css">
    <script src="/js/htmx.min.js"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 text-white">
        <!-- Navigation links based on role -->
        <?php if (isset($_SESSION['role'])): ?>
            <?php if ($_SESSION['role'] === 'user'): ?>
                <a href="/user/dashboard" class="mx-2">Dashboard</a>
                <a href="/user/deposit" class="mx-2">Deposit</a>
                <a href="/user/withdraw" class="mx-2">Withdraw</a>
                <a href="/user/transfer" class="mx-2">Transfer</a>
            <?php elseif ($_SESSION['role'] === 'admin'): ?>
                <a href="/admin/dashboard" class="mx-2">Dashboard</a>
                <a href="/admin/users" class="mx-2">Manage Users</a>
            <?php endif; ?>
            <a href="/logout" class="mx-2">Logout</a>
        <?php else: ?>
            <a href="/login" class="mx-2">Login</a>
            <a href="/register" class="mx-2">Register</a>
        <?php endif; ?>
    </nav>
    <main class="container mx-auto p-4">
        <?php include $content; ?>  <!-- Dynamic content -->
    </main>
</body>
</html>