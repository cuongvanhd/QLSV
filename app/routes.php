<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/**
 * Login Route
 */
// Route::post('/user/index',array('as' => 'user.check_login','uses' => 'UserController@check_login'));
// Route::get('/user/logout',array('as' => 'user.logout', 'uses' => 'UserController@destroy'));
// Route::get('/user',array('before'=>'auth','uses'=>'UserController@index'));
// 
// Route::resource('/user','UserController');

Route::get('/login', array('as' => 'auth.login', 'uses' => 'AuthenticateController@index'));
Route::get('/logout', array('as' => 'auth.logout', 'uses' => 'AuthenticateController@destroy'));
Route::resource('/auth', 'AuthenticateController');

/**
 * Authenticate group
 */
Route::group(array('before' => 'auth'),function(){
	
//Home route
Route::get('/',array('as' => 'home.index','uses' => 'AuthenticateController@home'));

//classes route
Route::post('/classes/classes_load_datatable','ClassesController@loadClassesDatatable');
Route::resource('/classes','ClassesController');


//student route
Route::post('/student/student_load_datatable','StudentController@loadStudentDatatable');
Route::delete('/student/del/{id}','StudentController@destroy_student');
Route::resource('/student','StudentController');


//subject route
Route::post('/subject/subject_load_datatable','SubjectController@loadSubjectDatatable');
Route::resource('/subject','SubjectController');

//point route
Route::post('/point/point_load_datatable','PointController@loadPointDatatable');
Route::resource('/point','PointController');

});
