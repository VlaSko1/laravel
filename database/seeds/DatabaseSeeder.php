<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesSeeder::class);
        $this->call(AggregatorCategoriesSeeder::class);
        $this->call(AggregatorSourcesSeeder::class);
        $this->call(AggregatorNewsSeeder::class);
    }
}
