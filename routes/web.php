<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Pages\BookController;
use App\Http\Controllers\Pages\UsersController;
use App\Http\Controllers\Pages\AuthorController;
use App\Http\Controllers\Pages\MyBookController;
use App\Http\Controllers\Pages\ReaderController;
use App\Http\Controllers\Pages\DashboardController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class)->only(['index']);

    Route::get('/reader', [ReaderController::class, 'index'])->name('reader.index');

    Route::prefix('author')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
    });

    Route::resource('book', BookController::class)->only(['index']);

    Route::get('/my-book', [MyBookController::class, 'index'])->name('my-book.index');



    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
