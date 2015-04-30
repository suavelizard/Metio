<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Location;
use App\Program;
use App\Subject;
use App\Instructor;
use Input;
//use Illuminate\Http\Request;
use App\Helpers\JsonErrorHelper;

class CoursesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses = Course::all();
		$courses->load('Location');
		$courses->load('Subject');
		$courses->load('Instructor');
		return response()->json($courses);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$subject = Subject::find(intval(Request::input('subject_id')));
		$location = Location::find(intval(Request::input('location_id')));
		$instructor = Instructor::find(intval(Request::input('instructor_id')));
		if(!$subject){
			return JsonErrorHelper::error(400,'Invalid Subject');
		} else if(!$location){
			return JsonErrorHelper::error(400,'Invalid Location');

		} else if(!$instructor){
			return JsonErrorHelper::error(400,'Invalid Instructor');

		}
		$course = new Course;
		$course->name = Request::input('name');
		$course->description = Request::input('description');
		$course->crn_number = intval(Request::input('crn_number'));
		$course->course_number = intval(Request::input('course_number'));
		$course->instructor_id = intval(Request::input('instructor_id'));
		$course->location_id = intval(Request::input('location_id'));
		$course->subject_id = intval(Request::input('subject_id'));
		$course->open = Request::input('open');
		$course->max_enrollment = intval(Request::input('max_enrollment'));
		$course->currently_enrolled = intval(Request::input('currently_enrolled'));
		$course->waitlisted = intval(Request::input('waitlised'));
		$course->start_date = Request::input('start_date');
		$course->end_date = Request::input('end_date');


		if($course->save()){
			return response()->json($course,500);
		}

		// 		$new_course = [
		// 	'name' => Request::input('name'),
		// 	'description' => Request::input('description'),
		// 	'crn_number' => intval(Request::input('crn_number')),
		// 	'course_number' => intval(Request::input('course_number')),
		// 	'instructor_id' => intval(Request::input('instructor_id')),
		// 	'location_id' => intval(Request::input('location_id')),
		// 	'subject_id' => intval(Request::input('subject_id')),
		// 	'open' => Request::input('open'),
		// 	'max_enrollment' => intval(Request::input('max_enrollment')),
		// 	'currently_enrolled' => intval(Request::input('currently_enrolled')),
		// 	'waitlisted' => intval(Request::input('waitlised')),
		// 	'start_date' => Request::input('start_date'),
		// 	'end_date' => Request::input('end_date')
		// ];
		// $course = Course::create($new_course);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(!$id){
			return JsonErrorHelper::error(400,'No ID');
		}

		$course = Course::find($id);
		
		if(!$course){
			return JsonErrorHelper::error(400,'No Course With ID');
		}
		return response()->json($course,500);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showFull($id)
	{
		if(!$id){
			return JsonErrorHelper::error(400,'No ID');
		}

		$course = Course::find($id);
		$course->load('Instructor');
		$course->load('Location');
		$course->load('Program');
		$course->load('Subject');

		
		if(!$course){
			return JsonErrorHelper::error(400,'No Course With ID');
		}
		return response()->json($course,500);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(!$id){
			return JsonErrorHelper::error(400,'No Course With ID');
		}
	}

}
