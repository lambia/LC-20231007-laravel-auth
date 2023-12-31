<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [ "Cucina", "Motori", "Cronaca", "Sport", "Videogames", "Tecnologia" ];

        foreach($categories as $categoryName) {        
            $newCategory = new Category();
            // $newCategory->name = $faker->words(2, true);
            $newCategory->name = $categoryName;
            $newCategory->save();
        }

    }
}
