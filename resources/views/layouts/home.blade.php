@extends('layouts.main')

@section('content')

    @include('partials.navigation')

    <div class="flex flex-col sm:justify-center items-center mx-auto max-w-[100vw]">

        <x-header />

        <div class="xl:container lg:mx-4 xl:mx-auto flex flex-wrap gap-4 py-6">
            <section class="flex flex-col flex-1 gap-4 items-center text-gray-700 dark:text-white">
                {{ $slot }}
            </section>

            @include('home.sidebar')

        </div>

        @include('partials.footer')

@endsection
