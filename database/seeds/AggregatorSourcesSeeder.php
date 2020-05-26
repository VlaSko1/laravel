<?php

use Illuminate\Database\Seeder;

class AggregatorSourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = \Faker\Factory::create('en_Us');
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'source' => $faker->domainName
            ];
        }

        return $data;
    }
}
