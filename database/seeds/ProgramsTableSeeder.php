<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Program;
class ProgramsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('programs')->delete();
        $program = [
            'name'=>'Bachelor of Computer Information Systems',
            'description'=>'The Bachelor of Computer Information Systems (BCIS) is an eight-semester, 40-course, degree program, designed to provide you with in-depth information necessary to use computing within an organization or business. While you will need to attend the Kelowna campus for much of the program, it is possible to complete the first year outside Kelowna. The first two years of the degree are identical to those of the Computer Information Systems (CIS) diploma when you take the program in Kelowna. In Vernon, Penticton, and Salmon Arm you will take alternative, equally acceptable, courses. The final two years give the student the opportunity to look at selected topics in more detail.'
            ];


        Program::create($program);
    }

}