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
        $awards = [
          'Membership',
          'Scout Masters Award',
          'District Commissioners Award',
          'Chief Commissioners Challenge Award',
          'Bushmans Thong',
          'President Scout Award'
        ];
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
