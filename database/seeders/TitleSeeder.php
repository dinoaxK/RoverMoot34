<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('titles')->truncate();
        $titles = ["Rev", "Dr", "Master", "Mr", "Miss", "Mrs"];
        foreach( $titles as $key => $title):
          DB::table('titles')->insert(
          array(
            [
              'name'=>$title
            ]
          ));
        endforeach;
    }
}
