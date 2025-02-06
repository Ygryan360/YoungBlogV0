<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->paragraphs(5, true),
            'category_id' => \App\Models\Category::factory(),
            'user_id' => \App\Models\User::factory(),
            'slug' => $this->faker->unique()->slug(),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'cover' => $this->faker->imageUrl(),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
