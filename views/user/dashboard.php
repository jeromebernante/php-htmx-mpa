<h1 class="text-2xl">User Dashboard</h1>
<p>Balance: <span id="balance"><?php echo $user['balance']; ?></span></p>
<h2>Recent Transactions</h2>
<ul>
    <?php foreach ($transactionModel->getByUser($user['id']) as $tx): ?>
        <li><?php echo $tx['type'] . ': ' . $tx['amount'] . ' on ' . $tx['created_at']; ?></li>
    <?php endforeach; ?>
</ul>