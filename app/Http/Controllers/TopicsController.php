<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function show(Request $request)
    {
        $title = $request->topics;
        $category = $request->category;
        $categories = Category::orderBy('sort', 'asc')->get();
        $articles = Article::where("category_id", $category)->paginate(20);

        return view("topics.index", compact('articles', 'categories', 'title'));
    }
}
