<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('home');
Route::get('/project', 'IndexController@project')->name('project');


Route::group(['prefix' => '/news', 'as' => 'news.'], function () {


    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/{category_id}', 'NewsController@category')->where('category_id', '[0-9]+')->name('by_id');
        Route::get('/{slug}', 'NewsController@categorySlug')->name('by_slug');
        Route::get('/', 'CategoriesController@index')->name('by_index');

    });
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/{id}', 'NewsController@show')->name('show');
    Route::get('/{id}/comments/{comment}', 'News1Controller@add')->name('comment');

});
//Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
//    Route::get('/', 'News1Controller@homeAdmin')->name('home');
//    Route::group(['prefix' => '/news', 'as' => 'news.'], function () {
//        Route::match(['get', 'post'], '/', 'News1Controller@index')->name('index');
//        Route::match(['get', 'post'], '/add', 'News1Controller@add')->name('add');
//        Route::match(['get', 'post'], '/edit_add/{news}', 'News1Controller@edit_add')->name('edit_add');
//        Route::get('/edit', 'News1Controller@editAdmin')->name('edit');
//        Route::get('/delete/{id}', 'News1Controller@deliteNew')->name('delete');
//
//    });
//});



Route::group(['prefix'=>'/admin','namespace'=>'Admin', 'as'=>'admin.','middleware'=> ['auth','role:admin']], function(){

    Route::get('/', 'IndexAdminController@index')->name('index');
   Route::resource('news', 'NewsController');
    Route::resource('users', 'UserController');



    //    Route::resource('users','UserController');
//    Route::get('/news','NewsController@index')->name('index');
//    Route::get('/news/create','NewsController@create')->name('create');
//    Route::post('/news','NewsController@store')->name('store');
//    Route::get('/news/{news}','NewsController@show')->name('show');
//    Route::get('/news/{news}/edit','NewsController@edit')->name('edit')->middleware('newsvalidat');
//    Route::DELETE('/news/{news}','NewsController@destroy')->name('destroy');
//    Route::patch('/news/{news}','NewsController@update')->name('update');

    Route::get('/parser', 'ParserController@index')->name('parser.index');
});


Route::get('/project', function () {
    return view('project');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('storage/{filename}', function ($filename) {
//    $path = storage_path('app/public/' . $filename);
//
//
//    if (!File::exists($path)) {
//
//        abort(404);
//    }
//
//    $file = File::get($path);
//    $type = File::mimeType($path);
//    $response = Response::make($file, 200);
//    $response->header('Content-Type', $type);
//
//
//    return $response;
//});


//Auth::routes(['register' => false]);
///auth/Facebook

Route::get('/auth/vk', 'Auth\LoginController@authVk');
Route::get('/auth/vk/response', 'Auth\LoginController@responseVk');

Route::get('/auth/Facebook', 'Auth\LoginController@authFacebook');
Route::get('/auth/Facebook/response', 'Auth\LoginController@responseFacebook');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth','role:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


