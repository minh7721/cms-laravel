<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'id' => '17',
            'name' => 'Sách chứng khoán',
            'parent_id' => 0,
            'description' => 'Sách chứng khoán',
            'content' => '<p>S&aacute;ch chứng kho&aacute;n</p>',
            'active' => 1,
        ]);
    }
}
