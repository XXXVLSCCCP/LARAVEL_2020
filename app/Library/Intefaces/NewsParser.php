<?php


namespace App\Library;


use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    public static function parse($link)
    {

        $parser = XmlParser::load($link);

        $data = $parser->parse([
            'news' => ['uses' => 'channel.item[title,link,description,enclosure::url,category]'],
            'category' => ['uses' => 'channel.title'],
        ]);

        $categoryName = '';
        foreach ($data['news'] as $item)
        {
            $categoryName = !empty($data['category']) ? $data['category'] : '';
            $categoryName = !empty($item['category']) ? $item['category'] : $categoryName;



            $category = Category::query()
                ->where('slug', Str::slug($categoryName))
                ->where('title',$categoryName)
                ->first();

            if(empty($category)) {
                $category = Category::create([
                    'slug' => Str::slug($categoryName),
                    'title' => $categoryName,
                ]);
            }

            $news = News::query()
                ->where('link', $item['link'])
                ->first();

            if(empty($news))  {
                News::create([
                    'image' => empty($item['enclosure::url']) ? '' : $item['enclosure::url'],
                    'category_id' => $category->id,
                    'is_private' => false,
                    'title' => $item['title'],
                    'spoiler' => $item['description'],
                    'text' => $item['link'],
                    'link' => $item['link'],
                ]);
            }

        }

        //dump('Распарсили cсылку: ' . $link);

    }
}
