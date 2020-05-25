<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'title' => $faker->sentence(rand(3, 15)),
                'text' => $faker->realText(rand(100, 300)),
                'published' => (boolean)rand(0, 1)
            ];
        }

        return $data;
    }
}
