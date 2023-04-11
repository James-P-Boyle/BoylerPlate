<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @hasSection('metaDescription')
            <meta name="description" content="@yield('metaDescription')">
        @else
            <meta name="description" content="Stay up-to-date with the latest trends, tips, and tricks in coding with our expert articles and tutorials. Improve your coding skills and learn new technologies with our comprehensive guides.">
        @endif

        @if (isset($meta['title']))
            <meta name="title" content="{{ $meta['title'] }}">
        @else
            <meta name="title" content="{{ config('app.name') }} - A blog about coding">
        @endif

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100 bg-center dark:bg-dots-lighter bg-dots-darker dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @include('layouts.navigation')
        <div class="min-h-screen flex flex-col sm:justify-center items-center max-w-7xl mx-auto">

            {{-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <header class="w-full container mx-auto dark:bg-gray-800 bg-white border-b">
                <div class="flex flex-col items-center py-12">
                    <a
                        class="font-bold text-gray-800 dark:text-white uppercase hover:text-gray-700 text-5xl hover:scale-105 transition-all"
                        href="/"
                        title="Homepage"
                        >
                        The Boylerplate
                    </a>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Learn from the Boyle himself
                    </p>
                </div>
            </header>



            <div class="container mx-auto flex flex-wrap gap-4 py-6">

                {{-- Content --}}
                <section class="md:w-2/3 flex flex-col flex-1 gap-4 items-center text-gray-700 dark:text-white">
                    {{ $slot }}
                </section>

                <!-- Sidebar Section -->
                <aside class="w-full md:w-1/3 flex flex-col gap-4 items-center dark:text-white">

                    <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col p-6">
                        <p class="text-xl font-semibold">About BoylerPlate</p>
                        <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                        <a
                            href={{ route('home.about') }}
                            class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3"
                            title="Go to about page"
                        >
                            Get to know us
                        </a>
                    </div>

                    <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col p-6">
                        <p class="text-xl font-semibold">Recomended articles</p>

                    </div>

                    <div class="w-full dark:bg-gray-800 bg-white shadow flex flex-col p-6">
                        <p class="text-xl font-semibold pb-5">Follow the Boyle</p>
                        <a
                            href="#"
                            class="w-full bg-green-800 text-white font-bold text-sm uppercase rounded hover:bg-green-700 flex items-center justify-center px-2 py-3"
                            title="Go to my Linkedin"
                        >
                            Follow @James
                        </a>
                    </div>

                </aside>

            </div>

            <footer class="w-full border-t bg-white dark:bg-gray-800 dark:text-white p-4">

                <div class="w-full mx-auto flex flex-col items-center">
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
                    <div class="uppercase pb-6">&copy; BOYLERPLATE</div>
                </div>
            </footer>

            {{--

            <header class="w-full container mx-auto dark:bg-gray-800 bg-white border-b">
                <div class="flex flex-col items-center py-12">
                    <a class="font-bold text-gray-800 dark:text-white uppercase hover:text-gray-700 text-5xl" href="#">
                        The Boylerplate
                    </a>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Learn from the Boyle himself
                    </p>
                </div>
            </header>
                --}}
        </div>
    </body>
</html>