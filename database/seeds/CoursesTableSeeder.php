<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Course;
class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        $course = [
            'name'=>'Technical Aspects of Operating Systems',
            'description'=>'This course will provide students with an overview of the UNIX and Windows operating systems. Topics include setup, processes, file systems, log files, recovery, popular daemons/services, text manipulation utilities, network utilities, shells, and scripting. Brief overview',
            'crn_number'=>30332,
            'course_number'=>109,
            'instructor_id'=>1,
            'subject_id'=>1,
            'location_id'=>1,
            'program_id'=>1,
            'open'=>true,
            'max_enrollment'=>60,
            'currently_enrolled'=>20,
            'waitlisted'=>0,
            'start_date'=> date("Y-m-d H:i:s"),
            'end_date'=> date("Y-m-d H:i:s")
            ];
        $course_2 = [
            'name'=>'Computer Programming 1',
            'description'=>'This course is an introduction to the design, implementation, and understanding of computer programs. Topics include problem solving, modeling, algorithm design, and abstraction, with the emphasis on the development of working programs. This course should be followed by COSC 121. Students with credit for NTEN 112 cannot take COSC 111 for further credit.',
            'crn_number'=>30336,
            'course_number'=>111,
            'instructor_id'=>2,
            'subject_id'=>1,
            'program_id'=>1,
            'location_id'=>1,
            'open'=>true,
            'max_enrollment'=>60,
            'currently_enrolled'=>20,
            'waitlisted'=>0,
            'start_date'=> date("Y-m-d H:i:s"),
            'end_date'=> date("Y-m-d H:i:s")
            ];

        Course::create($course);
        Course::create($course_2);
    }

}