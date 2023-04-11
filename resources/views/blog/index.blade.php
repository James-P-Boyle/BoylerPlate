<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900 dark:text-gray-100">

                <div class="flex flex-col gap-2 py-4 bg-white">

                    @foreach ($posts as $post)
                        <div class="p-2 sm:p-4 lg:p-10 border-b">

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

                            <span>
                                <a
                                    class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all"
                                    href={{ route('blog.show', $post->id) }}
                                    title="View full post"
                                >
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
                                            href="#"
                                            class="text-green-500 italic hover:text-green-400 transition-all"
                                            title="View more posts from {{ $post->user->name }}"
                                        >
                                            {{ $post->user->name }}
                                        </a>
                                    on {{ $post->updated_at->format('d/m/y') }}
                                </span>


                            </div>
                        </div>
                    @endforeach

                    <div class="pb-4">
                        {{ $posts->links() }}
                    </div>

                </div>
            </div>

    </div>




    </div>
</x-app-layout>
