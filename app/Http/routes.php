<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::group(['prefix' => 'api'], function(){
	//courses
	Route::resource('courses', 'CoursesController',array('only' => array('index', 'show','destroy','update','store')));
	Route::get('courses/{course}/instructor', array('as'=>'course.instructor', 'uses'=>'InstructorsController@getByCourseId'));
	Route::get('courses/{course}/full', array('as'=>'course.full', 'uses'=>'CoursesController@showFull'));
	Route::get('courses/{course}/lessons',array('as'=>'course.lessons','uses'=>'LessonsController@getByCourseId'));
	Route::get('courses/{course}/locations',array('as'=>'course.locations','uses'=>'LocationsController@getByCourseId'));

	//locations (campuses)
	Route::resource('locations', 'LocationsController');

	//programs
	Route::resource('programs', 'ProgramsController');

	//Instructors
	Route::resource('instructors', 'InstructorsController');

	//Subjects
	Route::resource('subjects', 'SubjectsController');

	//Lessons
	Route::resource('lessons', 'LessonsController');

});