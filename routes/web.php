<?php

use Illuminate\Support\Facades\Route;

use App\Models\News;
use App\Models\User;
use App\Models\Register;

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
Route::get('/',             'frontend\HomeController@index')->name('home.index');
Route::get('/news',         'frontend\NewsController@index')->name('news.index');
Route::get('/news/{id}',    'frontend\NewsController@getNews')->name('news.news-detail');
Route::get('enroll',        'frontend\EnrollController@create');
Route::post('enroll',       'frontend\EnrollController@store')->name('enroll');

// Route::get('/', function () {return redirect()->route('home.index');});
// login và logout

// Route::get('login', 'frontend\AuthController@getLoginForm');
// Route::post('login', 'frontend\AuthController@login')->name('auth.login');
// Route::get('logout', 'frontend\AuthController@logout')->name('auth.logout');


// các chức năng của admin
Route::group([ 'prefix' => 'admin',
               'middleware' => ['check_role_admin',],
], function () {


Route::resource('/register', 'backend\RegisterController');
    
Route::resource('/news', 'backend\NewsController');
     

Route::resource('/','backend\IndexController');
Route::resource('/notifications','backend\NotificationController');
Route::resource('/student','backend\StudentController');
});
Route::get('/login', 'backend\AuthController@getLoginForm');

