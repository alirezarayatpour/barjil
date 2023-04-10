<?php

use App\Http\Controllers\Backend\JobController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/job')->controller(JobController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('job.index');
        Route::get('/create', 'create')->name('job.create');
        Route::post('/store', 'store')->name('job.store');
        Route::get('/edit/{job}', 'edit')->name('job.edit');
        Route::get('/show/{job}', 'show')->name('job.show');
        Route::post('/update/{job}', 'update')->name('job.update');
        Route::post('/destroy/{job}', 'destroy')->name('job.destroy');
        Route::get('/status/{job}', 'status')->name('job.status');
    });
