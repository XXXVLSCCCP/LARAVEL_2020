<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
   public function index(){
      $parser =XmlParser::load('https://lenta.ru//rss/news');
       $data = $parser->parse([
           'news'=>['uses'=>'channel.item[title,link,description,enclosure::url,category]'],
       ]);

         // dd($parser);
       dd($data);
   }
}
