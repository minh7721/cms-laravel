<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use Database\Factories\RoleUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('role_user')->insert([
           [
               'role_id' => fake()->randomElement([1,2,3]),
               'user_id' => fake()->numberBetween(1, 10)
           ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
             [
                 'role_id' => fake()->randomElement([1,2,3]),
                 'user_id' => fake()->numberBetween(1, 10)
             ],
        ]);
    }
}
