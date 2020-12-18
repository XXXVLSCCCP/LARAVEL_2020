<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $news=News::orderByDesc('id')->paginate(2);


        return view('admin.news.index',['news'=>$news]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add',['categories'=>Category::all(),'news'=>News::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(News::rules());


        $news=News::create( $request->all());

        if($request->hasFile('image')){

            $path= \Storage::putFile('public', $request->file('image'));

            $news->image=\Storage::url($path);
            $news->save();


        }

        return redirect()->back()->with('success', 'Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {


        return view('admin.news.show',['news'=>$news]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news){

        return view('admin.news.edit',['news'=>$news,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {

        $request->validate(News::rules());

        $news->update($request->all());

        if($request->hasFile('image')){

        $path= Storage::putFile('public', $request->file('image'));

        $news->image=Storage::url($path);

        $news->save();


    }

        return redirect()->back()->with('success', 'Новость успешно добавлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {

        $news->delete();



        return redirect()->back()->with('error','Новость удалена');


    }
}
