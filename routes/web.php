<?php

use App\Http\Constants\SchoolStatus;
use App\Http\Model\School;
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
    Route::post('/head-school/update-status', 'Headquartes\HeadController@update_status')->name('headSchool.update_status');
    Route::post('/head-school/update', 'Headquartes\HeadController@update')->name('headSchool.update');
    Route::get('/head-school/detail', 'Headquartes\HeadController@detail')->name('headSchool.detail');
    Route::get('/head-school/create-list','Headquartes\HeadController@create_list')->name('headSchool.create-list');
    Route::get('/head-school/create','Headquartes\HeadController@create')->name('headSchool.create');

    Route::get('/head-course', 'Headquartes\HeadCourseController@list')->name('headCourse.list');


    //学校
    Route::get('/school', 'School\SchoolController@list')->name('school.list');
    Route::get('/school/class', 'School\SchoolController@class_list')->name('school.class_list');


    //班级
    Route::get('/class', 'Classes\ClassController@list')->name('class.list');
});
//Route::get('/head','Headquartes\HeadController@list')->name('head.list');

