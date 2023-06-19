@props([
    'kategori' => '',
])

<footer class="w-full py-24 border-t-orange-800 border mt-4 flex justify-center items-center">
    <div class="px-20 container md:flex block justify-center">
        <div class="flex gap-1 md:w-1/4 w-full mb-4  text-center items-center">
            <img src="{{ asset('assets/content/NavLogo.png') }}" alt="" srcset="">
        </div>
        <div class="flex items-center lg:justify-between justify-center">

            <div class="flex flex-col items-start mx-10">
                <h2 class=" text-gray-800 p-2 font-bold text-sm lg:text-lg">Kategori</h2>
                @foreach ($categories as $category)
                    <h3 class=" text-gray-800 p-2  text-sm lg:text-lg">{{ $category->title }}</h3>
                @endforeach
            </div>
            <div class="md:flex flex flex-col items-start mx-10">
                <h2 class=" text-gray-800 p-2 font-bold text-sm lg:text-lg">Kategori</h2>
                @foreach ($categories as $category)
                    <h3 class=" text-gray-800 p-2  text-sm lg:text-lg">{{ $category->title }}</h3>
                @endforeach
            </div>
            <div class="md:flex hidden flex-col items-start mx-10">
                <h2 class=" text-gray-800 p-2 font-bold text-sm lg:text-lg">Kategori</h2>
                @foreach ($categories as $category)
                    <h3 class=" text-gray-800 p-2  text-sm lg:text-lg">{{ $category->title }}</h3>
                @endforeach
            </div>
        </div>


    </div>
</footer>
