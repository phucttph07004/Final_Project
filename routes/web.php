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
    return view('welcome');
});

// Route::get('/', function () {return redirect()->route('home.index');});
// login và logout

// Route::get('login', 'frontend\AuthController@getLoginForm');
// Route::post('login', 'frontend\AuthController@login')->name('auth.login');
// Route::get('logout', 'frontend\AuthController@logout')->name('auth.logout');


// các chức năng của admin
Route::group(['middleware' => ['check_role_admin',],], function () {

Route::resource('/admin','backend\IndexController');
Route::resource('/notifications','backend\NotificationController');
Route::resource('/student','backend\StudentController');
});

