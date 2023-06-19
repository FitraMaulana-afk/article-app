@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'image' => '',
])

<li class="card">
    <div class="w-auto h-auto flex flex-col ">
        <div class="overflow-hidden rounded-lg">

            <img src="{{ asset('storage/' . $image) }}"
                class="rounded-lg hover:scale-105 z-0 transition-all ease-in-out duration-300" alt="img"
                draggable="false">
        </div>
        <p class="text-sm text-gray-500 mt-1">{{ $time }}</p>
        <a href="{{ route('landing.show', $link) }}" class="">
            <h2
                class="line-clamp-3 font-bold leading-4 text-lg items-end  hover:text-blue-500 text-black transition-all ease-in-out duration-150">
                {{ $title }}
            </h2>
        </a>
    </div>
</li>
