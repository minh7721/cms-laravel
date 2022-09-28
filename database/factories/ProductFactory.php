<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'thumb' => 'https://cdn3.ivivu.com/2018/01/ve-dep-sai-gon-qua-ong-kinh-cua-nguoi-me-anh-ivivu-2.jpg',
            'price' => '250000',
            'price_sale' => '200000',
            'active' => fake()->randomElement([0, 1]),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }
}
