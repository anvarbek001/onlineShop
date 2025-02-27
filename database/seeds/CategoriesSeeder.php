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
            [
                'uz' => 'elektronikalar',
                'title' => 'electronics',
                'ru' => 'электроника',
            ],
            [
                'uz' => 'maishiy texnikalar',
                'title' => 'home appliances',
                'ru' => 'бытовая техника',
            ],
            [
                'uz' => 'akksessuarlar',
                'title' => 'accessories',
                'ru' => 'аксессуары',
            ],
            [
                'uz' => 'sport',
                'title' => 'sport',
                'ru' => 'спорт',
            ],
            [
                'uz' => "ta'lim",
                'title' => 'education',
                'ru' => 'образование',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
