<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('crn_number');
			$table->integer('course_number');
			$table->integer('instructor_id')->unsigned()->references('id')->on('instructors');
			$table->integer('subject_id')->unsigned()->references('id')->on('subjects');
			$table->integer('location_id')->unsigned()->references('id')->on('locations');			
			$table->integer('program_id')->unsigned()->references('id')->on('programs');
			$table->boolean('open');
			$table->integer('max_enrollment');
			$table->integer('currently_enrolled');
			$table->integer('waitlisted');
			$table->date('start_date');
			$table->date('end_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
