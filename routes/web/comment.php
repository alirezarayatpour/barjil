<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/comment')->controller(CommentController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('comment.index');
        Route::get('/show/{comment}', 'show')->name('comment.show');
        Route::post('/destroy/{comment}', 'destroy')->name('comment.destroy');
        Route::get('/status/{comment}', 'status')->name('comment.status');
    });

