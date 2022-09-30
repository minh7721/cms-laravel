<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->words(3, true);
        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'description' => fake()->sentence,
            'content' => fake()->paragraph(30),
            'menu_id' => fake()->numberBetween(1, 4),
            'tag_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 5),
            'thumb' => fake()->imageUrl($width = 640, $height = 480, true, 'dogs', true),
            'active' => fake()->randomElement([0, 1]),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }
}
