<?php

namespace App\Livewire\Datatable;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Models\Book as Literature;

class Book extends Component
{
    use WithPagination;
    
    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = '';

    public function updating($field)
    {
        if (in_array($field, ['search', 'filter', 'perPage'])) {
            $this->resetPage();
        }
    }

    #[On('book-created')] 
    public function bookCreated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $books = Literature::query()->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc');

        if ($this->search) {
            $books->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter) {
            $books->where('title', 'like', $this->filter . '%');
        }

        return view('livewire.datatable.book', [
            'books' => $books->paginate($this->perPage),
        ]);
    }
}
