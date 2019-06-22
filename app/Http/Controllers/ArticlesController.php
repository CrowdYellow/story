<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort', 'asc')->get();
        $articles = Article::paginate(20);

        return view("articles.index", compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        $otherArticles = Article::where('category_id', $article->category_id)->orderBy('id', 'desc')->limit(6)->get();
        return view('articles.show', compact('article', 'otherArticles'));
    }
}
