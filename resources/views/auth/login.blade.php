<x-main-layout>
    <div class="mx-auto max-w-md rounded-md p-6 dark:bg-gray-900 dark:text-gray-100 sm:p-10">
        <div class="mb-2 text-center">
            <h1 class="my-3 text-4xl font-bold">Sign in</h1>
            <p class="text-sm dark:text-gray-400">Sign in to access your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>
        <form method="POST" action="{{ route('loginpost') }}" class="space-y-12" data-bitwarden-watching="1">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="mb-2 block text-sm">Email address</label>
                    <input type="email" name="email" id="email" placeholder="leroy@jenkins.com"
                        class="w-full rounded-md border px-3 py-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <div class="mb-2 flex justify-between">
                        <label for="password" class="text-sm">Password</label>
                    </div>
                    <input type="password" name="password" id="password" placeholder="*****"
                        class="w-full rounded-md border px-3 py-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            <div class="space-y-2">
                <div>
                    <button type="submit"
                        class="w-full rounded-md px-8 py-3 font-semibold dark:bg-violet-400 dark:text-gray-900">
                        Sign in
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-main-layout>
