<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center p-6 space-x-2 border-b border-gray-200 dark:border-gray-700">
                    <span
                        class="text-xl font-medium text-gray-900 dark:text-gray-100">{{ __("You're logged in!") }}</span>
                    <div
                        class="flex items-center justify-center w-6 h-6 bg-green-100 rounded-full dark:bg-green-900">
                        <div class="w-4 h-4 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
