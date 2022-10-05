<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'name' => (string) $name,
            'slug' => (string) Str::of($name)->slug('-'),
            'description' => fake()->sentence(),
            'content' => fake()->text(),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ];
    }
}
