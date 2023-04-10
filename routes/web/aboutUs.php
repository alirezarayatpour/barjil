<?php

use App\Http\Controllers\Backend\AboutUsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/aboutUs')->controller(AboutUsController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('aboutUs.index');
        Route::get('/create', 'create')->name('aboutUs.create');
        Route::post('/store', 'store')->name('aboutUs.store');
        Route::get('/edit/{aboutUs}', 'edit')->name('aboutUs.edit');
        Route::get('/show/{aboutUs}', 'show')->name('aboutUs.show');
        Route::post('/update/{aboutUs}', 'update')->name('aboutUs.update');
        Route::post('/destroy/{aboutUs}', 'destroy')->name('aboutUs.destroy');
        Route::get('/status/{aboutUs}', 'status')->name('aboutUs.status');
    });
