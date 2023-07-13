<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all(["id"]);
        $tags = Tag::all(["id"]);

        for ($i=0; $i < 10; $i++) { 
            $post = new Post();
            $post->title = $faker->words(3, true);
            $post->content = $faker->text(500);
            $post->image = $faker->imageUrl(800, 600, 'animals', true);
            // $post->category_id = rand(1,4); <--- è hardcoded, no bueno
            // $post->category_id = rand(1, count($categories) );
            $post->category_id = $categories->random()->id;

            $post->save();
            
            //Collego i tags
            $numeroTags = rand(0,5);
            $postTags = [];
            for($j = 0; $j < $numeroTags; $j++) {
                $postTags[] = $tags->random()->id;
            }

            $post->tags()->attach( array_unique($postTags) );
        }

    }
}
