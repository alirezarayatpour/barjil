<?php

use App\Http\Controllers\Backend\AskController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/ask')->controller(AskController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('ask.index');
//        Route::get('/create', 'create')->name('ask.create');
        Route::post('/store', 'store')->name('ask.store');
//        Route::get('/edit/{ask}', 'edit')->name('ask.edit');
        Route::get('/show/{ask}', 'show')->name('ask.show');
//        Route::post('/update/{ask}', 'update')->name('ask.update');
//        Route::post('/destroy/{ask}', 'destroy')->name('ask.destroy');
//        Route::get('/status/{ask}', 'status')->name('ask.status');
    });
