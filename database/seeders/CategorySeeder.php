<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Category::factory(5)->create();
        Category::create([
            [
                'id' => 1,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 2,
                'name' => 'Thời sự'
            ],
            [
                'id' => 3,
                'name' => 'Góc nhìn'
            ],
            [
                'id' => 4,
                'name' => 'Thế giới'
            ],
            [
                'id' => 5,
                'name' => 'Podcats'
            ],
            [
                'id' => 6,
                'name' => 'Kinh doanh'
            ],
            [
                'id' => 7,
                'name' => 'Khoa học'
            ],
            [
                'id' => 8,
                'name' => 'Giải trí'
            ],
            [
                'id' => 9,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 10,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 11,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 12,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 13,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 14,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 15,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 16,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 17,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 18,
                'name' => 'Mới nhất'
            ],
            [
                'id' => 19,
                'name' => 'Mới nhất'
            ],
        ]);
    }
}
