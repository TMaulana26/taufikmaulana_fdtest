<?php

namespace App\Livewire\Datatable;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Reader extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = '';

    #[Url(history: true)]
    public $verificationStatus = '';

    public function updating($field)
    {
        if (in_array($field, ['search', 'filter', 'perPage', 'verificationStatus'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = User::query()->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter) {
            $query->where('name', 'like', $this->filter . '%');
        }

        if ($this->verificationStatus !== '') {
            if ($this->verificationStatus === 'verified') {
                $query->whereNotNull('email_verified_at');
            } else if ($this->verificationStatus === 'unverified') {
                $query->whereNull('email_verified_at');
            }
        }

        return view('livewire.datatable.reader', [
            'readers' => $query->paginate($this->perPage),
        ]);
    }
}
