<?php
// PHP code remains unchanged since it doesn't contain any styling
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }"
    class="border-b bg-amber-50 border-amber-200 dark:bg-indigo-950 dark:border-indigo-800">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo
                            class="block w-auto h-12 fill-current text-amber-600 rounded-xl dark:text-indigo-400" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                        class="text-amber-700 hover:text-amber-900 dark:text-indigo-300 dark:hover:text-indigo-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('reader.index')" :active="request()->routeIs('reader.index')" wire:navigate
                        class="text-amber-700 hover:text-amber-900 dark:text-indigo-300 dark:hover:text-indigo-200">
                        {{ __('Reader') }}
                    </x-nav-link>
                    <x-nav-link :href="route('author.index')" :active="request()->routeIs('author.index')" wire:navigate
                        class="text-amber-700 hover:text-amber-900 dark:text-indigo-300 dark:hover:text-indigo-200">
                        {{ __('Author') }}
                    </x-nav-link>
                    <x-nav-link :href="route('book.index')" :active="request()->routeIs('book.index')" wire:navigate
                        class="text-amber-700 hover:text-amber-900 dark:text-indigo-300 dark:hover:text-indigo-200">
                        {{ __('Book') }}
                    </x-nav-link>
                    <x-nav-link :href="route('my-book.index')" :active="request()->routeIs('my-book.index')" wire:navigate
                        class="text-amber-700 hover:text-amber-900 dark:text-indigo-300 dark:hover:text-indigo-200">
                        {{ __('My Book List') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="mx-2 text-amber-600 dark:text-indigo-400">
                    <x-theme-button />
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md text-amber-700 bg-amber-50 dark:text-indigo-300 dark:bg-indigo-900 hover:text-amber-900 dark:hover:text-indigo-200 focus:outline-none">
                            <!-- User Photo -->
                            <img src="{{ auth()->user()->profile_photo_url
                                ? asset('storage/' . auth()->user()->profile_photo_url)
                                : asset('assets/img/def_profile.svg') }}"
                                alt="{{ auth()->user()->name }}" class="object-cover w-8 h-8 rounded-full">

                            <!-- Dropdown Icon -->
                            <div class="text-xs transition duration-300 ease-in-out rotate-0 ms-1"
                                x-bind:class="{ 'rotate-180': open }">
                                <i class="fas fa-chevron-down fa-fw"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div
                            class="flex flex-col items-center justify-center p-2 text-center bg-amber-50 dark:bg-indigo-950">
                            <img src="{{ auth()->user()->profile_photo_url
                                ? asset('storage/' . auth()->user()->profile_photo_url)
                                : asset('assets/img/def_profile.svg') }}"
                                alt="{{ auth()->user()->name }}" class="object-cover w-8 h-8 rounded-full">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"
                                class="font-medium text-amber-800 dark:text-indigo-300"></div>
                            <div class="text-sm text-amber-600 dark:text-indigo-400">
                                {{ auth()->user()->email }}
                                <span x-data="{ visible: true }" x-init="setTimeout(() => visible = false, 3000)" x-show="visible"
                                    class="inline-flex items-center ms-1">
                                    @if (auth()->user()->hasVerifiedEmail())
                                        <p class="text-xs italic text-amber-600 dark:text-indigo-400">verify
                                            <i class="text-green-500 fas fa-check fa-fw"></i>
                                        </p>
                                    @else
                                        <i class="text-red-500 fas fa-times fa-fw"></i>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <hr class="border-amber-200 dark:border-indigo-800">
                        <!-- Profile Link -->
                        <x-dropdown-link :href="route('profile')" wire:navigate
                            class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link
                                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <div class="mx-2 text-amber-600 dark:text-indigo-400">
                    <x-theme-button />
                </div>
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-amber-500 dark:text-indigo-400 hover:text-amber-700 dark:hover:text-indigo-300 hover:bg-amber-100 dark:hover:bg-indigo-900 focus:outline-none focus:bg-amber-100 dark:focus:bg-indigo-900 focus:text-amber-700 dark:focus:text-indigo-300">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate
                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reader.index')" :active="request()->routeIs('reader.index')" wire:navigate
                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                {{ __('Reader') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('author.index')" :active="request()->routeIs('author.index')" wire:navigate
                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                {{ __('Author') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('book.index')" :active="request()->routeIs('book.index')" wire:navigate
                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                {{ __('Book') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('my-book.index')" :active="request()->routeIs('my-book.index')" wire:navigate
                class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                {{ __('My Book List') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-amber-200 dark:border-indigo-800">
            <div class="flex justify-between px-4">
                <div class="flex flex-col">
                    <div class="text-base font-medium text-amber-800 dark:text-indigo-300"
                        x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                        x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="text-sm font-medium text-amber-600 dark:text-indigo-400">
                        {{ auth()->user()->email }}</div>
                    <span x-data="{ visible: true }" x-init="setTimeout(() => visible = false, 3000)" x-show="visible"
                        class="inline-flex items-center ms-1">
                        @if (auth()->user()->hasVerifiedEmail())
                            <p class="text-xs italic text-amber-600 dark:text-indigo-400">verify
                                <i class="text-green-500 fas fa-check fa-fw"></i>
                            </p>
                        @else
                            <i class="text-red-500 fas fa-times fa-fw"></i>
                        @endif
                    </span>
                </div>
                <img src="{{ auth()->user()->profile_photo_url
                    ? asset('storage/' . auth()->user()->profile_photo_url)
                    : asset('assets/img/def_profile.svg') }}"
                    alt="{{ auth()->user()->name }}" class="object-cover w-16 h-16 rounded-full">
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate
                    class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link
                        class="text-amber-700 hover:bg-amber-100 dark:text-indigo-300 dark:hover:bg-indigo-900">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
