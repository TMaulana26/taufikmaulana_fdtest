<?php

namespace App\Http\Controllers\Pages;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $authors = Author::all();
        $books = Book::all();
        return view('pages.dashboard', compact('users', 'authors', 'books'));
    }
}
