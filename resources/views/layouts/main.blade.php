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

        @hasSection('title')
            <meta name="title" content="@yield('title')">
        @else
            <meta name="title" content="{{ config('app.name') }} - A blog about coding">
        @endif

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

        @yield('content')

    </body>
</html>
