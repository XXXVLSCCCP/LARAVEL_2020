@extends('admin.layouts.app')

@section('content');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(empty($news)) Добавить @else Редактировать @endif новость</div>

                <div class="card-body">

                    {{--                    @if(session()->has('errors1'))--}}
                    {{--                        @foreach(session()->get('errors1') as $error)--}}
                    {{--                            <div class="alert alert-danger">--}}
                    {{--                                {{$error}}--}}
                    {{--                            </div>--}}

                    {{--                        @endforeach--}}
                    {{--                    @endif--}}

                    <form method="POST" action="{{ route ('admin.update', $news) }}" enctype='multipart/form-data'>

                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <input class="form-control @error('title') is-invalid  @enderror"  type="text" placeholder="Заголовок" name="title"
                                   value="{{old('title') ?? $news->title}}">
                        </div>
                        @foreach($errors->get('title') as $error)

                            <div class="text-danger">
                                {{$error}}

                            </div>

                        @endforeach
                        <div class="form-group">
                            <select class="form-control" name="category_id" id="">


                                @if(!empty($errors))

                                    <div class="alert alert-danger"></div>

                                @endif

                                @foreach($categories as $category)

                                    <option value="{{$category['id']}}"
                                            @if(old('category_id')==$category['id'] || $news->category_id == $category['id'] ) selected @endif>{{$category['title']}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text">{{old('text') ?? $news->text}}</textarea>
                        </div>
                        @foreach($errors->get('text') as $error)

                            <div class="text-danger">
                                {{$error}}

                            </div>

                        @endforeach

                        {{--                        <div class="form-check">--}}
                        {{--                            <input type="checkbox" class="form-check-input" id="is_private" name="is_private">--}}
                        {{--                            <label class="form-check-label" for="exampleCheck1">Приватная</label>--}}
                        {{--                        </div>--}}

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="is_private_fals" name="is_private"
                                   value="0"
                                   @if(old('is_private', $news->is_private)==0)checked @endif>
                            <label class="form-check-label" for="exampleCheck1">Публичная</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="is_private_true" name="is_private"
                                   value="1"
                                   @if(old('is_private', $news->is_private)==1) checked @endif>
                            <label class="form-check-label" for="exampleCheck1">Приватная</label>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="file" name="image" value="Картинка">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

