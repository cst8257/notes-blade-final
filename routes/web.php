<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [NoteController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard', [NoteController::class, 'store'])->middleware(['auth', 'verified']);

Route::put('/dashboard/notes/{note}', [NoteController::class, 'update'])->middleware(['auth', 'verified']);

Route::delete('/dashboard/notes/{note}', [NoteController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
