<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use QL\QueryList;

class ArticlesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort', 'asc')->get();
        $articles = Articles::paginate(20);

        return view("articles.index", compact('articles', 'categories'));
    }

    public function show(Articles $articles)
    {
    }
}
