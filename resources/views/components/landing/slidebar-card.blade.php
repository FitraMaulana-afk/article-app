@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'image' => '',
])

<li class="card">
    <div class="w-auto h-60 flex flex-col ">
        <p class="text-base text-gray-500">{{ $time }}</p>
        <img src="{{ asset('storage/' . $image) }}" class="rounded-lg" alt="img" draggable="false">
        <a href={{ $link }} class="">
            <h2
                class="line-clamp-3 font-bold leading-4 text-lg items-end my-5  hover:text-blue-500 text-black transition-all ease-in-out duration-150">
                {{ $title }}
            </h2>
        </a>
    </div>
</li>
