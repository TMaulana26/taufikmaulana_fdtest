<?php

namespace App\Http\Controllers\Pages;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('pages.author', compact('authors'));
    }

    public function create()
    {
        $author = new Author();
        $author->name = Auth::user()->name;
        $author->user_id = Auth::user()->id;
        $author->save();

        return redirect()->route('author.index')->with('success', 'You have successfully become an author.');
    }
}
