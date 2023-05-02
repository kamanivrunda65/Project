<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Books'],
            ['category_name' => 'Clothing'],
            ['category_name' => 'HomeDecor'],
            ['category_name' => 'Sports'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
