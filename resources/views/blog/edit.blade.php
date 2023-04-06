<x-app-layout>

    <x-page-header :title="'Edit Post'" />

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

                        <div class="">
                            <label for="is_published">Is published</label>
                            <input
                                type="checkbox"
                                class="text-xl"
                                {{ $post->is_published === true ? 'checked' : '' }}
                                name="is_published"
                            >
                        </div>

                        {{-- <div>
                            @foreach($post->tags as $tag)
                                <input
                                    type="text"
                                    name="tags"
                                    value="{{ $tag->name }}"
                                    class="inline-block bg-red-300 w-20 rounded-full text-center text-lg font-semibold text-gray-700 mr-2 mb-2 hover:bg-gray-400 transition-all"
                                />
                            @endforeach
                        </div> --}}

                        <input
                            type="text"
                            name="title"
                            value="{{ $post->title }}"
                            class="p-1 bg-transparent text-xl border-b rounded-lg px-2"
                        >

                        @error('title')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <input
                            type="text"
                            name="excerpt"
                            value="{{ $post->excerpt }}"
                            class="p-1 bg-transparent text-xl border-b rounded-lg px-2"
                        >

                        @error('excerpt')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <input
                            type="number"
                            name="min_to_read"
                            value="{{ $post->min_to_read }}"
                            class="p-1 bg-transparent text-xl border-b rounded-lg px-2"
                        >

                        @error('min_to_read')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <textarea
                            name="body"
                            rows="15"
                            class="p-1 bg-transparent text-xl border-b rounded-lg px-2 h-full"
                        >
                            {{ $post->body }}
                        </textarea>


                        @error('body')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <div class="border rounded-lg p-3">
                            <label class="flex flex-col items-start gap-2 rounded-lg cursor-pointer">
                                <span class="mt-2 text-gray-500 text-xl">
                                    Select a file
                                </span>
                                <input
                                    type="file"
                                    name="image_path"
                                    class="">
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="bg-green-500 text-white text-md font-bold py-4 rounded-lg hover:bg-green-400 transition-colors">
                            Submit Post
                        </button>
                    </form>
                </div>
            </div>

    </div>
</x-app-layout>