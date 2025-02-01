<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Reader') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center p-6 space-x-2 border-b border-gray-200 dark:border-gray-700">
                    <span
                        class="text-xl font-medium text-gray-900 dark:text-gray-100">{{ __('List of readers !') }}</span>
                </div>
                <livewire:datatable.reader />
            </div>
        </div>
    </div>
</x-app-layout>
