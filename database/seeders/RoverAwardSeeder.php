<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoverAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rover_awards')->truncate();
        $awards = [
          'Recruit', 
          'Rover Square', 
          'Invested Rover',
          'One Rover Star Completed', 
          'Two Rover Stars Completed',  
          'Three Rover Stars Completed',  
          'Four Rover Stars Completed',  
          'BP Award',
          'Rover Instructor'
        ];
        foreach( $awards as $key => $award):
          DB::table('rover_awards')->insert(
          array(
            [
              'name'=>$award
            ]
          ));
        endforeach;
    }
}
