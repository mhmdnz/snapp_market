<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => "pofaknamaki",
                'price' => "10000",
                'category_id' => 4,
                'describe' => 'kheili khoshmazas',
                'stock' => 5
            ],
            [
                'name' => "bastani",
                'price' => "50000",
                'category_id' => 4,
                'describe' => 'kheili khoshmazas',
                'stock' => 3
            ],
            [
                'name' => "shir",
                'price' => "250000",
                'category_id' => 3,
                'describe' => '--',
                'stock' => 10
            ],
            [
                'name' => "mast",
                'price' => "550000",
                'category_id' => 3,
                'describe' => '--',
                'stock' => 11
            ],
            [
                'name' => "zardchobe",
                'price' => "150000",
                'category_id' => 2,
                'describe' => '---',
                'stock' => 45
            ],
            [
                'name' => "namak",
                'price' => "70000",
                'category_id' => 2,
                'describe' => '---',
                'stock' => 30
            ],
            [
                'name' => "jojo",
                'price' => "70000",
                'category_id' => 1,
                'describe' => '----',
                'stock' => 230
            ],
            [
                'name' => "zamzam",
                'price' => "3000",
                'category_id' => 1,
                'describe' => '----',
                'stock' => 20
            ],
        ]);
    }
}
