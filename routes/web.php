<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;

// Route::inertia('/', 'Welcome')->name('home');
Route::redirect('/', '/login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/cards')->name('dashboard');
});

require __DIR__.'/settings.php';
Route::resource('cards', CardController::class)->middleware(['auth']);