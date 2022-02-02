<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route d'exemple : return a text
Route::get('/example', function (){
    return 'Ceci est un example';
});

// Route d'exemple : return a view
Route::get('/example-view', function (){
    return view('example.example-view');
});

// Route d'exemple : return a view with data
Route::get('/example-view-data', function (){
    return view('example.example-view-data', [
        "data" => "La data vient de la fonction dans la route"
    ]);
});
