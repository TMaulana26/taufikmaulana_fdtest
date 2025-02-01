<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsCard extends Component
{
    public string $title;
    public string $icon;
    public int $count;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $icon, int $count)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->count = $count;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats-card');
    }
}
