<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "mhmd",
                'password' => bcrypt('123456'),
                'email' => "mhmd@snappmarket.com"
            ]
        ]);
    }
}
