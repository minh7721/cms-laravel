<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'id' => '2',
            'name' => 'Làm giàu từ chứng khoán',
            'description' => 'Sách chứng khoán',
            'content' => '<p>S&aacute;ch chứng kho&aacute;n</p>',
            'thumb' => '/storage/uploads/2022/09/14/Screenshot from 2022-09-09 10-29-18.png	',
            'menu_id' => 17,
            'price' => 250000,
            'price_sale' => 200000,
            'active' => 1,
        ]);
    }
}
