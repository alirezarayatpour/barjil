<?php

use App\Http\Controllers\Backend\FooterColumnsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/footerColumns')->controller(FooterColumnsController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('footerColumns.index');
        Route::get('/create', 'create')->name('footerColumns.create');
        Route::post('/store', 'store')->name('footerColumns.store');
        Route::get('/edit/{footerColumns}', 'edit')->name('footerColumns.edit');
        Route::get('/show/{footerColumns}', 'show')->name('footerColumns.show');
        Route::post('/update/{footerColumns}', 'update')->name('footerColumns.update');
        Route::post('/destroy/{footerColumns}', 'destroy')->name('footerColumns.destroy');
        Route::get('/status/{footerColumns}', 'status')->name('footerColumns.status');
    });
