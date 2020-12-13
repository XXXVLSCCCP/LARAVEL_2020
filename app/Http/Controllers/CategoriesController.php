<?php

namespace App\Http\Controllers;

use App\Models\Category1;
use Illuminate\Http\Request;
use App\Library\Calc;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {

//        $category = Category1::getCategories();

          $category = Category::all();

        return view('news.category', ['news' => $category]);
    }

    public function calc()
    {
        $calc = new Calc();
        $result = $calc->add(4)->$calc->sub(4)->$calc->add(4)->$calc->sub(4)->getResult();
        return $result;

    }
}




