<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function show($n =null){
        // return view('Article.show',['n'=>$n]);
        return view('Article.show')->with('n', $n);

    }

}
