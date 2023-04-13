<aside class="w-full md:max-w-xs lg:max-w-sm dark:text-white">

    <div class="flex flex-col gap-4 items-center md:sticky top-4">

        @unless(request()->routeIs('home.about'))
            <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col gap-4 px-2 py-4 sm:py-6 sm:px-4">
                <p class="text-xl font-semibold">About BoylerPlate</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a
                    href={{ route('home.about') }}
                    class="w-full bg-ci-yellow text-white font-bold text-sm uppercase rounded flex items-center justify-center px-2 py-3 hover:bg-ci-yellow hover:scale-x-105 transition-all"
                    title="Go to about page"
                >
                    Get to know us
                </a>
            </div>
        @endunless

        {{-- <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col gap-4 p-6">
            <p class="text-xl font-semibold">Recomended articles</p>
        </div> --}}

        <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col gap-4 px-2 py-4 sm:py-6 sm:px-4">
            <p class="text-xl font-semibold">Follow the Boyle</p>

            <x-primary-button>
                <a
                    href="https://www.linkedin.com/in/james-p-boyle"
                    target="_blank"
                    title="Go to my Linkedin"
                >
                    Follow @LinkedIn
                </a>
            </x-primary-button>

            <x-primary-button>
                <a
                    href="https://github.com/James-P-Boyle"
                    target="_blank"
                    title="Go to my Linkedin"
                >
                    Follow @Github
                </a>
            </x-primary-button>

        </div>

    </div>

</aside>