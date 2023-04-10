<?php

use App\Http\Controllers\Backend\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/organization')->controller(OrganizationController::class)
    ->middleware('CheckAdmin')
    ->group(function(){
        Route::get('/', 'index')->name('organization.index');
//        Route::get('/create', 'create')->name('organization.create');
        Route::post('/store', 'store')->name('organization.store');
//        Route::get('/edit/{organization}', 'edit')->name('organization.edit');
//        Route::get('/show/{organization}', 'show')->name('organization.show');
//        Route::post('/update/{organization}', 'update')->name('organization.update');
//        Route::post('/destroy/{organization}', 'destroy')->name('organization.destroy');
//        Route::get('/status/{organization}', 'status')->name('organization.status');
    });
