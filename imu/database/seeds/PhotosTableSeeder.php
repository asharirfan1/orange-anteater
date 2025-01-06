<?php

use Illuminate\Database\Seeder;
use Teplokvartal\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::truncate();

        factory(Photo::class, 10)->create([
            'product_name' => 'chimneys',
        ]);

        factory(Photo::class, 10)->create([
            'product_name' => 'briquettes',
        ]);

        factory(Photo::class, 10)->create([
            'product_name' => 'boilers',
        ]);
    }
}
