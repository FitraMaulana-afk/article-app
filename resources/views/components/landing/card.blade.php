@props([
    'time' => '',
    'link' => '',
    'title' => '',
    'description' => '',
    'image' => '',
    'slug' => '',
])

<div {!! $attributes->merge([
    'class' =>
        ' bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700  justify-center block items-center my-2',
]) !!}>
    <div class="lg:w-full w-auto items-center justify-center flex bg-black rounded-t-lg overflow-hidden">
        <img src="{{ asset('storage/' . $image) }}"
            class="w-auto  hover:scale-105 z-0 transition-all ease-in-out duration-300" alt="" srcset="">
    </div>
    <div class="p-6 ">
        <p class="text-sm md:text-base text-gray-500">{{ $time }}</p>
        <a href={{ route('landing.show', $slug) }}>
            <h5
                class="mb-2 text-lg md:text-3xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-blue-500  transition-all ease-in-out duration-150">
                {{ $title }}</h5>
        </a>
        <p {!! $attributes->merge([
            'class' => 'mb-3 font-normal text-gray-600 dark:text-gray-400',
        ]) !!}>{{ $description }}</p>
    </div>
</div>
