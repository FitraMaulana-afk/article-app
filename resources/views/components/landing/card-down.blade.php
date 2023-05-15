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
    <div class="p-4 my-1 flex">
        <img src="{{ asset('storage/' . $image) }}" class="rounded-lg gambar-hover w-1/5" alt="img" draggable="false">
        <div class="ml-3">
            <h6 class="text-sm font-semibold text-orange-500">
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
