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
        foreach (range(1, 5) as $index) {
            $category = Category::create([
                'status' => Category::STATUS_ACTIVE,
                'title' => $faker->unique()->word,
                'slug' => $faker->slug,
                'meta_keywords' => $faker->sentence,
                'meta_description' => $faker->sentence,
                'meta_title' => $faker->sentence
            ]);

            $category_id[] = $category->id;
        }

        foreach (range(1, 30) as $post) {
            Post::create([
                'category_id' => $faker->randomElement($category_id),
                'views' => 0,
                'status' => $faker->randomElement([Post::STATUS_DISABLED, Post::STATUS_ACTIVE]),
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'content' => $faker->text,
                'meta_keywords' => $faker->sentence,
                'meta_description' => $faker->sentence,
                'meta_title' => $faker->sentence,
                'published_at' => $faker->dateTimeThisYear($max = 'now')
            ]);
        }

    }
}
