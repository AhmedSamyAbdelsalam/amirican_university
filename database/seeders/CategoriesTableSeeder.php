<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Honor Doctorate', 'status' => 1]);
        Category::create(['name' => 'DBA', 'status' => 1]);
        Category::create(['name' => 'Professional Doctorate Degree', 'status' => 1]);
        Category::create(['name' => 'MBA', 'status' => 1]);
        Category::create(['name' => 'Professional Master Degree', 'status' => 1]);
        Category::create(['name' => 'Professional Bachelor', 'status' => 1]);
        Category::create(['name' => 'Professional Diploma', 'status' => 1]);
        Category::create(['name' => 'Digital Library', 'status' => 1]);

    }
}
