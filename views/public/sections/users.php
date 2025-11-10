<?php

if (!isset($_SERVER['HTTP_HX_REQUEST'])) {
    // Not an HTMX request, block access
    http_response_code(403);
    exit('Direct access forbidden');
}

require_once __DIR__ . '/../../../models/User.php';

$userModel = new User(getDbConnection());
$users = $userModel->getAllUsers();
?>

<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
    <table class="table w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <th><?= htmlspecialchars($user['id']) ?></th>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= number_format((float)$user['balance'], 2) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td><?= htmlspecialchars($user['created_at']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
