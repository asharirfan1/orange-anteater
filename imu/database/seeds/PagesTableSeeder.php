<?php

use Illuminate\Database\Seeder;
use Teplokvartal\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        factory(Page::class, 4)->create();
    }
}
