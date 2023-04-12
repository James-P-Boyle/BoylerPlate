<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <x-dash-content-layout>


        <div class="mt-4">
            <form
                action={{ route('blog.store') }}
                method="POST"
                enctype="multipart/form-data"
                class="flex flex-col gap-2">
                @csrf

                <div class="p-1">
                    <label for="is_published" class="text-gray-500 text-xl">
                        Is Published
                    </label>
                    <input
                        type="checkbox"
                        class="text-xl"
                        name="is_published"
                        value="1"
                    >
                </div>

                <input
                    type="text"
                    name="tags"
                    id="tags"
                    placeholder="Tags separated by commas"
                    value="{{ old('tags') }}"
                    class="border-b rounded-lg px-2 bg-transparent text-xl"
                >
                @error('tags')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <input
                    type="text"
                    name="title"
                    placeholder="Title..."
                    value="{{ old('title') }}"
                    class="border-b rounded-lg px-2 bg-transparent text-xl"
                >
                @error('title')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <input
                    type="text"
                    name="excerpt"
                    placeholder="Excerpt..."
                    value="{{ old('excerpt') }}"
                    class="border-b rounded-lg px-2 bg-transparent text-xl"
                >

                @error('excerpt')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <input
                    type="number"
                    name="min_to_read"
                    placeholder="Minutes to read..."
                    value="{{ old('min_to_read') }}"
                    class="border-b rounded-lg px-2 bg-transparent text-xl"
                >

                @error('min_to_read')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <textarea
                    name="body"
                    placeholder="Body..."
                    rows="6"
                    class="px-2 bg-transparent text-left text-xl border rounded-lg"
                >{{ old('body') }}</textarea>


                @error('body')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror

                <input
                    type="text"
                    name="meta_title"
                    placeholder="Optional Meta Title ?"
                    value="{{ old('meta_title') }}"
                    class="border-b rounded-lg px-2 bg-transparent text-xl"
                >

                <textarea
                    name="meta_description"
                    placeholder="Optional Meta Description ?"
                    rows="2"
                    class="px-2 bg-transparent text-left text-xl border rounded-lg"
                >{{ old('meta_description') }}</textarea>

                <div class="border rounded-lg p-3">
                    <label class="flex flex-col items-start gap-2 rounded-lg cursor-pointer">
                        <span class="text-gray-500 text-xl">
                            Select a file
                        </span>
                        <input
                            type="file"
                            name="image"
                            class="">
                    </label>
                </div>

                <button
                    type="submit"
                    class="bg-green-500 text-white text-lg font-bold py-4 rounded-lg hover:bg-green-400 transition-colors">
                    Submit Post
                </button>
            </form>
        </div>
    </x-dash-content-layout>
</x-app-layout>