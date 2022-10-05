<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->sentence();
        return [
            'author_id' => fake()->numberBetween(1,5),
            'category_id' => fake()->numberBetween(1,5),
            'title' => $name,
            'slug' => Str::of($name)->slug('-'),
            'thumb' => 'https://spacenews.com/wp-content/uploads/2018/05/24359364107_152b0152ff_k-879x485.jpg',
            'description' => fake()->paragraph(),
            'content' => fake()->text(500),
            'status' => fake()->randomElement([0,1]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
