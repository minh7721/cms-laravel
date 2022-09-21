<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'id' => 1,
            'name' => 'Ảnh slider 1',
            'url' => 'https://pin.it/1GIaWUj',
            'thumb' => '/storage/uploads/2022/09/15/City.gif',
            'sort_by' => 1,
            'active' => 1
        ]);
    }
}
