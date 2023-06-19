@props([
    'icon' => '',
    'title' => '',
    'count' => '',
])


<div class="p-4 bg-white dark:bg-dark-eval-1 shadow-lg rounded-lg flex ">
    <i
        class="{{ $icon }} text-3xl rounded-lg mr-2 text-white dark:text-gray-300 bg-blue-500 dark:bg-dark-eval-0 px-3 py-2"></i>
    <div class="flex flex-col start ml-1 justify-between">
        <p class="text-base text-gray-400 font-medium">{{ $title }}</p>
        <p class="text-lg font-semibold end-0 text-gray-700">{{ $count }}</p>
    </div>
</div>
