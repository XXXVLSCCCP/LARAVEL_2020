<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\News1;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        //$news = News1::getNews();

        $news = News::paginate(3);

        return view('news.index', ['title' => 'Cписок новостей', 'news' => $news,]);

    }

    public function show($id)
    {
       $news = News1::getNewsById($id);

//       $news = News::find($id);
//        dd($id);

        return view('news.show', ['title' => 'Cписок новостей', 'news' => $news,]);

    }

    public function comments($id, $comment)
    {
        return view('news.show');

    }

    public function category($category_id)
    {
//       dd($category_id);

//        $news = News1::getNewsByCategoryId($category_id);

        $news =News::query()->where('category_id', $category_id)->get();

//        dd($news);

        return view('news.categoryslug', ['news' => $news]);

    }

    public function categorySlug($slug)
    {



        $news=News::query()->with('category')
            ->whereHas('category', function ($query) use ($slug){
                $query->where('slug', $slug);
            })->paginate(2);

        ;



//        $news=News::query()->with('category')->take()->get();

//        $title=Category::query()->where('slug',$slug)->get();
//
//        foreach (Category::all() as $category){
//            if($category['slug'] == $slug){
//                $news=News::find($category['id']);
//                    return view('news.categoryslug', ['news' => $news, 'title'=>$title]);
//
//            }
//        }
//        return null;


        return view('news.categoryslug', ['news' => $news]);


    }


}
