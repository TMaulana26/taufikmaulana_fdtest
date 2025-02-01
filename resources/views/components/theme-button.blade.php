<div x-data="themeSwitcher()" x-init="init()" class="flex items-center">
    <button @click="toggle()" class="px-2 py-1">
        <i :class="isDark ? 'fas fa-sun' : 'fas fa-moon'"></i>
    </button>
</div>

<script>
    function themeSwitcher() {
        return {
            isDark: false,
            init() {
                this.isDark = localStorage.theme === 'dark' ||
                    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
                this.updateTheme();
            },
            toggle() {
                this.isDark = !this.isDark;
                localStorage.theme = this.isDark ? 'dark' : 'light';
                this.updateTheme();
            },
            updateTheme() {
                document.documentElement.classList.toggle('dark', this.isDark);
            }
        };
    }
</script>
