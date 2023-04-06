<x-home-layout>

    <article class="flex flex-col shadow">
        <!-- Article Image -->
        <a href="#" class="hover:opacity-75">
            <img class="mx-auto" src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
        </a>
        <div class="flex flex-col gap-2 justify-start p-6 dark:bg-gray-800 bg-white">
            <div class="flex gap-2">
                @foreach($post->tags as $tag)
                    <a
                        href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                        class="text-blue-700 text-md font-bold uppercase transition-all">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>

            <h1 href="#" class="text-3xl font-bold">{{ $post->title }}</h1>

            <p href="#" class="text-sm">
                By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->created_at }}
            </p>

            <h2 href="#" class="text-2xl italic">{{ $post->excerpt }}</h2>

            <div>
                {!! $post->body !!}
            </div>


        </div>
    </article>


</x-home-layout>
