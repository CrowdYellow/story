<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function articleByUserId($userId)
    {
        $articles = Article::where('user_id', $userId)->select("id", "title")->limit(5)->get()->toArray();

        return response()->json($articles);
    }
}
