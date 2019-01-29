<?php

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

Route::get('/', 'SessionsController@index');

Route::get('home', function(){
    return view('home');
});

Route::post('/login','SessionsController@create');

Route::get('/logout', 'SessionsController@destroy');

Route::resource('/students', 'StudentsController');
Route::post('/students/find/lrn/', 'StudentsController@findLRN');
Route::post('/students/find/id/', 'StudentsController@findID');


Route::group(['middleware'=>['role:admin']], function() {
    Route::resource('/users', 'UsersController');
    Route::post('/users/add-role', 'UsersController@addRole');
    Route::post('/users/remove-role', 'UsersController@removeRole');
    Route::post('/users/{user}/change-password', 'UsersController@changePassword');
    Route::post('/users/{user}/set-active', 'UsersController@setActive');

    Route::resource('/rooms', 'RoomController');

    Route::resource('/depts', 'DepartmentController');

    Route::resource('/periods', 'PeriodController');
    Route::post('/periods/status/{period}', 'PeriodController@changeStatus');

    Route::resource('/levels', 'LevelController');
});

Route::resource('/teachers', 'TeacherController');
Route::post('/teachers/{teacher}/set-active', 'TeacherController@setActive');

Route::get('/roles', 'RoleController@index');
Route::post('/roles', 'RoleController@store');
Route::post('/roles/destroy', 'RoleController@destroy');

Route::resource('/programs', 'ProgramController');

Route::resource('/courses', 'CourseController');

Route::resource('/classes', 'ClassController');

Route::post('/schedules', 'ScheduleController@store');
Route::delete('/schedules', 'ScheduleController@destroy');
