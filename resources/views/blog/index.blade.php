<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900 dark:text-gray-100">

                <div class="flex justify-center pt-4">
                    <button>
                        <a href="{{ route('blog.create') }}"></a>
                    </button>
                </div>

                <div class="flex flex-col gap-2 py-4 bg-white">

                    @if(session()->has('message'))
                        <div class="mx-auto pb-2">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Warning
                            </div>
                            <div class="border-2 border-red-500 border-t-0 text-red-500 font-bold rounded-b px-4 py-2">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="p-2 sm:p-4 lg:p-10 border-b">

                            <div>
                                @foreach($post->tags as $tag)
                                    <a
                                        href="{{ route('blog.index', ['tag' => $tag->name]) }}"
                                        class="inline-block bg-red-300 w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>

                            <span>
                                <a
                                    class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all"
                                    href={{ route('blog.show', $post->id) }}>
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
                                            class="text-green-500 italic hover:text-green-400 transition-all">
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
