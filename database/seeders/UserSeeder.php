<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert(
            array(
                ['name'=> 'Dinusha Kulasooriya',
                'email'=>"dinushakulasooriya@gmail.com",
                'password'=>'$2y$10$chLDig2zqSahPLNRnur.0O3xzyvjlzH54Jwsp.gblzj3Ltp.dfxkG',
                'role'=> 'super_admin',
                'email_verified_at'=> '2021-01-24 17:37:43',
                'created_at'=> '2020-11-23 10:13:53',
                'updated_at'=> '2020-11-23 10:13:53'],

                ['name'=> 'Janith Pathirana',
                'email'=>"avishka.janith@gmail.com",
                'password'=>'$2y$10$chLDig2zqSahPLNRnur.0O3xzyvjlzH54Jwsp.gblzj3Ltp.dfxkG',
                'role'=> 'admin',
                'email_verified_at'=> '2021-01-24 17:37:43',
                'created_at'=> '2020-11-23 10:13:53',
                'updated_at'=> '2020-11-23 10:13:53'],

                ['name'=> 'Gimhani Rajapaksha',
                'email'=>"gimhaniarajapaksha@gmail.com",
                'password'=>'$2y$10$chLDig2zqSahPLNRnur.0O3xzyvjlzH54Jwsp.gblzj3Ltp.dfxkG',
                'role'=> 'scout',
                'email_verified_at'=> '2021-01-24 17:37:43',
                'created_at'=> '2020-11-23 10:13:53',
                'updated_at'=> '2020-11-23 10:13:53'],
            )
        );
    }
}
