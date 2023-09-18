<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return "Bonjour 5Twin";
    }

    // public function show(){
    //     return view('Home.show');
    // }

    public function show($name =null){
        return view('Home.show',['name'=>$name]);
    }
}
