<nav x-data="{ open: false }" class="dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between  lg:justify-end items-center h-16">
        <!-- Hamburger -->
        <div class="-mr-2 items-center lg:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="text-sm">
            {{ date('d ,  M Y  H:i') }}
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }">
        <!-- Responsive Settings Options -->
        <div class="pt-4 bg-white w-1/2 z-10 fixed pb-1 border-t border-gray-200 dark:border-gray-600 shadow-lg">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" class="{{ Request()->path() === '/' ? 'bg-blues' : '' }}">
                    Dashboard
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('transaction')" class="{{ Request()->is('transaction*') ? 'bg-blues' : '' }}">
                    Transaction
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('packages')" class="{{ Request()->is('packages*') ? 'bg-blues' : '' }}">
                    Packages
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('user')" class="{{ Request()->is('user*') ? 'bg-blues' : '' }}">
                    User
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
