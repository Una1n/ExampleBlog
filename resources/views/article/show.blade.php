<x-main-layout>
    <article class="space-y-4 bg-gray-800 text-gray-50">
        <div class="space-y-4">
            <div class="text-sm font-semibold uppercase dark:text-violet-400">
                <a href="#">{{ $article->category->name }}</a>
            </div>
            <h1 class="md:tracki text-4xl font-bold md:text-5xl">{{ $article->title }}</h1>
            <div class="flex w-full flex-col items-start justify-between text-gray-400 md:flex-row md:items-center">
                <div class="flex items-center md:space-x-2">
                    <img src="https://source.unsplash.com/75x75/?portrait" alt=""
                        class="h-8 w-8 rounded-full border border-gray-700 bg-gray-500">
                    <p class="text-sm">Author • {{ $article->date_created_formatted_detail }}</p>
                </div>
                <p class="mt-3 flex-shrink-0 text-sm md:mt-0">
                    {{ str()->readDuration($article->text) }} min read • 1,570 views
                </p>
            </div>
            @if (auth()->user())
                <div class="flex gap-5">
                    <a class="block w-fit rounded-lg bg-violet-400 px-2 hover:bg-violet-800"
                        href="{{ route('article.edit', $article) }}">Edit</a>
                    <form method="POST" action="{{ route('article.destroy', $article) }}"
                        onsubmit="return confirm('Do you want to delete this article?');">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="rounded-lg bg-red-500 px-2 font-medium text-red-200 hover:bg-red-800">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>
        <div class="whitespace-pre-wrap text-gray-100">
            <p>{{ $article->text }}</p>
        </div>
    </article>
    <div>
        <div class="flex flex-wrap space-x-2 border-t border-dashed border-gray-400 py-6">
            @foreach ($article->tags as $tag)
                <a rel="noopener noreferrer" href="{{ route('tag.show', $tag) }}"
                    class="rounded-sm bg-violet-400 px-3 py-1 text-gray-900 hover:underline">#{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
</x-main-layout>
