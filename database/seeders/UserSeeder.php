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
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'remember_token' => Str::random(10),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => Str::random(10),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'email_verified_at' => now(),
            ],

            ]);

        User::factory(10)->create();
    }
}
