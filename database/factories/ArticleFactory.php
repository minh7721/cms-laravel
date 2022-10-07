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
            'thumb' => fake()->randomElement(['https://i.pinimg.com/564x/a9/b9/6e/a9b96ea5bc4af3db0a33ffc6fd88a318.jpg',
                'https://i.pinimg.com/236x/0b/47/bf/0b47bfc9502e6dc208bf8ab1d56ae70b.jpg',
                'https://i.pinimg.com/236x/a0/29/b4/a029b4d320f917f6545f4dd510c04600.jpg',
                'https://i.pinimg.com/236x/55/c1/61/55c1613c87358f5c918a7f4cd63e18f7.jpg',
                'https://i.pinimg.com/236x/06/41/42/064142edc77c6ebaa0c8eb3a1905f81a.jpg',
                'https://i.pinimg.com/236x/33/41/9c/33419c49bb37bdec4b0d6d630ac03350.jpg',
                'https://i.pinimg.com/236x/4c/9f/e1/4c9fe180884de3294808499f732a68b9.jpg',
                'https://i.pinimg.com/236x/7b/5f/79/7b5f79a7e88560bb863c6bc8bcfb7146.jpg',
                'https://i.pinimg.com/236x/7c/ea/bc/7ceabcbf66388248f5013ca3224efcd0.jpg',
                'https://i.pinimg.com/236x/f7/7c/0d/f77c0d4242ae6a81b0efffd46b092862.jpg',
                'https://i.pinimg.com/236x/d2/24/6c/d2246c268babe4993c5d3d6d03dce21b.jpg'
                ]),
            'description' => fake()->paragraph(),
            'content' => fake()->text(500),
            'status' => fake()->randomElement([0,1]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
