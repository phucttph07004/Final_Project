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
Route::resource('/course', 'backend\CourseController');
Route::resource('/class','backend\ClassController');
Route::resource('/class-detail','backend\ClassDetailController');
Route::get('/search', 'SearchController@action')->name('search.action');
Route::get('/changeStatus' , 'ChangeStatusController@changeStatus');
Route::get('/student/create/excel','backend\ExcelController@student_create_excel');
Route::POST('/student/store/excel','backend\ExcelController@student_store_excel');
});

// Auth Admin

Route::group([
    'prefix' => 'admin',
],
 function()
 {
    Route::get('login', 'backend\AuthController@getLoginForm');
    Route::post('login', 'backend\AuthController@login')->name('auth.login');
    Route::get('logout','backend\AuthController@logout')->name('auth.logout');
    Route::get('forgot-password', 'backend\ResetPasswordController@getform')->name('get.forgotpassword');
    Route::post('forgot-password', 'backend\ResetPasswordController@sendCode')->name('post.forgotpassword');
    Route::get('reset-password', 'backend\ResetPasswordController@resetform')->name('get.resetpassword');
    Route::post('reset-password', 'backend\ResetPasswordController@changePassword')->name('post.resetpassword');

});


//Student 


Route::group([
    'prefix' => 'student',
],
 function()
 {
    Route::get('login', 'student\AuthController@getLoginForm');
    Route::post('login', 'student\AuthController@login')->name('student.login');
    Route::get('logout','student\AuthController@logout')->name('student.logout');
    Route::get('forgot-password', 'student\ResetPasswordController@getform')->name('get.studentforgotpassword');
    Route::post('forgot-password', 'student\ResetPasswordController@sendCode')->name('post.studentforgotpassword');
    Route::get('reset-password', 'student\ResetPasswordController@resetform')->name('get.studentresetpassword');
    Route::post('reset-password', 'student\ResetPasswordController@changePassword')->name('post.studentresetpassword');
});


Route::group([
    'prefix'=> 'student',
    'middleware' => ['check_student'],
],
function()
{
    Route::get('/', 'student\IndexController@index');
    Route::resource('notification','student\NotificationController');
});