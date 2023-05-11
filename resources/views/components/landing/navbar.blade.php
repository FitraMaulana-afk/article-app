<nav class="top-0 py-10 " x-data="dropdown()">

    <div class="flex w-full justify-center px-20">
        <div class="flex w-full justify-between items-center container">
            <div class="flex gap-1 text-center items-center">
                <h2 class="bg-orange-500 text-white p-4 font-bold rounded-full text-lg">FM </h2>
                <h3 class="bg-orange-500 text-white p-2 -m-3 rounded-e-xl font-bold ">Information</h3>
            </div>

            <div class="flex lg:hidden">
                <div x-data>
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                        </svg>
                    </button>
                </div>
            </div>


            <div class="lg:flex hidden">
                {{-- search engine --}}
                <form class="flex items-center">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="voice-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari Sesuatu" required>
                    </div>
                    <x-button type="submit" variant="orange">
                        <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>Cari
                    </x-button>
                </form>
            </div>
            <div class="lg:flex hidden">
                <button class="font-bold text-orange-500 rounded-lg hover:underline p-2.5">Login</button>
                <x-button variant="orange">Register</x-button>
            </div>
        </div>
    </div>
    <div class="hidden lg:flex my-6 bg-orange-500 py-2 px-4 rounded-sm shadow-md text-white w-full justify-center">
        <ul class="flex justify-between items-center text-center w-full container px-20">
            <li class="font-bold hover:text-gray-200">
                <a href="">
                    HOME
                </a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">NEWS</a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">BISNIS</a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">BOLA</a>
            </li>
        </ul>

    </div>
    <div class="w-full bg-orange-500 h-1 mt-3 flex lg:hidden " />
</nav>



{{-- hamburger --}}
<div class="lg:hidden flex items-center justify-center" x-show="open" id="mobile-menu">
    <div
        class=" my-6 bg-orange-800/50  px-4  shadow-md text-white min-w-[60vw]  flex flex-col justify-between items-center z-30 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-lg backdrop-blur-md py-16">
        <ul class="flex flex-col px-20 py-5 justify-between items-center text-center w-full">
            <li class="font-bold hover:text-gray-200">
                <a href="">
                    HOME
                </a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">NEWS</a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">BISNIS</a>
            </li>
            <li class="font-bold hover:text-gray-200">
                <a href="">BOLA</a>
            </li>
        </ul>
        <div class="flex">
            <button class="font-bold text-white-500 rounded-lg hover:underline p-2.5">Login</button>
            <x-button variant="orange">Register</x-button>
        </div>
    </div>
</div>
