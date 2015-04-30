<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Lesson;
class LessonsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lessons')->delete();



        $lesson1 = [
        	'course_id'=>1,
        	'type'=>1,
        	'week_day'=>2,
        	'start_time'=>date('g:i a', time()),
        	'end_time'=>date('g:i a', time())
        	];
        $lesson2 = [
        	'course_id'=>1,
        	'type'=>1,
        	'week_day'=>4,
        	'start_time'=>date('g:i a', time()),
        	'end_time'=>date('g:i a', time())
        	];
        $lesson3 = [
        	'course_id'=>1,
        	'type'=>2,
        	'week_day'=>5,
        	'start_time'=>date('g:i a', time()),
        	'end_time'=>date('g:i a', time())
        	];

        Lesson::create($lesson1);
        Lesson::create($lesson2);
        Lesson::create($lesson3);
    }

}