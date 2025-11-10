<form hx-post="/user/action" hx-target="#response" class="bg-white p-6 rounded shadow">
    <input type="hidden" name="action" value="deposit">
    <input type="number" name="amount" placeholder="Amount" class="border p-2 mb-2 w-full" required min="1">
    <button type="submit" class="bg-green-500 text-white p-2">Deposit</button>
</form>
<div id="response" hx-swap="innerHTML" hx-get="/user/balance" hx-trigger="load from:#response"></div>  <!-- Updates balance -->