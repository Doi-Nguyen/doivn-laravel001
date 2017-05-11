<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'address' => str_random(20),
            'slogan' => str_random(50),
            'password' =>bcrypt('123456')
            ],

        ];

        DB::table('users')->insert($arr);
    }
}
