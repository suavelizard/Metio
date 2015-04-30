<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->references('id')->on('courses');
			$table->enum('type',['lecture','lab']);
			$table->enum('week_day',['sunday','monday','tuesday','wednesday','thursday','friday','saturday']);
			$table->time('start_time');
			$table->time('end_time');
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
		Schema::drop('lessons');
	}

}
