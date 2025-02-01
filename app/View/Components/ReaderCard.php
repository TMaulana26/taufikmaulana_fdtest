<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReaderCard extends Component
{
    public $name;
    public $email;
    public $status;
    public $photo;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $email,
        string $status,
        string $photo
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->status = $status;
        $this->photo = $photo;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.reader-card');
    }
}
