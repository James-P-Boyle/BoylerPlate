<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-center uppercase font-bold border-r border-b-2 border-ci-yellow py-2 rounded-md text-gray-800 dark:text-white absolute bottom-0 right-0 left-0 bg-ci-yellow dark:bg-gray-900/90 hover:scale-105 transition-all drop-shadow-lg transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
