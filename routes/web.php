<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('public.home');
});

Auth::routes();

Route::middleware("auth")->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get("dashboard", function () {
        return view('dashboard');
    })->name("dashboard");
    // comment routes
    Route::get("/comment/create", [CommentController::class, "create"])->name("comment.create");
    Route::post("/comment/store", [CommentController::class, "store"])->name("comment.store");
    // only user that owns the comment and the admin can delete comment
    // registred in CommentPermissions Middleware
    Route::delete("/comment/delete", [CommentController::class, "delete"])
    ->name("comment.delete")
    ->middleware("auth.comment");
    
    // only admin should create articles
    //create
    Route::get('/articles/create', [ArticleController::class, 'create'])
    ->name('article.create')
    ->middleware("role:admin");
    //store
    Route::post('/articles/store', [ArticleController::class, 'store'])
    ->name('article.store')
    ->middleware("role:admin");
});

// any one can see comments this should be public
Route::get('/comments' , [App\Http\Controllers\CommentController::class, 'index'])->name('comments');

// create article
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');

//create tag 
Route::get('/tag/create',[TagController::class,'create'])->name('tag.create');
Route::post('/tag/create', [TagController::class, 'store'])->name('tag.store');
//show tags
Route::get('/tag/list',[TagController::class,'index'])->name('tag.index');
//delete tag
Route::delete('/tag/{id}/delete',[TagController::class,'destroy'])->name('tag.delete');
