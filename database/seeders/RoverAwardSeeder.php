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
        $awards = ['Rover Ideals Badge', 'Membership','Invested Rover','Good Citizen Decoration','BP Award','Rover Instructor'];
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
