<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-amber-600 dark:text-indigo-400">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div
                class="overflow-hidden shadow-sm bg-amber-50 dark:bg-indigo-950 dark:shadow-none sm:rounded-lg">
                <div class="flex items-center p-6 space-x-2 border-b border-amber-500 dark:border-indigo-500">
                    <span
                        class="text-xl font-medium text-amber-600 dark:text-indigo-400">{{ __("You're logged in!") }}</span>
                    <div
                        class="flex items-center justify-center w-6 h-6 rounded-full bg-amber-500 dark:bg-indigo-600">
                        <div class="w-4 h-4 rounded-full bg-amber-300 dark:bg-indigo-400 animate-pulse"></div>
                    </div>
                </div>
                <livewire:components.dashboard-card />
            </div>
        </div>
    </div>
</x-app-layout>
