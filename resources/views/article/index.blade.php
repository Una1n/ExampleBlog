<x-main-layout>
    <div class="space-y-6">
        <h2 class="text-3xl font-extrabold dark:text-gray-50">Blog Posts</h2>
        <ul class="space-y-8 xl:space-y-10">
            @forelse($articles as $article)
                <li>
                    <article>
                        <dl>
                            <dt class="sr-only">Published on</dt>
                            <dd class="text-xs dark:text-gray-400">
                                <time datetime="{{ $article->created_at }}">{{ $article->date_created_formatted }}</time>
                            </dd>
                        </dl>
                        <div class="space-y-1">
                            <h3 class="tracki text-2xl font-bold">
                                <a rel="noopener noreferrer" href="{{ route('article.show', $article) }}"
                                    class="dark:text-violet-300">{{ $article->title }}</a>
                            </h3>
                            <p class="prose max-w-full dark:text-gray-100">{{ $article->short_text }}</p>

                            <div class="flex flex-wrap space-x-3">
                                <a rel="noopener noreferrer" href="{{ route('category.show', $article->category) }}"
                                    class="rounded-sm bg-violet-400 px-3 pb-1 text-gray-900 hover:underline">
                                    {{ $article->category->name }}
                                </a>
                            </div>
                        </div>
                    </article>
                </li>
            @empty
                <div>No Articles Available, check back later</div>
            @endforelse
        </ul>
    </div>
    <div class="mt-4">{{ $articles->links() }}</div>
</x-main-layout>
