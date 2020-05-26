<?php

use Illuminate\Database\Seeder;

class AggregatorNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = \Faker\Factory::create('ru_Ru');
        $data = [];
        for($i = 0; $i < 60; $i++){
            $data[] = [
                'name' => $faker->sentence(mt_rand(7, 10)),
                'detail' => $faker->realText(mt_rand(700, 1400)),
                'briefly' => $faker->realText(mt_rand(180, 300)),
                'published' => (boolean)mt_rand(0, 1),
                'category_id' => $faker->numberBetween(1, 5),
                'source_id' => $faker->numberBetween(1, 10)
            ];
        }

        return $data;
    }
}
