<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        // 创建一个查询构造器
        $builder = Article::query();
        // search 参数用来模糊搜索商品
        if ($search = $request->input('search', '')) {
            $like = '%'.$search.'%';
            // 模糊搜索商品标题、商品详情、SKU 标题、SKU描述
            $builder->where(function ($query) use ($like) {
                $query->where('title', 'like', $like);
            });
        }
        $categories = Category::orderBy('sort', 'asc')->get();
        $articles = $builder->paginate(20);

        return view("articles.index", compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        $categories = Category::orderBy('sort', 'asc')->get();
        $otherArticles = Article::where('category_id', $article->category_id)->orderBy('id', 'desc')->limit(6)->get();
        return view('articles.show', compact('article', 'otherArticles', 'categories'));
    }
}
