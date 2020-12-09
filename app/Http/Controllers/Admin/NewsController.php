<?php

namespace App\Http\Controllers\Admin;

use http\Env\Response;
use Session;
use App\models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\News;
use Storage;
use DB;


class NewsController extends Controller
{
    public function index()
    {



        return view('admin.news.index');


    }

    public function add(Request $request)
    {

        if ($request->method() == 'POST') {
//          dd($request->all());
//            $request->flash();
            $errors = [];
            $errors[] = 'Имя заголовка не может быть пустым';
            $request->session()->flash('errors1', $errors);
//           dump($request->all());
//           dd($request->hasFile('image'));

            $newsItem = $request->only([
                'category_id',
                'is_private',
                'title',
                'text'
            ]);


            if ($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $newsItem['image'] = Storage::url($path);
            }

            News::addNews($newsItem);


//            return redirect()->route('admin.news.add');
        }
//        $view=view('admin.news.add',['categories'=> Category::getCategories()])->render();
//        return response($view)
//            ->header('Content-Type', 'application/txt')
//            ->header('Content-Disposition', 'attachment; filename="add.html"');

        return view('admin.news.add', ['categories' => Category::getCategories()]);


    }


    public function homeAdmin()
    {

        return view('admin.index');
    }

    public function editAdmin()
    {

        //$news=DB::select("SELECT * FROM news");

        $news=News::getNews();


        return view('admin.news.edit', ['news' => $news]);
    }

    public function deliteNew($id)
    {

        News::deleteNews($id);

        return redirect()->route('admin.news.edit');

    }


}
