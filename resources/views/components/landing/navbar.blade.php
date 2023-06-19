<nav class="top-0 pb-10 pt-5 " x-data="dropdown()">

    <div class="flex w-full justify-center md:px-20 px-5">
        <div class="flex w-full justify-between items-center container">
            <div class="flex gap-1 lg:w-1/4 w-1/2 text-center items-center">
                <img src="{{ asset('assets/content/NavLogo.png') }}" alt="" srcset="">
            </div>
            <div class="flex lg:hidden">
                <button class="navbar-burger flex items-center text-blue-600 p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
            <div class="lg:flex hidden w-3/4 justify-center items-center">
                <x-form.search name="keywords" />
            </div>
            <div class="lg:flex hidden">
                @if (Auth::user())
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <div class="flex items-center gap-3 cursor-pointer">
                                <img @if (!empty(auth()->user()->avatar)) src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                    @else
                                    src="{{ asset('assets/content/defaultAvatar1.jpg') }}" @endif
                                    alt="Avatar"
                                    class="w-10 bg-transparent rounded-full bg-black shadow-lg hover:shadow-2xl transition-all ease-in-out duration-300">
                                {{-- <div class="flex text-sm font-semibold ">{{ Auth::user()->name }}</div> --}}
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile -->
                            <x-dropdown-link :href="route('landing.profile.edit', auth()->user()->id)">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('landing.logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('landing.logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('landing.login') }}"
                        class="font-bold text-primaryRed rounded-lg hover:underline p-2.5">Login</a>
                    <x-button href="{{ route('landing.register') }}" variant="red">Register</x-button>
                @endif
            </div>
        </div>
    </div>
    <div class="hidden lg:flex my-6 w-full justify-center">
        <ul class="flex justify-center text-gray-200 items-center bg-primaryRed  text-center w-full navlink">
            <div class="flex justify-between w-full container px-20">
                <li class="font-bold ">
                    <a href="{{ route('landing.index') }}">
                        HOME
                    </a>
                </li>
                <li class="font-bold ">
                    <a href="{{ route('landing.teknologi.index') }}">TEKNOLOGI</a>
                </li>
                <li class="font-bold ">
                    <a href="{{ route('landing.bisnis.index') }}">BISNIS</a>
                </li>
                <li class="font-bold ">
                    <a href="{{ route('landing.olahraga.index') }}">OLAHRAGA</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="w-full bg-primaryRed h-1 mt-3 flex lg:hidden " />
</nav>



{{-- hamburger --}}
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <div class="flex gap-1 w-3/4 text-center items-center">
                    <img src="{{ asset('assets/content/NavLogo.png') }}" alt="" srcset="">
                </div>
            </a>
            <button class="navbar-close">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div>
            <ul class="navlink flex-col">
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 " href="#">Home</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 " href="#">Teknologi</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 " href="#">Olahraga</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 " href="#">Bisnis</a>
                </li>
                <li class="mb-1">
                    <a class="block p-4 text-sm font-semibold text-gray-400 " href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div class="pt-6">
                <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                    href="#">Sign in</a>
                <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-red-600 hover:bg-red-700  rounded-xl"
                    href="#">Sign Up</a>
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span>Copyright © 2021</span>
            </p>
        </div>
    </nav>
</div>
