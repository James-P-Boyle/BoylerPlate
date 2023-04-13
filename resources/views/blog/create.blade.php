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

                <x-text-input
                    type="text"
                    name="tags"
                    id="tags"
                    placeholder="Tags separated by commas"
                    value="{{ old('tags') }}"
                />

                @error('tags')
                    <div class="text-ci-red text-sm">{{ $message }}</div>
                @enderror

                <x-text-input
                    type="text"
                    name="title"
                    placeholder="Title..."
                    value="{{ old('title') }}"
                />

                @error('title')
                    <div class="text-ci-red text-sm">{{ $message }}</div>
                @enderror

                <x-text-input
                    type="text"
                    name="excerpt"
                    placeholder="Excerpt..."
                    value="{{ old('excerpt') }}"
                />

                @error('excerpt')
                    <div class="text-ci-red text-sm">{{ $message }}</div>
                @enderror

                <x-text-input
                    type="number"
                    name="min_to_read"
                    placeholder="Minutes to read..."
                    value="{{ old('min_to_read') }}"
                />

                @error('min_to_read')
                    <div class="text-ci-red text-sm">{{ $message }}</div>
                @enderror

                <textarea
                    name="body"
                    placeholder="Body..."
                    rows="6"
                    class="px-2 bg-transparent text-left text-xl border rounded-lg"
                >{{ old('body') }}</textarea>


                @error('body')
                    <div class="text-ci-red text-sm">{{ $message }}</div>
                @enderror

                <x-text-input
                    type="text"
                    name="meta_title"
                    placeholder="Optional Meta Title ?"
                    value="{{ old('meta_title') }}"
                />

                <x-text-area
                    name="meta_description"
                    placeholder="Optional Meta Description ?"
                    rows="2"
                    value="{{ old('meta_description') }}"
                />

                <div class="border rounded-lg p-3">
                    <input
                        type="file"
                        name="image"
                    />
                </div>

                <x-primary-button>
                    Submit Post
                </x-primary-button>
            </form>
        </div>
    </x-dash-content-layout>
</x-app-layout>