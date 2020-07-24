<?php

use Illuminate\Support\Facades\Route;

use App\Models\News;
use App\Models\User;

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
Route::get('/',     'frontend\HomeController@index')->name('home.index');
Route::get('/news', 'frontend\NewsController@index')->name('news');



// các chức năng của admin
Route::group(['middleware' => ['check_role_admin',],], function () {

Route::resource('/admin','backend\IndexController');

});
