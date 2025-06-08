<nav  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Bagian kiri kosong (dulu logo) -->
            <div></div>

            <!-- Profile & Logout -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->nama_lengkap }}</span>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="text-white-500 hover:text-white-700 dark:text-white-400 dark:hover:text-white-300">
                            ▼
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
