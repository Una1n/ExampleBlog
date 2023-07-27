<x-main-layout>
    <article class="space-y-8 bg-gray-800 text-gray-50">
        <div class="space-y-6">
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
        </div>
        <div class="whitespace-pre-wrap text-gray-100">
            <p>{{ $article->text }}</p>
        </div>
    </article>
    <div>
        <div class="flex flex-wrap space-x-2 border-t border-dashed border-gray-400 py-6">
            <a rel="noopener noreferrer" href="#"
                class="rounded-sm bg-violet-400 px-3 py-1 text-gray-900 hover:underline">#Tag1</a>
            <a rel="noopener noreferrer" href="#"
                class="rounded-sm bg-violet-400 px-3 py-1 text-gray-900 hover:underline">#Tag2</a>
            <a rel="noopener noreferrer" href="#"
                class="rounded-sm bg-violet-400 px-3 py-1 text-gray-900 hover:underline">#Tag3</a>
        </div>
    </div>
</x-main-layout>
