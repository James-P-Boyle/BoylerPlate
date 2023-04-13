<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900 dark:text-gray-100">
                <div class="mt-4">
                    <form
                        action={{ route('blog.update', $post->id) }}
                        method="POST"
                        enctype="multipart/form-data"
                        class="flex flex-col gap-2">
                        @csrf
                        @method('PATCH')

                        {{-- {{ var_dump($errors) }} --}}

                        <div class="">
                            <label for="is_published">Is published</label>
                            <input
                                type="checkbox"
                                class="text-xl"
                                {{ $post->is_published === true ? 'checked' : '' }}
                                name="is_published"
                            >
                        </div>

                        <div>
                            @foreach($post->tags as $tag)
                                <input
                                    type="text"
                                    name="tags"
                                    value="{{ $tag->name }}"
                                    class="bg-ci-red rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 focus:border-ci-yellow focus:ring-0 focus:outline-none focus:ring-offset-0 transition-all"
                                />
                            @endforeach
                        </div>

                        <x-text-input
                            name="title"
                            value="{{ $post->title }}"
                            type="text"
                        />

                        <x-text-input
                            name="excerpt"
                            value="{{ $post->excerpt }}"
                            type="text"
                        />

                        <x-text-input
                            name="number"
                            value="{{ $post->min_to_read }}"
                            type="number"
                        />

                        <x-text-area
                            name="body"
                            value="{{ $post->body }}"
                            rows="12"
                        />

                        <x-text-input
                            name="meta_title"
                            value="{{ optional($post->metaData)->meta_title }}"
                            type="text"/>

                        <x-text-area
                            name="meta_description"
                            rows="2"
                            value="{{ optional($post->metaData)->meta_description }}"
                        />

                        <div class="border border-gray-500 rounded-lg p-3">
                            <input
                                type="file"
                                name="image_path"
                            />
                        </div>

                        <x-primary-button>
                            Submit Post
                        </x-primary-button>
                    </form>
                </div>
            </div>

    </div>
</x-app-layout>