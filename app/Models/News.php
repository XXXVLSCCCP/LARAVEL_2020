<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table= 'news';

    protected $fillable= [
        'id',
        'category_id',
        'is_private',
        'title',
        'text',
        'image',

    ];


    public function category(){
        return $this->belongsTo('App\Models\Category','category_id', 'id', 'title');
    }


//    static function rules(){
//
//        return [
//
//            'id',
//            'category_id' => 'required|integer|exists:category,id',
//            'is_private' => 'min:0|max:1',
//            'title' => 'required',
//            'text' => 'required',
//            'image' => 'image',
//
//        ];
//    }
}
