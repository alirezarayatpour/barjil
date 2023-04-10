<?php

use App\Http\Controllers\Backend\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/banner')->controller(BannerController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('banner.index');
        Route::get('/create', 'create')->name('banner.create');
        Route::post('/store', 'store')->name('banner.store');
        Route::get('/edit/{banner}', 'edit')->name('banner.edit');
        Route::get('/show/{banner}', 'show')->name('banner.show');
        Route::post('/update/{banner}', 'update')->name('banner.update');
        Route::post('/destroy/{banner}', 'destroy')->name('banner.destroy');
        Route::get('/status/{banner}', 'status')->name('banner.status');
    });
