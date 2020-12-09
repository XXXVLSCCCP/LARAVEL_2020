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
    Route::get('/{id}/comments/{comment}', 'NewsController@add')->name('comment');

});
Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', 'NewsController@homeAdmin')->name('home');
    Route::group(['prefix' => '/news', 'as' => 'news.'], function () {
        Route::match(['get', 'post'], '/', 'NewsController@index')->name('index');
        Route::match(['get', 'post'], '/add', 'NewsController@add')->name('add');
        Route::get('/edit', 'NewsController@editAdmin')->name('edit');
        Route::get('/delete/{id}', 'NewsController@deliteNew')->name('delete');

    });
});


Route::get('/project', function () {
    return view('project');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);


    if (!File::exists($path)) {

        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);


    return $response;
});
