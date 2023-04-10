<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/', function() {
    return view('admin/auth/login');
});


Route::get('/login', function() {
    return view('auth/login');
});


Auth::routes();


require_once 'web/client.php';
require_once 'web/index.php';
require_once 'web/logo.php';
require_once 'web/product.php';
require_once 'web/category.php';
require_once 'web/banner.php';
require_once 'web/footerColumns.php';
require_once 'web/footerItem.php';
require_once 'web/footerText.php';
require_once 'web/contact.php';
require_once 'web/job.php';
require_once "web/blog.php";
require_once "web/user.php";
require_once "web/faq.php";
require_once "web/aboutUs.php";
require_once "web/term.php";
require_once "web/social.php";
require_once "web/organization.php";
require_once "web/ask.php";
require_once "web/comment.php";
require_once "web/order.php";
