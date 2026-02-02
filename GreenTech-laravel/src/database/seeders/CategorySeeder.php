<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use SebastianBergmann\FileIterator\Factory;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Category::factory()->create();

        $categories = ['Plantes','Graines','Outils'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
        // DB::table('categories')->insert([
        // ['name' => 'Plantes'],
        // ['name' => 'Graines'],
        // ['name' => 'Outils']]);

        // foreach ($categories as $name) {
        //     $category = new Category();
        //     $category->name = $name;
        //     $category->save();
        // }
    }
}
