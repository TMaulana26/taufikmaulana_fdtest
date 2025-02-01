<?php

namespace App\Livewire\Datatable;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Mybook extends Component
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
    public function render()
    {
        $myBooks = Book::with('users')
            ->whereHas('users', function ($query) {
                $query->where('users.id', auth()->id());
            })
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc');

        if ($this->search) {
            $myBooks->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('author', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter) {
            $myBooks->where('title', 'like', $this->filter . '%');
        }

        return view('livewire.datatable.mybook', [
            'myBooks' => $myBooks->paginate($this->perPage),
        ]);
    }
}
