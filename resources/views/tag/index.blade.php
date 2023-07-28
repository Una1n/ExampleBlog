<x-main-layout>
    <h2 class="text-3xl font-extrabold dark:text-gray-50">Tags</h2>
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
                @forelse($tags as $tag)
                    <tr class="border-b border-gray-700 bg-gray-900">
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $tag->name }}
                        </th>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('tag.edit', $tag) }}" class="font-medium text-purple-400 hover:underline">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <form method="POST" action="{{ route('tag.destroy', $tag) }}"
                                onsubmit="return confirm('Do you want to delete this tag?');">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-400 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div>No tags found</div>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('tag.create') }}" class="block">
        <div class="w-fit rounded-lg bg-violet-500 p-3 text-violet-200">
            Create New Tag
        </div>
    </a>
</x-main-layout>
