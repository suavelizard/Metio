<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Course;
use App\Program;
//use Illuminate\Http\Request;
use App\Helpers\JsonErrorHelper;
use App\Helpers\DateUtilities;
use Request;
use Input;
class LessonsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons= Lesson::all();
		return response()->json($lessons);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$new_lesson = new Lesson;
		$new_lesson->type = intval(Request::input('type'));
		//Check for valid course
		$course = Course::find(intval(Request::input('course_number')));

		if(!$course){
			return JsonErrorHelper::error(400,'Invalid Course');
		}

		//Check if conflicts with course in group
		//Check if conflicts with program courses
		if(checkLessonConflicts($new_lesson, $course->program_id)){
			
		}
		//Check for general conflict
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
		//
	}

	public function getByCourseId($course_id){
		$course = Course::find($course_id);
		if(!$course){
			return JsonErrorHelper::error(400,'Invalid Course');
		}
		$lessons = $course->lessons;
		return response()->json($lessons,500);
	}

	public function isLessonConflictWithProgramLesson(Lesson $lesson, $program_id){
		$program = Program::find($program_id);
		$program_courses = $program->courses;
		//check not empty()
		foreach ($program_courses as $program_course) {
			foreach ($program_course->lessons as $program_lesson) {
				if($program_lesson->week_day === $lesson->week_day){
					return DateUtilities::checkTimeOverlap($lesson->start_time,$lesson->end_time);
				} else {
					return false;
				}
			}
		}
	}
}
