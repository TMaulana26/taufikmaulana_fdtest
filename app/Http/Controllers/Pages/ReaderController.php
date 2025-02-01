<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readers = User::all();
        return view('pages.reader', compact('readers'));
    }
}
