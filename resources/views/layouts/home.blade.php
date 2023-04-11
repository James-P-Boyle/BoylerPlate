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

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100 bg-center dark:bg-dots-lighter bg-dots-darker dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        @include('partials.navigation')

        <div class="min-h-screen flex flex-col sm:justify-center items-center mx-auto">

            @include('partials.header')

            <div class="xl:container mx-auto flex flex-wrap gap-4 py-6">

                {{-- Content --}}
                <section class="flex flex-col flex-1 gap-4 items-center text-gray-700 dark:text-white">
                    {{ $slot }}
                </section>

                @include('home.sidebar')

            </div>

            @include('partials.footer')

        </div>
    </body>
</html>