<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
