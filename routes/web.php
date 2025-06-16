<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard now directly uses NoteController@index
    Route::get('/dashboard', [NoteController::class, 'index'])->name('dashboard');

    // Notes resource routes except 'show'
    Route::resource('notes', NoteController::class)->except(['show']);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
