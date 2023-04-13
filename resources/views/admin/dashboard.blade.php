
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        @if(session()->has('message'))
            <div class="mx-auto py-2 my-2">
                <div class="bg-ci-red text-white font-bold rounded-t px-4 py-2">
                    Warning
                </div>
                <div class="border-2 border-ci-red border-t-0 text-ci-red font-bold rounded-b px-4 py-2">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif
    </x-slot>

    <x-dash-content-layout>
        @if(count($posts) > 0)
            @foreach ($posts as $post)
                <div class="p-2 sm:p-4 lg:p-10 border-b">

                    <!-- show the tags for the post -->
                    {{-- <div>
                        @foreach($post->tags as $tag)
                            <a
                                href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                                class="inline-block bg-ci-red w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all"
                                title="View more {{ $tag-name }} posts">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div> --}}

                    <span>
                        <a
                            class="text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 text-gray-900 dark:text-white dark:hover:text-gray-400 transition-all"
                            href="{{ route('home.show', $post->id) }}"
                            title="View full Post">
                                {{ $post->title }}
                        </a>
                    </span>

                    <p class="text-lg w-full break-words text-gray-900 dark:text-gray-300">
                        {!! substr($post->body, 0, 300) . '...' !!}
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-gray-400">
                            Made by:
                                <a
                                    href="/"
                                    class="text-ci-yellow italic hover:text-ci-yellow transition-all"
                                    title="View more post from {{ $post->user->name }}">
                                    {{ $post->user->name }}
                                </a>
                            on {{ $post->updated_at->format('d/m/y') }}
                        </span>

                        <div class="flex gap-2">
                            <x-primary-button class="px-4">
                                <a
                                    href="{{ route('blog.edit', $post->id) }}"
                                    title="Edit post"
                                >
                                    Edit
                                </a>
                            </x-primary-button>

                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <x-danger-button>
                                    delete
                                </x-danger-button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
                <h1>You have no posts</h1>
        @endif
    </x-dash-content-layout>

</x-app-layout>
