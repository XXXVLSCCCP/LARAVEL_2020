<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class NewsValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $categoriesTableName = (new Category())->getTable();
        $rules = [
            'image'       => 'image',
            'category_id' => "required|integer|exists:{$categoriesTableName},id",
            'is_private'  => 'min:0|max:1',
            'title'       => 'required',
            'text'        => 'required',
        ];

        $request->validate($rules);

//        $validator = \Validator::make($request->all(),$rules);
//
//        if($validator->fails()) {
//            return redirect()->back()->withInput()->with('errors',$validator->errors());
//        }

        return $next($request);
    }

}
