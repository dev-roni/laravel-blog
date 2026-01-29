<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [ 
            'category_name' => 'Travel & Adventure',
            'category_description' => 'Explore the world with our travel guides.',
            'category_slug' => 'travel-adventure',
            'category_img' => 'images/category/travel.jpg',
            ],
            [ 
            'category_name' => 'science',
            'category_description' => 'Explore the world with our travel guides.',
            'category_slug' => 'travel-adventure',
            'category_img' => 'images/category/travel.jpg',
            ],
            [ 
            'category_name' => 'Education',
            'category_description' => 'Explore the world with our travel guides.',
            'category_slug' => 'travel-adventure',
            'category_img' => 'images/category/travel.jpg',
            ],
            [ 
            'category_name' => 'lifestyle',
            'category_description' => 'Explore the world with our travel guides.',
            'category_slug' => 'travel-adventure',
            'category_img' => 'images/category/travel.jpg',
        ]
    ]);
    }
}
