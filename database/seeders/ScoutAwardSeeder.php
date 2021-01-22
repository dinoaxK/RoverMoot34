<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoutAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('scout_awards')->truncate();
        $awards = ['Membership','Bronze Star','Silver Star','Gold Star','Scout Award/ Scout Master Award','District Commissioner Cord','Chief Commissioner Award','President Scout Award'];
        foreach( $awards as $key => $award):
          DB::table('scout_awards')->insert(
          array(
            [
              'name'=>$award
            ]
          ));
        endforeach;
    }
}
