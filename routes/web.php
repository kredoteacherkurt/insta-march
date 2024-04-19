<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;





Auth::routes();

Route::group(["middleware"=>"auth"],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    #post
    Route::get('/create',[PostController::class, 'create'])->name('post.create');
    Route::post('/post/store',[PostController::class, 'store'])->name('post.store');
    Route::get('/post/show/{id}',[PostController::class, 'show'])->name('post.show');
    Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{id}',[PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{post}',[PostController::class, 'destroy'])->name('post.delete');


    #comments
    Route::post('/comments/{id}',[CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/delete/{comment}',[PostController::class, 'destroy'])->name('comment.delete');

    #profile
    Route::get('/profile/show/{id}',[ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{id}',[ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/{id}',[ProfileController::class, 'update'])->name('profile.update');

    #like
    Route::post('/like/store',[LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/destroy/{post_id}',[LikeController::class, 'destroy'])->name('like.destroy');

    #follow
    Route::post('/follow/store/{id}',[FollowController::class, 'store'])->name('follow.store');
    Route::delete('/follow/delete/{id}',[FollowController::class, 'destroy'])->name('follow.delete');



});

