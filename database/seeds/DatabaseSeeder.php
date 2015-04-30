<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeds\CoursesTableSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('InstructorsTableSeeder');
		$this->call('LocationsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('CoursesTableSeeder');
		$this->call('LessonsTableSeeder');
		$this->call('ProgramsTableSeeder');
	}

}
