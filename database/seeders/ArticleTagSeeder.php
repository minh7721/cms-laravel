<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tag')->insert([
            [   'article_id' => 9,
                'tag_id' => 1
            ],
            [   'article_id' => 8,
                'tag_id' => 2
            ],
            [   'article_id' => 7,
                'tag_id' => 3
            ],
            [   'article_id' => 6,
                'tag_id' => 4
            ],
            [   'article_id' => 5,
                'tag_id' => 5
            ],
            [   'article_id' => 4,
                'tag_id' => 6
            ],
            [   'article_id' => 4,
                'tag_id' => 7
            ],
            [   'article_id' => 3,
                'tag_id' => 8
            ],
            [   'article_id' => 2,
                'tag_id' => 9
            ],
            [   'article_id' => 1,
                'tag_id' => 10
            ],
        ]);

        for ($i = 10; $i <= 100 ; $i ++){
            DB::table('article_tag')->insert([
                'article_id' => $i,
                    'tag_id' => fake()->numberBetween(1,10)
                ]);
      }
    }
}
