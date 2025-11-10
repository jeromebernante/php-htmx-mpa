<div class="max-w-4xl mx-auto px-4">
    <?php include __DIR__ . '/sections/hero.php'; ?>

    <section id="features"
             class="mt-8">
        <div hx-get="/features" hx-trigger="load" hx-swap="outerHTML">
            <div class="text-gray-400 text-center py-6">Loading features...</div>
        </div>
    </section>
</div>