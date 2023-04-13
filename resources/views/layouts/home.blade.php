@extends('layouts.main')

@section('content')

    @include('partials.navigation')

    <div class="flex flex-col items-center mx-auto">

        <x-header />

        <div class="flex flex-wrap gap-4 py-6">
            <section class="flex flex-col flex-1 gap-4 items-center text-gray-700 dark:text-white">
                {{ $slot }}
            </section>

            @include('home.sidebar')

        </div>

        @include('partials.footer')

@endsection
