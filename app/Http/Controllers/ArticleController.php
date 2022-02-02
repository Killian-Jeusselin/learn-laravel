<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::all();
        return view('articles.index', [
            "articles" => $articles
        ]);
    }
    public function adminIndex(): View
    {
        $articles = Article::all();
        return view('articles.admin-index', [
            "articles" => $articles
        ]);
    }
}
