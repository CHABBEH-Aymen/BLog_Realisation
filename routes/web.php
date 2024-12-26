<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['permission:add comment'])->group(function() {
    Route::get('/comments' , [App\Http\Controllers\CommentController::class, 'index'])->name('comments');
});