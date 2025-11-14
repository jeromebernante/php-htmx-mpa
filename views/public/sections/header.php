<!-- LEFT MENU DRAWER -->
<div class="drawer max-w-[1440px] mx-auto">
  <input id="drawer-left" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content">

    <!-- RIGHT MENU DRAWER (NESTED OUTSIDE) -->
    <div class="drawer drawer-end">
      <input id="drawer-right" type="checkbox" class="drawer-toggle" />
      <div class="drawer-content">
        <!-- header navigation -->
        <header class="w-full bg-base-100 shadow-sm">
          <div class="navbar max-w-[1080px] mx-auto px-4">

            <!-- LEFT: menu icon + current page label -->
            <div class="navbar-start gap-2">
              <label for="drawer-left" class="btn btn-ghost btn-circle">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                </svg>
              </label>

              <span class="text-base font-medium">Home</span>
            </div>

            <!-- CENTER: JKash Title -->
            <div class="navbar-center">
              <span class="text-xl font-bold">JKash</span>
            </div>

            <!-- RIGHT: Login Button -->
            <div class="navbar-end">
              <label
                for="drawer-right"
                class="btn btn-base-100 btn-sm rounded-full gap-2">
                Login
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 20c0-3.31 2.69-6 6-6s6 2.69 6 6" />
                </svg>

              </label>
            </div>

          </div>
        </header>

      </div>

      <!-- RIGHT DRAWER MENU -->
      <div class="drawer-side z-50">
        <label for="drawer-right" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200">
          <li class="menu-title text-base">Account</li>
          <li><a>Login</a></li>
          <li><a>Register</a></li>
        </ul>
      </div>
    </div>

  </div>

  <!-- LEFT DRAWER MENU -->
  <div class="drawer-side z-50">
    <label for="drawer-left" class="drawer-overlay"></label>
    <ul class="menu p-4 w-80 min-h-full bg-base-200">
      <li class="menu-title text-base">Menu</li>
      <li><a>Home</a></li>
      <li><a>Wallet</a></li>
      <li><a>Send Money</a></li>
      <li><a>Transactions</a></li>
      <li><a>Pay Bills</a></li>
      <li><a>Settings</a></li>
    </ul>
  </div>

</div>