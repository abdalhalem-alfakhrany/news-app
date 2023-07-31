<?php

namespace Database\Seeders;

use App\Models\Category\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [

            ///////
            [
                'image' => 'wctKjahmFBGRX2PK3Ffxu9EooogAqFtcXefLNcbT.png',
                'ar' => [
                    'title' => 'الطعام',
                ],
                'fr' => [
                    'title' => 'Des nourriture',
                ],
            ],

            ///////
            [
                'image' => '5gLmg5Z52syj5McaGBTzNpkMfs44bW4dtrx38SKU.png',
                'ar' => [
                    'title' => 'الصحه',
                ],
                'fr' => [
                    'title' => 'Des santé',
                ],
            ],

            ///////
            [
                'image' => 'K7Qqek92S4TNNfJoHylBkEaAteBZY1slcNpFaPXw.png',
                'ar' => [
                    'title' => 'السياسه',
                ],
                'fr' => [
                    'title' => 'Des politique',
                ],
            ],

            ////////
            [
                'image' => 'pUsJznuOpqyFBnYzto5mnSWHyJdlfXyGQxInu8XS.png',
                'ar' => [
                    'title' => 'رياضه',
                ],
                'fr' => [
                    'title' => 'Des sports',
                ],
            ],

            ///////
            [
                'image' => 'j0xMTNyJJ68flTdtsCQdiFxlOR4HFEf0FqactykO.png',
                'ar' => [
                    'title' => 'أفلام',
                ],
                'fr' => [
                    'title' => 'De films',
                ],
            ],

        ];

        foreach ($categories as $category) {
            Category::createWithTranslaions(
                $category['image'],
                $category['ar'],
                $category['fr']
            );
            // $newCategory->advertisements()->sync([rand(1, 10), rand(1, 10), rand(1, 10)]);
        }
    }
}
