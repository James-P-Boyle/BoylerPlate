<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-ci-red text-white font-bold text-sm uppercase rounded flex items-center justify-center px-2 py-3 hover:bg-ci-red hover:scale-x-105 transition-all transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
