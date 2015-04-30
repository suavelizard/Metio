<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Instructor;
class InstructorsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('instructors')->delete();

        $instructor = [
            'first_name' => 'Alan',
            'last_name' =>'Kennedy',
            'title'=>2
            ];

        $instructor_2 = [
            'first_name' => 'Rick',
            'last_name' =>'gee',
            'title'=>2
            ];

        Instructor::create($instructor);
        Instructor::create($instructor_2);
    }

}