<x-landing-layout>
    {{-- Navigation Bar --}}
    <nav
        class="fixed top-0 left-0 right-0 z-50 border-b dark:border-b-0 backdrop-blur-md dark:bg-transparent">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        {{-- You can add your logo here --}}
                        <img class="w-10 h-10 mr-2 rounded-md" src="{{ asset('assets/img/logo.svg') }}"
                            alt="Logo">
                        <span class="text-xl font-bold text-amber-600 dark:text-indigo-400">BMS</span>
                    </a>
                </div>
                <div class="flex items-center space-x-8">
                    <div class="mx-2 text-indigo-600 dark:text-amber-300">
                        <x-theme-button />
                    </div>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="transition-colors duration-200 text-amber-600 hover:text-amber-700 dark:text-indigo-300 dark:hover:text-indigo-400">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="transition-colors duration-200 text-amber-600 hover:text-amber-700 dark:text-indigo-300 dark:hover:text-indigo-400">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition-colors duration-200 border border-transparent rounded-md shadow-sm bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-500">
                            Sign up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content with adjusted padding for fixed navbar --}}
    <div class="pt-16 pb-20">
        <x-slot name="header">
            <div class="relative py-16 overflow-hidden sm:py-24">
                <div class="relative">
                    <h1
                        class="text-4xl font-bold tracking-tight text-center text-amber-900 dark:text-indigo-100">
                        {{ __('Books Management System') }}
                    </h1>
                    <p
                        class="max-w-3xl mx-auto mt-4 text-lg text-center text-amber-600 dark:text-indigo-400">
                        Manage your book collection with ease and efficiency.
                    </p>
                </div>
            </div>
        </x-slot>

        {{-- Hero Section with Animation --}}
        <div
            class="py-12 transition-all duration-500 bg-gradient-to-b from-amber-50 to-white dark:from-indigo-900 dark:to-indigo-800">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="flex items-center justify-center">
                    <div class="text-center" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 500)">
                        <h2 class="text-3xl font-semibold transition-all duration-500 transform text-amber-900 md:text-4xl dark:text-indigo-100"
                            x-show="shown" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0">
                            {{ __('Organize, Track, and Discover Books') }}
                        </h2>
                        <p class="max-w-2xl mx-auto mt-4 text-lg text-amber-600 dark:text-indigo-300">
                            Our system allows you to seamlessly manage books, and explore new
                            additions.
                        </p>
                        <div class="mt-8">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center px-10 py-4 space-x-2 text-white transition-all duration-200 transform rounded-lg shadow-lg bg-amber-600 hover:bg-amber-700 hover:scale-105 dark:bg-indigo-600 dark:hover:bg-indigo-700">
                                <span>{{ __('Get Started') }}</span>
                                <i class="fas fa-arrow-right fa-fw"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Features Section with Hover Effects --}}
        <div class="py-16 transition-all duration-500 bg-amber-50 dark:bg-indigo-900">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div
                        class="p-6 transition-all duration-200 transform border shadow-md border-amber-200 bg-amber-50 rounded-xl dark:bg-indigo-800 hover:scale-105 dark:border-indigo-700">
                        <div
                            class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-amber-100 dark:bg-indigo-900">
                            <svg class="w-6 h-6 text-amber-600 dark:text-indigo-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-amber-900 dark:text-indigo-100">
                            {{ __('Easy Book Management') }}
                        </h3>
                        <p class="mt-2 text-amber-600 dark:text-indigo-300">
                            Keep track of your books with an intuitive and user-friendly interface.
                        </p>
                    </div>

                    <div
                        class="p-6 transition-all duration-200 transform border shadow-md border-amber-200 bg-amber-50 rounded-xl dark:bg-indigo-800 hover:scale-105 dark:border-indigo-700">
                        <div
                            class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-amber-100 dark:bg-indigo-900">
                            <svg class="w-6 h-6 text-amber-600 dark:text-indigo-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-amber-900 dark:text-indigo-100">
                            {{ __('Discover New Reads') }}
                        </h3>
                        <p class="mt-2 text-amber-600 dark:text-indigo-300">
                            Get personalized book recommendations based on your interests.
                        </p>
                    </div>
                </div>
                <div class="mt-16 rounded-lg bg-amber-500 dark:bg-indigo-300">
                    <livewire:datatable.book />
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>

