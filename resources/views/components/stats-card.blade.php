<div x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false" class="group">

    <div class="relative overflow-hidden transition-transform duration-300 ease-out bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700"
        :class="{ 'scale-105 shadow-xl ring-2 ring-blue-300 dark:ring-blue-700': isHovered }">

        <div class="p-6">
            <div class="space-y-4 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 p-4 transition-all duration-300 transform rounded-full"
                    :class="isHovered ? 'bg-blue-200 dark:bg-blue-800 scale-110 shadow-md' :
                        'bg-gray-100 dark:bg-gray-700'">
                    <i class="fa-solid {{ $icon }} text-4xl text-gray-500 transition-all duration-300 transform"
                        :class="isHovered ? 'text-blue-600 dark:text-blue-400 rotate-[10deg] scale-110' :
                            'text-gray-500 dark:text-gray-400'"
                        style="width: 40px; height: 40px; line-height: 40px;"></i>
                </div>
                <div class="space-y-2">
                    <span class="block text-3xl font-bold text-gray-700 dark:text-gray-300">
                        {{ $count }}
                    </span>
                    <span class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __($title) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
