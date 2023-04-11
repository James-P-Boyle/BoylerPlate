<x-home-layout>

    @foreach ($posts as $post)
        <article class="flex flex-col shadow">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
            </a>
            <div class="bg-white dark:bg-gray-800 flex flex-col gap-2 justify-start p-6">

                <div class="flex flex-row gap-2">
                    @foreach($post->tags as $tag)
                        <a
                            href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                            class="text-blue-700 text-md font-bold uppercase">
                            {{ $tag->name }}
                        </a>
                        @endforeach
                </div>


                <p class="text-3xl font-bold hover:text-gray-700">{{ $post->title }}</p>

                <p class="text-xl">{{ $post->excerpt }}</p>
                <p class="text-sm">
                    By <a
                            href=""
                            class="text-green-500 italic hover:text-green-400 transition-all"
                            title="View more posts from {{ $post->user->name }}"
                        >
                            {{ $post->user->name }}
                        </a>, Published on {{ $post->created_at }}
                </p>
                <div class="relative">
                    {!! Str::limit($post->body, 1200) !!}
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white dark:to-gray-800"></div>
                    <a
                        href="{{ route('home.show', $post->id) }}"
                        class="text-center uppercase border py-2 px-4 drop-shadow-lg text-gray-800 hover:text-black absolute bottom-0 right-0 left-0 dark:bg-gray-900 dark:hover:text-white dark:text-white hover:scale-105 transition-all"
                        title="view full post"
                    >
                        Continue Reading
                    </a>
                </div>

            </div>
        </article>
    @endforeach

</x-home-layout>



