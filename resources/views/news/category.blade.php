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


                    @foreach ($news as $newsCtegory)
                    <div class="card-body">
                        <h3>{{$newsCtegory['title']}}</h3>

                        <p>{{$newsCtegory['text']}}</p>
                    </div>
                    @endforeach

            </div>
        </div>
    </div>
</div>


@endsection


