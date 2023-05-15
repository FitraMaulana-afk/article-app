@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'description' => '',
    'image' => '',
])

<div {!! $attributes->merge([
    'class' => ' bg-white dark:bg-gray-800 dark:border-gray-700  justify-center block items-center my-2',
]) !!}>
    <div class="w-full items-center text-center">
        <h2 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 leading-10 dark:text-white">
            {{ $title }}</h2>
        <p class="text-base text-gray-500">{{ $time }}</p>
        <div class="w-full items-center justify-center flex mt-3">
            <img src="{{ asset('storage/' . $image) }}" class="w-auto " alt="" srcset="">
        </div>
        <p {!! $attributes->merge([
            'class' => 'mb-3 font-normal text-gray-600 dark:text-gray-400 mt-5',
        ]) !!}>{{ $description }}</p>
    </div>

</div>
