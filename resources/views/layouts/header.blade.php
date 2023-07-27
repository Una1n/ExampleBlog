<header class="container mx-auto flex w-full max-w-3xl items-center justify-between px-6 py-10 xl:max-w-5xl">
    <a rel="noopener noreferrer" href="/" class="block h-6 text-2xl font-semibold">Name of Blog</a>
    <div class="flex items-center">
        <div class="hidden space-x-2 font-medium sm:block">
            <a rel="noopener noreferrer" href="/" class="p-1">Blog</a>
            <a rel="noopener noreferrer" href="/" class="p-1">About</a>
            @if (!auth()->user())
                <a rel="noopener noreferrer" href="{{ route('login') }}" class="p-1">Login</a>
            @endif
        </div>
        <div class="sm:hidden">
            <button type="button" aria-label="Toggle Menu" class="ml-1 mr-1 h-8 w-8 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="dark:dark:text-gray-900">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="fixed right-0 top-24 z-10 h-full w-full translate-x-full transform duration-300 ease-in-out">
                <button type="button" aria-label="toggle modal"
                    class="fixed h-full w-full cursor-auto focus:outline-none"></button>
                <nav class="fixed mt-8 h-full">
                    <div class="px-12 py-4">
                        <a rel="noopener noreferrer" href="/"
                            class="tracki text-2xl font-bold dark:dark:text-gray-900">Blog</a>
                    </div>
                    <div class="px-12 py-4">
                        <a rel="noopener noreferrer" href="/"
                            class="tracki text-2xl font-bold dark:dark:text-gray-900">About</a>
                    </div>
                    <div class="px-12 py-4">
                        <a rel="noopener noreferrer" href="{{ route('login') }}"
                            class="tracki text-2xl font-bold dark:dark:text-gray-900">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
