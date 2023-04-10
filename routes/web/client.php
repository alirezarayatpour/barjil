<?php

use App\Http\Controllers\Frontend\ClientController;
use Illuminate\Support\Facades\Route;
use Trez\RayganSms\Facades\RayganSms;

Route::prefix('/')->controller(ClientController::class)
    ->group(function(){
        Route::get('/', 'index')->name('pages.index');
        Route::get('/product/{product}', 'product')->name('pages.product');
        Route::get('/all-products', 'allProducts')->name('pages.all-products');
        Route::get('/product-category/{category}', 'ProductCategory')->name('pages.product-category');
        Route::get('/jobs', 'jobs')->name('pages.jobs');
        Route::get('/blogs', 'blogs')->name('pages.blogs');
        Route::get('/blog/{blog}', 'blog')->name('pages.blog');
        Route::get('/about-us', 'aboutUs')->name('pages.about-us');
        Route::get('/faq', 'faq')->name('pages.faq');
        Route::get('/terms-and-conditions', 'termsAndConditions')->name('pages.terms-and-conditions');
        Route::get('/contact-us', 'contactUs')->name('pages.contact-us');
        Route::get('/search', 'search')->name('pages.search');

        Route::get('/my-account', 'myAccount')->name('pages.my-account');
        Route::get('/my-account/edit-account', 'edit_account')->name('pages.edit-account');
        Route::get('/my-account/my-orders', 'my_orders')->name('pages.my-orders');

        Route::post('/add-to-cart/{product}', 'add_to_cart')->name('add-to-cart');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::post('/cart-plus/{cart}', 'cart_plus')->name('cart-plus');
        Route::post('/cart-minus/{cart}', 'cart_minus')->name('cart-minus');
        Route::post('/cart-remove/{cart}', 'cart_remove')->name('cart-remove');

        Route::post('/change/{user}', 'change')->name('change');

        Route::post('/comment/{product}', 'comment')->name('comment');
        Route::post('/reply', 'reply')->name('reply');

        Route::post('/order', 'order')->name('order');


        // Route::get('/login', 'login')->name('login');
    });
