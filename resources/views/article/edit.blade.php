<x-main-layout>
    <h2 class="text-3xl font-extrabold dark:text-gray-50">Edit Article</h2>
    <form method="POST" action="{{ route('article.update', $article) }}">
        @method('PATCH')
        @csrf
        <div class="mb-6 space-y-4">
            <div>
                <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500"
                    placeholder="Title for the article" value="{{ old('title', $article->title) }}" required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="category_id"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select name="category_id" id="category_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="text" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Text</label>
                <textarea id="text" name="text" placeholder="Write something..." rows="12"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500">{{ old('text', $article->text) }}</textarea>
                @error('text')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tags" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                <select name="tags[]" id="tags" multiple
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @selected(collect(old('tags', $article->tags->pluck('id')))->contains($tag->id))>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-violet-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-400 dark:hover:bg-violet-700 dark:focus:ring-violet-800 sm:w-auto">
            Save
        </button>
    </form>

</x-main-layout>
