<x-home-layout>

    <article class="flex flex-col shadow">
        <!-- Article Image -->
        <div class="hover:opacity-75">
            <img
                class="mx-auto"
                title={{ $post->title }}
                src="https://source.unsplash.com/collection/1346951/1000x500?sig=1"
            >
        </div>
        <div class="flex flex-col gap-2 justify-start p-6 dark:bg-gray-800 bg-white">
            <div class="flex gap-2">
                @foreach($post->tags as $tag)
                    <a
                        href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                        class="text-green-700 text-md font-bold uppercase transition-all"
                        tilte="View more {{ $tag->name }} posts"
                    >
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>

            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>

            <p class="text-sm">
                By <a
                        href=""
                        class="text-green-500 italic hover:text-green-400 transition-all"
                        title="View more posts from {{ $post->user->name }}"
                    >
                        {{ $post->user->name }}
                    </a>, Published on {{ $post->created_at }}
            </p>

            <h2 class="text-2xl italic">{{ $post->excerpt }}</h2>

            <div>
                {!! $post->body !!}
            </div>

        </div>
    </article>


</x-home-layout>
