<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use DateTime;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'MinhHN',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'role_id' => 1,
            'password' => '$2y$10$kYAkQoqtOjAlCTMip7J9VeCPjfddOK4PJsz1nShHGlTJGntcwJoNO',
            'remember_token' => Str::random(10),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        User::factory(100)->create();
    }
}
