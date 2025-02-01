<?php

namespace App\Livewire\Components;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class BookModal extends Component
{
    public $isOpen = false;
    public $book = null;
    public $isInList = false;

    #[On('showBookModal')]
    public function showModal(int $bookId)
    {
        $this->book = Book::with('author')->find($bookId);
        $this->isOpen = true;
        $this->checkIfInList();
    }

    public function checkIfInList()
    {
        if ($this->book) {
            $this->isInList = Auth::user()->books()->where('book_id', $this->book->id)->exists();
        }
    }

    public function addToList()
    {
        if (!$this->book) {
            return;
        }

        if ($this->isInList) {
            // Remove from list
            Auth::user()->books()->detach($this->book->id);
            $this->isInList = false;
        } else {
            // Add to list
            Auth::user()->books()->attach($this->book->id);
            $this->isInList = true;
        }

        $this->dispatch('book-list-updated');
    }


    public function closeModal()
    {
        $this->isOpen = false;
        $this->book = null;
        $this->isInList = false;
    }
    public function render()
    {
        return view('livewire.components.book-modal');
    }
}
