<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthorCard extends Component
{
    public $name;
    public $email;
    public $photo;
    public $books;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $email,
        string $photo,
        int $books
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->photo = $photo;
        $this->books = $books;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.author-card');
    }
}
