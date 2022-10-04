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
        User::firstOrCreate([
            'email' => 'admin@admin.com',
            'name' => 'Administrator',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        User::factory(100)->create();
    }
}
