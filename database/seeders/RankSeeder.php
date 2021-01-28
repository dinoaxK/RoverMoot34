<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warrant_ranks')->truncate();
        $warrants = ['Phase One', 'Phase Two', 'Phase Three', 'Phase Four', 'Phase Five', 'Wood Badge', 'ALT', 'LT'];
        foreach( $warrants as $key => $warrant):
          DB::table('warrant_ranks')->insert(
          array(
            [
              'name'=>$warrant
            ]
          ));
        endforeach;
    }
}
