<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("$post->title") }}
        </h1>
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
                        class="inline-block bg-red-300 w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all"
                        title="View more posts about {{ $tag->name }}"
                    >
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
            <h2 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</h2>
            <p class="text-sm pb-3">
                By <a
                        href="#"
                        class="font-semibold hover:text-gray-800"
                        title="View more posts from {{ $post->user->name }}"
                    >
                        {{ $post->user->name }}
                    </a>
                , Published on {{ $post->created_at->format('d/m/y') }}
            </p>
            <h3 class="pb-6">{{ $post->excerpt }}</h3>
        </div>
    </article>

</x-app-layout>