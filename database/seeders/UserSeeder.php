<?php

namespace Database\Seeders;

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
            'name' => 'MinhAdmin',
            'email' => 'nhatminh7721@gmail.com',
            'password' => '$2y$10$kYAkQoqtOjAlCTMip7J9VeCPjfddOK4PJsz1nShHGlTJGntcwJoNO',
        ]);
    }
}
