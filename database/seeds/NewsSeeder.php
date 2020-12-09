<?php

use Illuminate\Database\Seeder;



class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());

    }

    private function getData(){
            $faker= Faker\Factory::create('ru_RU');

        $data = [];


        for ($i = 0; $i < 10; $i++) {

            $data[] =
                [
                    'category_id' => '1',
                    'image' => '',
                    'is_private' => true,
                    'title' => $faker->sentence(rand(3,10)),
                    'text' => $faker->text(rand(100,3000)),
                ];


        }

        return $data;
    }
}
