<div class="bg-base-100 shadow sticky top-0 z-50">
    <?php include __DIR__ . '/sections/header.php'; ?>
</div>

<section class="min-h-[600px] max-w-[1440px] flex items-center justify-center bg-base-200 mx-auto px-4 py-16">
    <div id="login-card" class="card shadow-lg bg-base-100">
        <div class="card-body">

            <h2 class="text-xl text-center text-base-content">Login</h2>
            <div id="login-message" class="mt-3"></div>
            <form class="fieldset w-xs"
                hx-post="/auth-login"
                hx-target="#login-message"
                hx-swap="innerHTML"
                hx-indicator="#login-loading">


                <label class="label text-base-content">Email</label>
                <input type="text"
                    name="username"
                    class="input input-bordered"
                    value=""
                    placeholder="username"
                    required />

                <label class="label text-base-content">Password</label>
                <input type="password"
                    name="password"
                    class="input input-bordered"
                    placeholder="Password"
                    required />

                <button type="submit" class="btn btn-neutral mt-4 w-full"><span class="relative">Login<span id="login-loading" class="absolute left-[calc(100%+4px)] htmx-indicator loading loading-spinner loading-sm"></span></span></button>
            </form>

            <p class="text-center text-sm mt-4 text-base-content">
                Don't have an account?
                <a class="link link-primary link-hover" href="#">Register</a>
            </p>

        </div>
    </div>
</section>

<div>
    <?php include __DIR__ . '/sections/footer.php'; ?>
</div>