<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Page2Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/welcome',function () {
    return view('bonjour') ;
});

Route::get('/bonjour',[WelcomeController::class,'greet']);


Route::get('/page1', function (){
    return view('page1');
});

Route::get('/p2/{name}', function ($name){
    return ('welcome'.' '.$name );
});

Route::get('/page2/{name?}',[Page2Controller::class,'greeting'])
->where('name','[A-Za-z]+'); //expression réguliére pour imposer que des lettres



Route::get('/home',[HomeController::class,'index']);
Route::get('/show/{name?}',[HomeController::class,'show']);


Route::get('/article/{n?}',[ArticleController::class,'show']);



//partie middleware
Route::get('/form', function () {
    return view('form');
});


// Traite les données du formulaire
Route::get('/result', function (Request $request) {
    // Récupère la valeur du champ de saisie 'pseudo'
    $pseudo = $request->input('pseudo');

    // Affiche la valeur du champ de saisie (le middleware TrimStrings aura été appliqué)
    return "Pseudo saisi : " . $pseudo;
});

Route::middleware([VerifAge::class])->group(function(){
    Route::get(uri:'result');
});



