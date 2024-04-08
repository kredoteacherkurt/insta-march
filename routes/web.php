<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Auth::routes();

Route::group(["middleware"=>"auth"],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    #post
    Route::get('/create',[PostController::class, 'create'])->name('post.create');
    Route::post('/post/store',[PostController::class, 'store'])->name('post.store');
    Route::get('/post/show/{id}',[PostController::class, 'show'])->name('post.show');

});

