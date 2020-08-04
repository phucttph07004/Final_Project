<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             'frontend\HomeController@index')->name('home.index');
Route::get('/news',         'frontend\NewsController@index')->name('news.index');
Route::get('/news/{id}',    'frontend\NewsController@getNews')->name('news.news-detail');
Route::get('register',        'frontend\RegisterController@create');
// Route::get('thankyou', 'frontend\RegisterController@thankyou')->name('register.thankyou');
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
Route::POST('/notification/store/default','backend\ExcelController@student_store_default');
Route::resource('/student','backend\StudentController');
Route::resource('/account','backend\AccountController');
Route::resource('/branch','backend\BranchController');
Route::resource('/level','backend\LevelController');
Route::resource('/user','backend\UserController');
Route::resource('/category','backend\CategoryController');
Route::get('/student/create/excel','backend\ExcelController@student_create_excel');
Route::POST('/student/store/excel','backend\ExcelController@student_store_excel');
});
// Route::group([ 'prefix' => 'admin',
//                'middleware' => ['check_role_admin',],
// ], function () {







    // Route::resource('/','backend\IndexController');
    // Route::resource('/register', 'backend\RegisterController');
    // Route::resource('/news', 'backend\NewsController');
    // Route::get('/login', 'backend\AuthController@getLoginForm');
// });

// Auth Admin

Route::group([
    'prefix' => 'admin',
], function(){
    Route::get('login', 'backend\AuthController@getLoginForm');
    Route::post('login', 'backend\AuthController@login')->name('auth.login');
    Route::get('logout','backend\AuthController@logout')->name('auth.logout');
});
