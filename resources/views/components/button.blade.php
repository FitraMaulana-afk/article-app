@props([
    'variant' => 'primary',
    'iconOnly' => false,
    'srText' => '',
    'href' => false,
    'size' => 'base',
    'disabled' => false,
    'pill' => false,
    'squared' => false,
])

@php
    
    $baseClasses = 'inline-flex items-center transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2';
    
    switch ($variant) {
        case 'primary':
            $variantClasses = 'bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500';
            break;
        case 'secondary':
            $variantClasses = 'bg-white text-gray-500 hover:bg-gray-100 focus:ring-purple-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'success':
            $variantClasses = 'bg-green-400 text-white uppercase font-semibold hover:bg-green-600 focus:ring-green-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'danger':
            $variantClasses = 'bg-red-500 uppercase font-semibold text-white hover:bg-red-600 focus:ring-red-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'warning':
            $variantClasses = 'bg-yellow-400 uppercase font-semibold text-white hover:bg-yellow-600 focus:ring-yellow-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'info':
            $variantClasses = 'bg-cyan-500 uppercase font-semibold text-white hover:bg-cyan-600 focus:ring-cyan-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'black':
            $variantClasses = 'bg-black text-gray-300 hover:text-white hover:bg-gray-800 focus:ring-black dark:hover:bg-dark-eval-3';
            break;
        case 'blue':
            $variantClasses = 'bg-blue-500 uppercase font-semibold text-white hover:bg-blue-600 focus:ring-blue-600 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200';
            break;
        case 'orange':
            $variantClasses = 'inline-flex items-center py-2.5 px-3 text-sm font-medium text-white bg-orange-500 rounded-lg  hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
            break;
        case 'red':
            $variantClasses = 'inline-flex items-center py-2.5 px-3 text-sm font-medium text-white bg-primaryRed rounded-lg  hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-primaryRed';
            break;
        case 'transparant':
            $variantClasses = 'bg-transparant text-sm text-gray-600 hover:text-gray-800 ';
            break;
        default:
            $variantClasses = 'bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500';
    }
    
    switch ($size) {
        case 'sm':
            $sizeClasses = $iconOnly ? 'p-1.5' : 'px-2.5 py-1 text-sm';
            break;
        case 'base':
            $sizeClasses = $iconOnly ? 'p-2' : 'px-4 py-2 text-base';
            break;
        case 'lg':
        default:
            $sizeClasses = $iconOnly ? 'p-3' : 'px-5 py-2 text-xl';
            break;
    }
    
    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $variantClasses;
    
    if (!$squared && !$pill) {
        $classes .= ' rounded-md';
    } elseif ($pill) {
        $classes .= ' rounded-full';
    }
    
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        @if ($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
        @if ($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </button>
@endif
