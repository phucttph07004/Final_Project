<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             'frontend\HomeController@index')->name('home.index');
Route::get('/news',         'frontend\NewsController@index')->name('news.index');
Route::get('/news/{id}',    'frontend\NewsController@getNews')->name('news.news-detail');
Route::get('register',        'frontend\RegisterController@create');
Route::post('register',       'frontend\RegisterController@store')->name('register');

// Route::get('/', function () {return redirect()->route('home.index');});
// login và logout


// các chức năng của admin
Route::group([ 'prefix' => 'admin',
               'middleware' => ['check_role_admin','check_auth'],
], function () {

Route::resource('/','backend\IndexController');

Route::resource('/setting', 'backend\SettingController');
Route::resource('/register', 'backend\RegisterController');
// Route::post('/register', 'backend\RegisterController@confirm')->name('register.confirm');
Route::resource('/news', 'backend\NewsController');
Route::resource('/notifications','backend\NotificationController');
Route::resource('/student','backend\StudentController');
Route::resource('/account','backend\AccountController');

});

// Auth Admin

Route::group([
    'prefix' => 'admin',
], function(){
    Route::get('login', 'backend\AuthController@getLoginForm');
    Route::post('login', 'backend\AuthController@login')->name('auth.login');
    Route::get('logout','backend\AuthController@logout')->name('auth.logout');
});