<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Page2Controller extends Controller
{
    //
    public function greeting ($name =null){
        return view('page2',['name'=>$name]);
    }
}
