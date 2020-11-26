<?php


namespace App\models;


class News
{
    const news = [
        ['id' => '1',
            'category_id' => '1',
            'title' => 'Первая новость',
            'text' => 'Лучшая первая новость',
        ],
        ['id' => '2',
            'category_id' => '1',
            'title' => 'Вторая новость',
            'text' => 'Лучшая вторая новость',

        ],
        ['id' => '3',
            'category_id' => '2',
            'title' => 'Третья новость',
            'text' => 'Лучшая третья новость',
        ],

        ['id' => '4',
            'category_id' => '2',
            'title' => 'Четвертая новость',
            'text' => 'Лучшая четвертая новость',
        ],
    ];

    public static function getNews()
    {

        return self::news;
    }

    public static function getNewsByCategoryId($category_id)
    {

        $news = [];

        foreach (self::getNews() as $category) {
            if ($category['category_id'] == $category_id) {

                $news[] = $category;


            }

        }

        return $news;
    }

    public static function getNewsByCategorySlug($slug)
    {
        $news = [];


        $category = Category::getCategoryBySlug($slug);

        if (!empty($category['id'])) {
            $news = self::getNewsByCategoryId($category['id']);

        }

        return $news;


    }
}
