<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TagSeeder::class,
            SliderSeeder::class,
            RoleSeeder::class,
//            CategorySeeder::class,
//            ArticleSeeder::class,
//            ArticleTagSeeder::class
        ]);
//        DB::table('permission_role')->insert([
//            ['permission_id' => 1, 'role_id' => 1],
//            ['permission_id' => 2, 'role_id' => 1],
//            ['permission_id' => 3, 'role_id' => 1],
//            ['permission_id' => 4, 'role_id' => 1],
//            ['permission_id' => 5, 'role_id' => 1],
//        ]);
    }
}
