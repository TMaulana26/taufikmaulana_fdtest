<div class="p-3 sm:p-6">
    <div class="p-3 mb-6 bg-white rounded-lg shadow-sm dark:bg-gray-700 sm:p-4">
        <div class="flex flex-col gap-4">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="w-5 h-5 text-gray-400 fas fa-search"></i>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search books..."
                    class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-all duration-200">
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                <select wire:model.live="filter"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-all duration-200">
                    <option value="">{{ __('All Names') }}</option>
                    @foreach (range('A', 'Z') as $letter)
                        <option value="{{ $letter }}">{{ __('Starts with') }} {{ $letter }}
                        </option>
                    @endforeach
                </select>

                <select wire:model.live="perPage"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition-all duration-200">
                    @foreach ([5, 10, 25, 50, 100] as $size)
                        <option value="{{ $size }}">{{ $size }} per page</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div wire:loading class="w-full dark:text-white">
        <div class="flex items-center justify-center py-4 animate-pulse">
            <div class="w-4 h-4 mr-2 bg-gray-500 rounded-full dark:bg-gray-300"></div>
            <div class="w-4 h-4 mr-2 bg-gray-500 rounded-full dark:bg-gray-300"></div>
            <div class="w-4 h-4 bg-gray-500 rounded-full dark:bg-gray-300"></div>
        </div>
    </div>

    <div wire:loading.remove class="grid w-full gap-3 sm:gap-4 md:gap-5 lg:gap-6"
        :class="{
            'grid-cols-1': true,
            'sm:grid-cols-2': true,
            'md:grid-cols-2': true,
            'lg:grid-cols-3': true,
            'xl:grid-cols-4': true
        }">
        @forelse ($books as $book)
            <button wire:click="$dispatch('showBookModal', [{{ $book->id }}])" type="button">
                <div class="transition-all duration-200 transform hover:scale-102 focus-within:scale-102">
                    <x-book-card 
                        :title="$book->title" 
                        :author="$book->author_id" 
                        :rating="$book->rating" 
                        :thumbnail="$book->thumbnail
                            ? asset('storage/' . $book->thumbnail)
                            : asset('assets/img/def_book_cover.svg')" 
                    />
                </div>
            </button>
        @empty
            <div
                class="flex flex-col items-center justify-center col-span-full min-h-[200px] py-8 px-4 bg-white rounded-lg dark:bg-gray-800">
                <i class="mb-4 text-4xl text-gray-400 sm:text-5xl md:text-6xl fas fa-folder-open"></i>
                <h3 class="text-base font-medium text-center text-gray-900 sm:text-lg dark:text-white">
                    No Book found
                </h3>
                <p class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                    Try adjusting your search or filter to find what you're looking for.
                </p>
            </div>
        @endforelse
    </div>
    <livewire:components.book-modal />

    <div class="mt-4 sm:mt-6">
        {{ $books->links() }}
    </div>
</div>
