@props([
    'text' => '',
    'disabled' => false,
])

<div>
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => ' py-2 border border-gray-400 rounded-md focus:border-gray-400
                                        focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                                        dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
    ]) !!} rows="4">{{ $text }}</textarea>
</div>
