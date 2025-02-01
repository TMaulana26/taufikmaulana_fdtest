<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <p class="text-xl font-medium text-gray-900 dark:text-gray-100">
                        {{ __('List of Authors !') }}</p>
                    @if (!Auth::user()->author)
                        <a href="{{ route('author.create') }}"
                            class="inline-flex items-center px-4 py-2 text-base font-medium leading-6 text-gray-900 transition duration-150 ease-in-out bg-gray-200 border border-transparent rounded-md hover:bg-gray-300 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray active:bg-gray-400 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            {{ __('Become An Author') }}
                        </a>
                    @endif
                </div>
                <livewire:datatable.author />
            </div>
        </div>
    </div>
</x-app-layout>
