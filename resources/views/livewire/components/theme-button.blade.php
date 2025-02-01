<div>
    <button wire:click="toggleTheme"
        class="p-1 transition-colors rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700" title="Toggle theme">
        @if ($theme === 'light')
            <i class=" fas fa-sun"></i>
        @elseif ($theme === 'dark')
            <i class=" fas fa-moon"></i>
        @else
            <i class=" fas fa-desktop"></i>
        @endif
        <span class="sr-only">Current theme: {{ $theme }}</span>
    </button>

    <script>
        document.addEventListener('livewire:initialized', () => {
            if (!localStorage.theme) {
                localStorage.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' :
                    'light';
            }

            function updateTheme(theme) {
                if (theme === 'dark' || (theme === 'system' && window.matchMedia(
                        '(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }

            @this.on('theme-changed', (event) => {
                localStorage.theme = event.theme;
                updateTheme(event.theme);
            });

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (@this.theme === 'system') {
                    updateTheme('system');
                }
            });

            updateTheme(@this.theme);
        });
    </script>
</div>
