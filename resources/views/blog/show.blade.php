<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("$post->title") }}
        </h2>
    </x-slot>

    <article class="flex flex-col shadow my-4">



        <!-- Article Image -->
        <a href="#" class="hover:opacity-75">

            <img class="h-10 w-10" src="{{ asset('storage/' . $post->image_path) }}">
        </a>
        <div class="bg-white flex flex-col justify-start p-6">
            <div>
                @foreach($post->tags as $tag)
                    <a
                        href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                        class="inline-block bg-red-300 w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">James Boyle</a>, Published on {{ $post->created_at->format('d/m/y') }}
            </p>
            <a href="#" class="pb-6">{{ $post->excerpt }}</a>
            <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>

</x-app-layout>