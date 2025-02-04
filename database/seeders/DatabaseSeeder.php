<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(25)->create();

        $posts->each(function ($post) use ($tags) {
            $post->tags()->sync($tags->random(rand(1, 3))->pluck('id')->toArray());
        });

    }
}
