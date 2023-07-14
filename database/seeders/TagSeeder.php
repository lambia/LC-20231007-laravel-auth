<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        for ($i=0; $i < 12; $i++) { 
            $tag = new Tag();
            $tag->name = "#" . $faker->word();
            $tag->save();
        }
    }
}
