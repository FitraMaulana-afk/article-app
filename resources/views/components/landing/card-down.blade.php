@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'image' => '',
    'description' => '',
    'category' => '',
])

<div class="w-full flex flex-col ">
    <hr>
    <div class="p-4 my-1 lg:flex lg:flex-row flex flex-col w-full">
        <div class="lg:w-1/4 w-full overflow-hidden rounded-lg">
            <img src="{{ asset('storage/' . $image) }}"
                class="rounded-lg gambar-hover w-auto hover:scale-105 z-0 transition-all ease-in-out duration-300"
                alt="img" draggable="false">
        </div>
        <div class="lg:ml-3 mt-2 lg:w-3/4 w-full">
            <h6 class="text-sm font-semibold text-primaryRed">
                {{ $category }}
            </h6>
            <p class="text-sm text-gray-500">{{ $time }}</p>
            <a href={{ route('landing.show', $link) }}>
                <h2 class="text-lg font-bold hover:text-blue-500  transition-all ease-in-out duration-150">
                    {{ $title }}</h2>
            </a>
            <p class="text-base text-gray-500 line-clamp-2">{{ $description }}</p>
        </div>
    </div>
</div>
