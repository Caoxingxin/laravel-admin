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
Route::get('/ceshi', function () {
    return view('ceshi');
});

Route::get('/', function () {
    return view('welcome2');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//登录
Route::get('/login_user',function (){
    return view('welcome2');
});
//注册
Route::get('/create_user',function (){
    return view('re');
});

Route::group(['middleware' => 'auth'], function () {

    //总部
    Route::get('/head-school', 'Headquartes\HeadController@list')->name('headSchool.list');
    Route::get('/head-course', 'Headquartes\HeadCourseController@list')->name('headCourse.list');


    //学校
    Route::get('/school', 'School\SchoolController@list')->name('school.list');
    Route::get('/school/class', 'School\SchoolController@class_list')->name('school.class_list');


    //班级
    Route::get('/class', 'Classes\ClassController@list')->name('class.list');
});
//Route::get('/head','Headquartes\HeadController@list')->name('head.list');

