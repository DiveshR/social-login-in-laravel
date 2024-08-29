<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/','auth.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');