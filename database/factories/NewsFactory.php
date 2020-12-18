<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(News::class, function (Faker $faker) {
    return [
        'category_id' => '1',
        'image' => '',
        'is_private' =>rand(0,1),
        'title' => $faker->sentence(rand(3,10)),
        'text' => $faker->text(rand(100,3000)),
    ];
});

$factory->state(News::class, 'withPrivateFalseState', [
    'is_private'  => 0,
]);

$factory->state(News::class, 'withCategory', [
    'category_id' => function () {
        return factory(Category::class)->create();
    }
]);
