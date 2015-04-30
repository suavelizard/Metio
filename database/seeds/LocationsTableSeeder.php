<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Location;
class LocationsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();



        $location = [
        	'name'=>'Kelowna'
        	];

        Location::create($location);
    }

}