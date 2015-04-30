<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('keywords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('keyword');
			$table->timestamps();
		});

		Schema::create('keywordables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('keyword_id');
			$table->integer('keywordable_id');
			$table->String('keywordable_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('keywords');
		Schema::drop('keywordables');
	}

}
