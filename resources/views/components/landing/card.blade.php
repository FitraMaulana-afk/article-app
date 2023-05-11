@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'description' => '',
    'image' => '',
])

<div {!! $attributes->merge([
    'class' =>
        ' bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700  justify-center block items-center my-2',
]) !!}>
    <div class="w-full items-center justify-center flex bg-black rounded-t-lg">
        <img src="{{ asset('storage/' . $image) }}" class="w-auto " alt="" srcset="">
    </div>
    <div class="p-6">
        <p class="text-base text-gray-500">{{ $time }}</p>
        <a href={{ $link }}>
            <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $description }}</p>
    </div>
</div>