@section('title', $meta['title'])

@section('metaDescription', $meta['description'])

<x-home-layout>

    <article class="flex flex-col shadow">
        <!-- Article Image -->
        <div class="hover:opacity-75">
            <img
                class="mx-auto "
                title="{{ $post->title }}"
                alt="{{ $post->title }}"
                src="{{ $post->image_path }}"

                height="500"
                width="1000"
            >
        </div>
        <div class="flex flex-col gap-2 justify-start px-2 py-4 sm:py-6 sm:px-4 dark:bg-gray-800 bg-white">
            <div class="flex gap-2">
                @foreach($post->tags as $tag)
                    <span
                        {{-- href="{{ route('blog.index', ['tag' => $tag->name]) }}" --}}
                        class="text-ci-red text-md font-bold uppercase transition-all"
                        tilte="View more {{ $tag->name }} posts"
                    >
                        {{ $tag->name }}
                    </span>
                @endforeach
            </div>

            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>

            <p class="text-md">
                By <a
                        href="/"
                        class="text-ci-yellow italic hover:text-ci-yellow transition-all font-bold"
                        title="View more posts from {{ $post->user->name }}"
                    >
                        {{ Str::title($post->user->name) }}
                    </a>, {{ date('Y-m-d', strtotime($post->created_at)) }}
            </p>

            <h2 class="text-2xl italic">{{ $post->excerpt }}</h2>

            <div class="max-w-full flex flex-col gap-2 flex-wrap">
                {!! $post->body !!}
            </div>

        </div>
    </article>


</x-home-layout>
