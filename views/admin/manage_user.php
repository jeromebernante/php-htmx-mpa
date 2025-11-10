<?php $managedUser = $userModel->getById($userId); ?>
<h2>Manage <?php echo $managedUser['username']; ?></h2>
<form hx-post="/admin/action" hx-target="#response">
    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
    <!-- Update profile form -->
    <input type="text" name="username" value="<?php echo $managedUser['username']; ?>">
    <input type="email" name="email" value="<?php echo $managedUser['email']; ?>">
    <button type="submit" name="action" value="update_profile">Update Profile</button>
</form>
<!-- Deposit form -->
<form hx-post="/admin/action" hx-target="#response">
    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
    <input type="hidden" name="action" value="deposit">
    <input type="number" name="amount" placeholder="Amount">
    <button type="submit">Deposit</button>
</form>
<!-- Withdraw similar -->
<form hx-post="/admin/action" hx-target="#response">
    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
    <input type="hidden" name="action" value="delete">
    <button type="submit" class="bg-red-500 text-white">Delete User</button>
</form>
<div id="response"></div>