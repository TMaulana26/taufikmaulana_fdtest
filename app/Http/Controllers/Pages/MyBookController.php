<?php

namespace App\Http\Controllers\Pages;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyBookController extends Controller
{
    public function index()
    {
        $myBook = Book::with('users')->get();
        return view('pages.my-book', compact('myBook'));
    }
}
