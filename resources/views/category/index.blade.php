<x-main-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Edit
                    </th>
                    <th scope="col" class="w-20 px-6 py-3 text-right">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-gray-700 bg-gray-900">
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('category.edit', $category) }}"
                                class="font-medium text-purple-400 hover:underline">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form method="POST" action="{{ route('category.destroy', $category) }}"
                                onsubmit="return confirm('Do you want to delete this category?');">
                                @method('DELETE')
                                @csrf
                                <button type="submit" href="{{ route('category.destroy', $category) }}"
                                    class="font-medium text-red-400 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div>No categories found</div>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('category.create') }}" class="block">
        <div class="w-fit rounded-lg bg-violet-500 p-3 text-violet-200">
            Create New Category
        </div>
    </a>
</x-main-layout>
