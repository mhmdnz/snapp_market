<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => "noshidani",
            ],
            [
                'id' => 2,
                'name' => "advie",
            ],
            [
                'id' => 3,
                'name' => "labaniat",
            ],
            [
                'id' => 4,
                'name' => "khoraki",
            ]
        ]);
    }
}
