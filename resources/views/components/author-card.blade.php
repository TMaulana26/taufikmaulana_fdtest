<div x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
    class="relative w-full max-w-xs p-4 transition-all duration-300 ease-in-out bg-white border border-gray-200 shadow-md sm:max-w-sm md:max-w-md lg:max-w-lg rounded-2xl dark:bg-gray-800 dark:border-gray-700"
    :class="{ 'scale-105 shadow-xl ring-2 ring-blue-300 dark:ring-blue-700': isHovered }">

    <div class="relative flex items-center justify-center w-20 h-20 mx-auto overflow-hidden transition-transform duration-300 rounded-full shadow-md sm:w-24 sm:h-24"
        :class="{ 'scale-110 ring-2 ring-blue-400 dark:ring-blue-500': isHovered }">
        <img src="{{ $photo }}" alt="Profile Photo" class="object-cover w-full h-full rounded-full">
    </div>

    <div class="mt-4 text-center">
        <h3 class="text-lg font-semibold text-gray-800 sm:text-xl dark:text-gray-200">
            {{ $name }}
        </h3>
        <p class="text-xs text-gray-500 sm:text-sm dark:text-gray-400">
            {{ $email }}
        </p>
        <p class="text-xs text-gray-500 sm:text-sm dark:text-gray-400">
            {{ __('Books : ') }}{{ $books }}
        </p>
    </div>
</div>
