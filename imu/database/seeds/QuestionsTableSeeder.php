<?php

use Illuminate\Database\Seeder;
use Teplokvartal\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        factory(Question::class, 50)->create();
    }
}
