<x-main-layout>
    <h2 class="text-3xl font-extrabold dark:text-gray-50">Edit Tag</h2>
    <form method="POST" action="{{ route('tag.update', $tag) }}">
        @method('PATCH')
        @csrf
        <div class="mb-6">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="name"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500"
                placeholder="name" required value="{{ old('name', $tag->name) }}">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-violet-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-400 dark:hover:bg-violet-700 dark:focus:ring-violet-800 sm:w-auto">
            Save
        </button>
    </form>
</x-main-layout>
