<x-home-layout>

    @foreach ($posts as $post)
        <article class="flex flex-col shadow">
            <!-- Article Image -->
            <div class="hover:opacity-75">
                <img
                    src="https://source.unsplash.com/collection/1346951/1000x500?sig=1"
                    title="{{ $post->title }}"
                    height="500"
                    width="1000"
                >
            </div>
            <div class="bg-white dark:bg-gray-800 flex flex-col gap-2 justify-start px-2 py-4 sm:py-6 sm:px-4">

                <div class="flex flex-row gap-2">
                    @foreach($post->tags as $tag)
                        <span
                            {{-- href="{{ route('blog.index', ['tag' => $tag->name]) }}" --}}
                            class="text-ci-red text-lg font-bold uppercase rounded-full hover:scale-105 transition-all">
                            {{ $tag->name }}
                        </span>
                        @endforeach
                </div>

                <a
                    class="text-3xl font-bold hover:text-gray-500 dark:hover:text-gray-200"
                    href="{{ route('home.show', $post->id) }}"
                >
                    {{ $post->title }}
                </a>

                <p class="text-xl">{{ $post->excerpt }}</p>
                <p class="text-md">
                    By <a
                            href="/"
                            class="text-ci-yellow italic hover:text-ci-yellow transition-all"
                            title="View more posts from {{ $post->user->name }}"
                        >
                            {{ $post->user->name }}
                        </a>, Published on {{ $post->created_at }}
                </p>
                <div class="relative">
                    <p>{!! Str::limit($post->body, 800) !!}</p>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white dark:to-gray-800"></div>

                    <x-secondary-button>
                        <a
                            href="{{ route('home.show', $post->id) }}"
                            title="view full post"
                        >
                            Continue Reading
                        </a>
                    </x-secondary-button>

                </div>

            </div>
        </article>
    @endforeach

</x-home-layout>



