<div class="max-w-4xl mx-auto px-4 pb-8">
    <?php include __DIR__ . '/sections/hero.php'; ?>

    <!-- server render using htmx -->
    <section id="features" class="mt-8">
        <div hx-get="/features" hx-trigger="load" hx-swap="outerHTML">
            <div class="text-gray-400 text-center py-6">Loading features...</div>
        </div>
    </section>

    <section class="mt-8">
        <button class="btn" onclick="my_modal_1.showModal()">open modal</button>
        <dialog id="my_modal_1" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Hello!</h3>
                <p class="py-4">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </section>
    <!-- server render using htmx -->
    <section id="users" class="mt-8">
        <div hx-get="/users" hx-trigger="load" hx-swap="outerHTML">
            <div>Loading users...</div>
        </div>
    </section>

</div>