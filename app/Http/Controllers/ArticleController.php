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

    public function create(): View
    {
        return view('articles.create');
    }
    
    public function store(Request $request){
        $req = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $article = Article::create($req);
        return redirect('/dashboard/articles');
    }


    public function edit(string $id): View
    {
        $article = Article::find($id);
        return view('articles.edit', [
            "article" => $article
        ]);
    }

    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        // sans validation
        $req = $request->only(['title', 'content']);

        // avec validation 
        $req = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article->update($req);
        
        return redirect('/dashboard/articles');
    }
}
