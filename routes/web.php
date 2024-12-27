<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware("auth")->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get("dashboard", function () {
        return view('dashboard');
    })->name("dashboard");
});
//public
Route::view('/public', 'public.home');