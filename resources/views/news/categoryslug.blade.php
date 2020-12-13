@extends('layouts.app')
@section('title')

    @parent -Новости первой категории

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Главная</div>

{{--                    @dd($news->first()->category->title);--}}

                    <h4>{{$news->first()->category->title}}</h4>

                    @foreach ($news as $newsCtegory)
                        <figure class="figure">
                            <img src="{{$newsCtegory->image ? $newsCtegory->image : 'http://placehold.it/100x100'}}"
                                 style="float: left; padding: 10px; margin: 0; width: 100px"
                                 class="figure-img img-fluid rounded" alt="Фото">
                            <figcaption style="text-overflow: clip; overflow: hidden; height: 160px"
                                        class="figure-caption">{{$newsCtegory->text}}
                            </figcaption>


                        </figure>
                        <a style="float: right" href="/news/{{$newsCtegory->id}}">Подробнее.....</a>

                        <hr>

                    @endforeach


                    {{$news->links()}}

                </div>
            </div>
        </div>
    </div>


@endsection


