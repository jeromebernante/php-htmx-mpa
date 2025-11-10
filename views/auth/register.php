<form action="/auth/register" method="POST" class="bg-white p-6 rounded shadow" hx-post="/auth/register" hx-target="#response">
    <input type="hidden" name="action" value="register">
    <input type="text" name="username" placeholder="Username" class="border p-2 mb-2 w-full" required>
    <input type="email" name="email" placeholder="Email" class="border p-2 mb-2 w-full" required>
    <input type="password" name="password" placeholder="Password" class="border p-2 mb-2 w-full" required>
    <button type="submit" class="bg-blue-500 text-white p-2">Register</button>
</form>
<div id="response"></div>