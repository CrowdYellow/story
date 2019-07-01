<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $categories = Category::orderBy('sort', 'asc')->get();
        $articles = Article::where("category_id", $category->id)->paginate(20);

        return view("articles.index", compact('articles', 'categories', 'category'));
    }
}
