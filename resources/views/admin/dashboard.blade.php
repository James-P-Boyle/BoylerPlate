
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
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
                                class="inline-block bg-red-300 w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all"
                                title="View more {{ $tag-name }} posts">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div> --}}

                    <span>
                        <a
                            class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all"
                            href="{{ route('home.show', $post->id) }}"
                            title="View full Post">
                                {{ $post->title }}
                        </a>
                    </span>

                    <p class="text-gray-900 text-lg w-full break-words">
                        {{ substr($post->body, 0, 300) . '...' }}
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">
                            Made by:
                                <a
                                    href=""
                                    class="text-green-500 italic hover:text-green-400 transition-all"
                                    title="View more post from {{ $post->user->name }}">
                                    {{ $post->user->name }}
                                </a>
                            on {{ $post->updated_at->format('d/m/y') }}
                        </span>

                        <div class="flex gap-2">
                            <a
                                href="{{ route('blog.edit', $post->id) }}"
                                class="text-base py-1 px-2 rounded-full transition-all border-2 border-gray-400 text-gray-400 hover:border-black hover:bg-green-400 hover:text-white hover:scale-105"
                                title="Edit post"
                                >
                                Edit
                            </a>

                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="text-base py-1 px-2 rounded-full transition-all border-2 border-gray-400 text-gray-400 hover:border-black hover:bg-red-400 hover:text-white hover:scale-105" title="Delete this post">
                                    Delete
                                </button>
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
