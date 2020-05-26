<?php

use Illuminate\Database\Seeder;

class AggregatorCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 5; $i++){
            $data[] = [
                'category' => $faker->word()
            ];
        }

        return $data;
    }
}
