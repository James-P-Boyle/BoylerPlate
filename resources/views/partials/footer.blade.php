<footer class="w-full mx-auto flex flex-col items-center p-4 bg-white border-t border-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-white">

    {{-- <div class="w-full mx-auto flex flex-col items-center"> --}}
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a
                href={{ route('home.about') }}
                class="uppercase px-3"
                title="Go to about page"
            >
                About Us
            </a>
            <span class="uppercase px-3">Privacy Policy</span>
            <span class="uppercase px-3">Terms & Conditions</span>
            <span class="uppercase px-3">Contact Us</span>
        </div>
        <div class="font-bold uppercase pb-6 text-ci-red">&copy; BOYLERPLATE</div>
    {{-- </div> --}}

</footer>