<?php

use App\Http\Controllers\Backend\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/order')->controller(OrderController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('order.index');
        Route::get('/history', 'history')->name('order.history');
     //    Route::get('/create', 'create')->name('order.create');
     //    Route::post('/store', 'store')->name('order.store');
     //    Route::get('/edit/{order}', 'edit')->name('order.edit');
        Route::get('/show/{order}', 'show')->name('order.show');
        Route::post('/update/{order}', 'update')->name('order.update');
     //    Route::post('/destroy/{order}', 'destroy')->name('order.destroy');
     //    Route::get('/status/{order}', 'status')->name('order.status');
    });
