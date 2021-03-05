<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            'National HQ',
            'Akkaraipaththu-Kalmunai',
            'Ampara',
            'Anuradhapura',
            'Avissawella',
            'Badulla',
            'Batticaloa',
            'Chillaw',
            'Colombo',
            'Galle',
            'Gampaha',
            'Hambanthota',
            'Homagama',
            'Jaffna',
            'Kaluthara',
            'Kandy',
            'KDU',
            'Kankasanthurai',
            'Kegalle',
            'Kilinochchi',
            'Kurunegala',
            'Mannar',
            'Matale',
            'Matara',
            'Monaragala',
            'Moratuwa-Piliyandala',
            'Mulativu',
            'Nawalapitiya',
            'Negambo',
            'Nuwaraeliya',
            'Panadura',
            'Point-Pedro',
            'Polonnaruwa',
            'Puttalam',
            'Rathnapura',
            'Trincomalee',
            'Vavuniya',
            'Wattala-Jaela',
            'Wennappuwa',
            'Foreign'
        ];
        
        DB::table('scout_districts')->truncate();
        foreach( $districts as $key => $district):
            DB::table('scout_districts')->insert(
            array(
                [
                'name'=>$district
                ]
            ));
        endforeach;
    }
}
