<?php

namespace App\Livewire\Components;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use Livewire\Component;

class DashboardCard extends Component
{
    public $users;
    public $authors;
    public $books;

    public function mount()
    {
        $this->users = User::count();
        $this->authors = Author::count();
        $this->books = Book::count();
    }

    public function render()
    {
        return view('livewire.components.dashboard-card');
    }
}
