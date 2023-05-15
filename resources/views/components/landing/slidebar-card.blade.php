@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'image' => '',
])

<li class="card">
    <div class="w-auto h-auto flex flex-col ">
        <img src="{{ asset('storage/' . $image) }}" class="rounded-lg gambar-hover" alt="img" draggable="false">
        <p class="text-sm text-gray-500 mt-1">{{ $time }}</p>
        <a href={{ $link }} class="">
            <h2
                class="line-clamp-3 font-bold leading-4 text-lg items-end  hover:text-blue-500 text-black transition-all ease-in-out duration-150">
                {{ $title }}
            </h2>
        </a>
    </div>
</li>
