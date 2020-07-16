<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/about', function () {
    return view('frontend/about');
});
Route::get('/news', function () {
    return view('frontend/news');
});
Route::get('/news-detail', function () {
    return view('frontend/news-detail');
});
Route::get('/contact', function () {
    return view('frontend/contact');
});
Route::get('/login', function () {
    return view('frontend/login');
});
Route::get('/register', function () {
    return view('frontend/register');
});


// các chức năng của admin
Route::group(['middleware' => ['check_role_admin',],], function () {

Route::resource('/admin','backend\IndexController');

});
