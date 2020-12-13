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
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }
}
