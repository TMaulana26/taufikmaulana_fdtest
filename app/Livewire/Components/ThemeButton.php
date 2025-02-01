<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class ThemeButton extends Component
{
    public string $theme = 'light';

    public function mount()
    {
        $this->theme = session('theme', 'system');
    }

    public function toggleTheme()
    {
        $this->theme = match ($this->theme) {
            'light' => 'dark',
            'dark' => 'system',
            'system' => 'light',
        };

        session(['theme' => $this->theme]);
        $this->dispatch('theme-changed', theme: $this->theme);
    }

    public function render()
    {
        return view('livewire.components.theme-button');
    }
}
