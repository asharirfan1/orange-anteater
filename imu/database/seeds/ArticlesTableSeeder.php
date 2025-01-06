<?php

use Illuminate\Database\Seeder;
use Teplokvartal\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        factory(Article::class, 10)->create([
            'product_name' => 'chimneys',
        ]);

        factory(Article::class, 10)->create([
            'product_name' => 'briquettes',
        ]);

        factory(Article::class, 10)->create([
            'product_name' => 'boilers',
        ]);
    }
}
