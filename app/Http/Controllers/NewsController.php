<?php

namespace App\Http\Controllers;

use App\models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $news=News::getNews();


        return view('News.index',['news' => $news,]);

}
    public function show($id){
        return view('News.show');

    }
    public function comments($id, $comment){
        return view('News.show');

    }
    public function category($category_id){

        $news = News::getNewsByCategoryId($category_id);

        return view('News.category',['news'=>$news]);

    }

    public function categorySlug($slug){

        $news = News::getNewsByCategorySlug($slug);





       return view('News.category',['news'=>$news]);

    }


}
