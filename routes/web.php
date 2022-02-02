<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Http\Controllers\ArticleController;

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


/*
|--------------------------------------------------------------------------
| Examples routes
|--------------------------------------------------------------------------
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

/*
|--------------------------------------------------------------------------
| Simple routes
|--------------------------------------------------------------------------
|
*/
// Route d'exemple : return a Sql statement (Anti pattern MVC)
Route::get('/example-articles', function (){
    $articles = DB::table('articles')->get();
    // $articles = Article::all();
    //return $articles;
    return view('example.example-articles', [
        "articles" => $articles
    ]);
});

// Route permettant de récupérer tous les articles
Route::get('/articles', [ArticleController::class, 'index']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//Route::get('/dashboard/articles', [ArticleController::class, 'adminIndex'])->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('dashboard-articles');
        // create and store
        Route::get('/articles/create', [ArticleController::class, 'create']);
        Route::post('/articles', [ArticleController::class, 'store']);

        //edit and update
        Route::get('/articles/{id}', [ArticleController::class, 'edit'])->name('dashboard-articles-edit');
        Route::put('/articles/{id}', [ArticleController::class, 'update']);
    });
});

require __DIR__.'/auth.php';
