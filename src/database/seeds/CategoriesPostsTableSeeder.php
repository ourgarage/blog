<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Ourgarage\Blog\Models\Category;
use Ourgarage\Blog\Models\Post;

class CategoriesPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $category = Category::create([
                'status' => Category::STATUS_ACTIVE,
                'title' => $faker->word,
                'slug' => $faker->word,
                'meta_keywords' => $faker->sentence,
                'meta_description' => $faker->sentence,
                'meta_title' => $faker->sentence
            ]);

            foreach (range(1, 50) as $post) {
                Post::create([
                    'category_id' => $category->id,
                    'status' => Post::STATUS_ACTIVE,
                    'title' => $faker->sentence,
                    'slug' => $faker->word,
                    'content' => $faker->text,
                    'meta_keywords' => $faker->sentence,
                    'meta_description' => $faker->sentence,
                    'meta_title' => $faker->sentence,
                    'published_at' => $faker->dateTimeThisYear($max = 'now')
                ]);
            }
        }
    }
}