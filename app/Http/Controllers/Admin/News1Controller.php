<?php

namespace App\Http\Controllers\Admin;

use http\Env\Response;
use Session;
use App\Models\Category1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News1;
use App\Models\News;
use App\Models\Category;

use Storage;
use DB;


class News1Controller extends Controller
{
    public function index()
    {


        return view('admin.news.index');

    }

    public function add(News $news, Request $request)
    {

        if ($request->method() == 'POST') {
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

//            return redirect()->route('admin.news.add');
//        $array['id'] = self::getLastId() + 1;

            if (empty($newsItem['is_private'])) {
                $newsItem['is_private'] = false;
            } else {
                $newsItem['is_private'] = true;
            }

            if (!isset($array['image'])) {
                $newsItem['image'] = "";
            }
            if ($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $newsItem['image'] = Storage::url($path);
            }

//            DB::table('news')->insert([
//                'category_id'=>$newsItem['category_id'],
//                'image'=>$newsItem['image'],
//                'is_private'=>$newsItem['is_private'],
//                'title'=>$newsItem['title'],
//                'text'=>$newsItem['text'],
//            ]);

            News::create($newsItem);

            return redirect()->route('admin.news.add');
        }
//        $view=view('admin.news.add',['categories'=> Category1::getCategories()])->render();
//        return response($view)
//            ->header('Content-Type', 'application/txt')
//            ->header('Content-Disposition', 'attachment; filename="add.html"');


            return view('admin.news.add1', ['categories' => Category::all()]);

    }

    public function edit_add( News $news, Request $request){

//        $news= News::find($id);


        if ($request->method() == 'POST') {
            $request->flash();
            $newsItem = $request->only([
                'category_id',
                'is_private',
                'title',
                'text'
            ]);

            if (!empty($request['is_private'])) {
                $newsItem['is_private'] = 0;
            } else {
                $newsItem['is_private'] = 1;
            }

                $newsItem['category_id'] = +($newsItem['category_id']);

                $newsItem['image'] = "";

            if ($request->hasFile('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $newsItem['image'] = Storage::url($path);
            }

//            $news->title= $newsItem->input('title');
//            $news->text= $newsItem->input('text');
//            $news->image= $newsItem->input('image');
//            $news->is_private= $newsItem->input('is_private');
//            $news->category_id= $newsItem->input('category_id');
//
//            $news->save();
//
           // dd($newsItem);


           $news->fill($newsItem);

            $news->save();

            return redirect()->route('admin.news.edit_add', $news)->with(['news'=>$news]);
        }
        ;
        return view('admin.news.add', [
            'categories' => Category::all(),
            'news'=>$news
        ]);
    }

    public function homeAdmin()
    {

        return view('admin.index');
    }

    public function editAdmin()
    {
        //$news=DB::select("SELECT * FROM news");

        //$news = News1::getNews();
        $news=News::paginate(1);
        return view('admin.news.edit', ['news' => $news]);
    }

    public function deliteNew($id)
    {

        News1::deleteNews($id);

        return redirect()->route('admin.news.edit');
    }
}
