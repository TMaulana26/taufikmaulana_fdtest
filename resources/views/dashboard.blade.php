<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-amber-900 dark:text-indigo-100">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-amber-50 dark:bg-indigo-900 sm:rounded-lg">
                <div class="p-6 text-amber-900 dark:text-indigo-100">
                    {{ __("You're logged in!") }} <span><i class="fa-solid fa-check"></i></span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

