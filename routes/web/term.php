<?php

use App\Http\Controllers\Backend\TermController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/term')->controller(TermController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('term.index');
        Route::get('/create', 'create')->name('term.create');
        Route::post('/store', 'store')->name('term.store');
        Route::get('/edit/{term}', 'edit')->name('term.edit');
        Route::get('/show/{term}', 'show')->name('term.show');
        Route::post('/update/{term}', 'update')->name('term.update');
        Route::post('/destroy/{term}', 'destroy')->name('term.destroy');
        Route::get('/status/{term}', 'status')->name('term.status');
    });
