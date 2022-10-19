<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            [
                'id' => 1,
                'name' => 'Mới nhất',
                'slug' => (string) Str::of('Mới nhất')->slug('-'),
                'description' => 'Mới nhất',
                'content' => "Mới nhất"
            ],
            [
                'id' => 2,
                'name' => 'Thời sự',
                'slug' => (string) Str::of('Thời sự')->slug('-'),
                'description' => 'Thời sự',
                'content' => "Thời sự"
            ],
            [
                'id' => 3,
                'name' => 'Góc nhìn',
                'slug' => (string) Str::of('Góc nhìn')->slug('-'),
                'description' => 'Góc nhìn',
                'content' => "Góc nhìn"
            ],
            [
                'id' => 4,
                'name' => 'Thế giới',
                'slug' => (string) Str::of('Thế giới')->slug('-'),
                'description' => 'Thế giới',
                'content' => "Thế giới"
            ],
            [
                'id' => 5,
                'name' => 'Podcats',
                'slug' => (string) Str::of('Podcats')->slug('-'),
                'description' => 'Podcats',
                'content' => "Podcats"
            ],
            [
                'id' => 6,
                'name' => 'Kinh doanh',
                'slug' => (string) Str::of('Kinh doanh')->slug('-'),
                'description' => 'Kinh doanh',
                'content' => "Kinh doanh"
            ],
            [
                'id' => 7,
                'name' => 'Khoa học',
                'slug' => (string) Str::of('Khoa học')->slug('-'),
                'description' => 'Khoa học',
                'content' => "Khoa học"
            ],
            [
                'id' => 8,
                'name' => 'Giải trí',
                'slug' => (string) Str::of('Giải trí')->slug('-'),
                'description' => 'Giải trí',
                'content' => "Giải trí"
            ],
            [
                'id' => 9,
                'name' => 'Thể thao',
                'slug' => (string) Str::of('Thể thao')->slug('-'),
                'description' => 'Thể thao',
                'content' => "Thể thao"
            ],
            [
                'id' => 10,
                'name' => 'Pháp luật',
                'slug' => (string) Str::of('Pháp luật')->slug('-'),
                'description' => 'Pháp luật',
                'content' => "Pháp luật"
            ],
            [
                'id' => 11,
                'name' => 'Giáo dục',
                'slug' => (string) Str::of('Giáo dục')->slug('-'),
                'description' => 'Giáo dục',
                'content' => "Giáo dục"
            ],
            [
                'id' => 12,
                'name' => 'Sức khỏe',
                'slug' => (string) Str::of('Sức khỏe')->slug('-'),
                'description' => 'Sức khỏe',
                'content' => "Sức khỏe"
            ],
            [
                'id' => 13,
                'name' => 'Đời sống',
                'slug' => (string) Str::of('Đời sống')->slug('-'),
                'description' => 'Đời sống',
                'content' => "Đời sống"
            ],
            [
                'id' => 14,
                'name' => 'Du lịch',
                'slug' => (string) Str::of('Du lịch')->slug('-'),
                'description' => 'Du lịch',
                'content' => "Du lịch"
            ],
            [
                'id' => 15,
                'name' => 'Số hóa',
                'slug' => (string) Str::of('Số hóa')->slug('-'),
                'description' => 'Số hóa',
                'content' => "Số hóa"
            ],
            [
                'id' => 16,
                'name' => 'Xe',
                'slug' => (string) Str::of('Xe')->slug('-'),
                'description' => 'Xe',
                'content' => "Xe"
            ],
            [
                'id' => 17,
                'name' => 'Ý kiến',
                'slug' => (string) Str::of('Ý kiến')->slug('-'),
                'description' => 'Ý kiến',
                'content' => "Ý kiến"
            ],
            [
                'id' => 18,
                'name' => 'Tâm sự',
                'slug' => (string) Str::of('Tâm sự')->slug('-'),
                'description' => 'Tâm sự',
                'content' => "Tâm sự"
            ],
            [
                'id' => 19,
                'name' => 'Hài',
                'slug' => (string) Str::of('Hài')->slug('-'),
                'description' => 'Hài',
                'content' => "Hài"
            ],
        ]);
    }
}
