<?php

namespace Database\Factories;

use App\Libs\StringUtils;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->word();
        return [
            'name' => $name,
            'slug' => Str::of($name)->slug('-'),
            'length' => StringUtils::wordsCount($name)
        ];
    }
}
