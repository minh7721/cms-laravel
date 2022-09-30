<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'parent_id' => 0,
            'description' => fake()->sentence(),
            'content' => fake()->text(),
            'tag' => Str::of($name)->slug('-'),
            'active' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ];
    }
}
