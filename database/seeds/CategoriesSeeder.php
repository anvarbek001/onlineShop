<?php

use App\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'electronics'],
            ['title' => 'home appliances'],
            ['title' => 'accessories'],
            ['title' => 'sport'],
            ['title' => 'education'],
        ];

        DB::table('categories')->insert($categories);
    }
}
