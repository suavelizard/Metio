<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Subject;
class SubjectsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('subjects')->delete();

        $subject = [
        	'title'=>'Computer Science',
        	'abbreviation'=>'COSC'
        	];

        Subject::create($subject);
    }

}