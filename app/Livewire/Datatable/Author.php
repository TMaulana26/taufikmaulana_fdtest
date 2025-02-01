<?php

namespace App\Livewire\Datatable;

use App\Models\Author as Writer;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Author extends Component
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
        $authors = Writer::query()->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc');

        if ($this->search) {
            $authors->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter) {
            $authors->where('name', 'like', $this->filter . '%');
        }

        return view('livewire.datatable.author', [
            'authors' => $authors->paginate($this->perPage),
        ]);
    }
}
