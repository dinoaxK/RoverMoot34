<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('warrant_sections')->truncate();
        $warrants = ['Singithi Scout Master', 'Cub Scout Master', 'Scout Master', 'Rover Scout Master', 'Group Scout Master', 'District Scout Master', 'Assistant District Commissioner', 'District Commissioner', 'National Head Quater Commissioner', 'Assistant Cheif Commissioner', 'Cheif Commissioner'];
        foreach( $warrants as $key => $warrant):
          DB::table('warrant_sections')->insert(
          array(
            [
              'name'=>$warrant
            ]
          ));
        endforeach;
    }
}
