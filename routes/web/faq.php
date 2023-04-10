<?php

use App\Http\Controllers\Backend\FaqController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/faq')->controller(FaqController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('faq.index');
        Route::get('/create', 'create')->name('faq.create');
        Route::post('/store', 'store')->name('faq.store');
        Route::get('/edit/{faq}', 'edit')->name('faq.edit');
        Route::get('/show/{faq}', 'show')->name('faq.show');
        Route::post('/update/{faq}', 'update')->name('faq.update');
        Route::post('/destroy/{faq}', 'destroy')->name('faq.destroy');
        Route::get('/status/{faq}', 'status')->name('faq.status');
    });
