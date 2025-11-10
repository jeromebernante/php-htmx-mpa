<h2>Manage Users</h2>
<table class="w-full border">
    <thead><tr><th>ID</th><th>Username</th><th>Balance</th><th>Actions</th></tr></thead>
    <tbody>
        <?php foreach ($userModel->getAllUsers() as $u): ?>
            <tr>
                <td><?php echo $u['id']; ?></td>
                <td><?php echo $u['username']; ?></td>
                <td><?php echo $u['balance']; ?></td>
                <td><a href="/admin/manage/<?php echo $u['id']; ?>" class="text-blue-500">Manage</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>