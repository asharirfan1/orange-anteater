<?php

use Illuminate\Database\Seeder;
use Teplokvartal\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Admin::truncate();
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        $this->call(ChimneysTableSeeder::class);
        $this->call(BriquettesTableSeeder::class);
        $this->call(BoilersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
