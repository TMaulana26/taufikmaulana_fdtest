<?php

namespace App\View\Components;

use App\Models\Author;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookCard extends Component
{
    public $title;
    public $author;
    public $description;
    public $thumbnail;
    public $rating;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        int $author,
        string $thumbnail,
        string $rating
    )
    {
        $this->title = $title;
        $this->author = $author;
        $this->thumbnail = $thumbnail;
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $authorName = Author::find($this->author)->name;
        return view('components.book-card', compact('authorName'));
    }
}
