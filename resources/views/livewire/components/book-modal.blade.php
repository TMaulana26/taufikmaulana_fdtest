<div>
    @if ($isOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" wire:click="closeModal"
                    aria-hidden="true"></div>

                <!-- Modal panel -->
                <div class="relative w-full max-w-2xl p-6 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-800 sm:my-8"
                    x-data @keydown.escape.window="$wire.closeModal()">

                    <!-- Close button -->
                    <button wire:click="closeModal"
                        class="absolute text-gray-500 top-4 right-4 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <i class="text-xl fas fa-times"></i>
                    </button>

                    @if ($book)
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Book Image -->
                            <div class="aspect-[3/4] relative">
                                <img src="{{ $book->thumbnail ? asset('storage/' . $book->thumbnail) : asset('assets/img/def_book_cover.svg') }}"
                                    alt="{{ $book->title }}" class="object-cover w-full h-full rounded-lg">
                            </div>

                            <!-- Book Details -->
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                                    {{ $book->title }}
                                </h2>

                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    By {{ $book->author->name }}
                                </p>

                                <!-- Rating -->
                                <div class="flex items-center mt-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i
                                            class="text-lg fas fa-star {{ $i <= $book->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                    @endfor
                                    <span
                                        class="ml-2 text-gray-600 dark:text-gray-400">{{ $book->rating }}/5</span>
                                </div>

                                <!-- Description -->
                                <div class="mt-6">
                                    <h3 class="font-medium text-gray-900 dark:text-white">Description</h3>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                                        {{ $book->description }}
                                    </p>
                                </div>

                                <!-- Additional Info -->
                                <div class="mt-6 space-y-3">
                                    <div>
                                        <h3 class="font-medium text-gray-900 dark:text-white">Created</h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                            {{ $book->created_at->format('F j, Y') }}
                                        </p>
                                    </div>

                                    <div>
                                        <h3 class="font-medium text-gray-900 dark:text-white">Last Updated
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                            {{ $book->updated_at->format('F j, Y') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Add to List Button -->
                                <div class="mt-6">
                                    <button wire:click="addToList" wire:loading.attr="disabled"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50">
                                        <span wire:loading.remove wire:target="addToList">
                                            @if ($isInList)
                                                <i class="mr-2 fas fa-check"></i> In Your List
                                            @else
                                                <i class="mr-2 fas fa-plus"></i> Add to My List
                                            @endif
                                        </span>
                                        <span wire:loading wire:target="addToList">
                                            <i class="mr-2 fas fa-spinner fa-spin"></i> Processing...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
