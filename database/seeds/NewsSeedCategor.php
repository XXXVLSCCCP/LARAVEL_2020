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
        \DB::table('category')->insert([

            ['id'=>'1',
                'slug'=>'sport',
                'title'=>'Новость о спотре',
                'text'=>'Лучшая новость о спотре',
            ],
            ['id'=>'2',
                'slug'=>'programming',
                'title'=>'Новость о программировании',
                'text'=>'Лучшая новость о программирвоании',

            ],
            ['id'=>'3',
                'slug'=>'games',
                'title'=>'Новость о компьютерных играх',
                'text'=>'Лучшая новость компьютерной игре',
            ],

            ['id'=>'4',
                'slug'=>'city',
                'title'=>'Новость города',
                'text'=>'Лучшая новость города',
            ],

        ]);

    }


}

