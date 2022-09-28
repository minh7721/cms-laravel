<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'review_post'],
            ['name' => 'update_post'],
            ['name' => 'delete_post'],
            ['name' => 'restore_post'],
            ['name' => 'force_delete_post'],
        ]);
    }
}
