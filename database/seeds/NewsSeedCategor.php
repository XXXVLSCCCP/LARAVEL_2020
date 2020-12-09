<?php

use Illuminate\Database\Seeder;

class NewsSeedCategor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category')->insert($this->getData());

    }

    private function getData(){

        $faker=Faker\Factory::create('ru_RU');
        $data = [];


        for ($i = 0; $i < 10; $i++) {

//            'slug'=>'sport',
//           'title'=>'Новость о спотре',
//           'text'=>'Лучшая новость о спотре',

            $data[] =
                [
                    'slug' => '1',
                    'title' => $faker->sentence(rand(3,10)),
                    'text' => $faker->text(rand(100,3000)),
                ];


        }

        return $data;
    }
}

