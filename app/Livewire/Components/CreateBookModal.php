<?php

namespace App\Livewire\Components;

use stdClass;
use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateBookModal extends Component
{
    use WithFileUploads;

    public $show = false;
    public $title = '';
    public $description = '';
    public $thumbnail;
    public $rating = '';

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required|min:10',
        'thumbnail' => 'required|image|max:1024',
        'rating' => 'required|numeric|min:1|max:5',
    ];

    public function toggleModal()
    {
        $this->show = !$this->show;
    }

    public function submit()
    {
        $this->validate();
        
        $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');

        Book::create([
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => $thumbnailPath,
            'rating' => $this->rating,
            'author_id' => Auth::user()->id
        ]);

        $this->reset();
        $this->show = false;
        
        // Dispatch an event to refresh the books table
        $this->dispatch('book-created')->to('datatable.book');
    }
    public function render()
    {
        return view('livewire.components.create-book-modal');
    }
}
