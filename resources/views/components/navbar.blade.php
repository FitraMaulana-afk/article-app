<nav aria-label="secondary" x-data="{ open: false }"
    class="sticky top-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-blue-500 dark:bg-dark-eval-1"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

    <div class="flex items-center gap-3">
        <x-button type="button" class="md:hidden" icon-only variant="secondary" sr-text="Toggle dark mode"
            x-on:click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />

            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>
    </div>

    <div class="flex items-center gap-3">
        <x-button type="button" class="hidden md:inline-flex" icon-only variant="blue" sr-text="Toggle dark mode"
            x-on:click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />

            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <div class="flex items-center gap-3 cursor-pointer text-white dark:bg-dark-eval-1">
                    <img @if (!empty(auth()->user()->avatar)) src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        @else
                        src="{{ asset('assets/content/defaultAvatar1.jpg') }}" @endif
                        alt="Avatar"
                        class="w-10 rounded-full bg-black shadow-lg hover:shadow-2xl transition-all ease-in-out duration-300">
                    <div>{{ Auth::user()->name }}</div>
                </div>
            </x-slot>

            <x-slot name="content">
                <!-- Profile -->
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('landing.logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('landing.logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<!-- Mobile bottom bar -->
<div class="fixed inset-x-0 bottom-0 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white md:hidden dark:bg-dark-eval-1"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">
    <x-button type="button" icon-only variant="secondary" sr-text="Search">
        <x-heroicon-o-search aria-hidden="true" class="w-6 h-6" />
    </x-button>

    <a href="{{ route('dashboard') }}">
        <x-application-logo aria-hidden="true" class="w-10 h-10" />

        <span class="sr-only">Dashboard</span>
    </a>

    <x-button type="button" icon-only variant="secondary" sr-text="Open main menu"
        x-on:click="isSidebarOpen = !isSidebarOpen">
        <x-heroicon-o-menu x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6" />

        <x-heroicon-o-x x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
    </x-button>
</div>
