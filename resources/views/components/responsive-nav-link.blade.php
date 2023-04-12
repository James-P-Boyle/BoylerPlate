@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-ci-yellow dark:border-ci-yellow text-left text-base font-medium text-ci-yellow dark:text-ci-yellow bg-ci-yellow dark:bg-ci-yellow/50 focus:outline-none focus:text-ci-yellow dark:focus:text-ci-yellow focus:bg-ci-yellow dark:focus:bg-ci-yellow focus:border-ci-yellow dark:focus:border-ci-yellow transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
