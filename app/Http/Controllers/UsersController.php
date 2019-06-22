<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(User $user)
    {
        $user->updateViewCount();
        $articles = Article::where('user_id', $user->id)->paginate(20);
        return view("users.show", compact('user', 'articles'));
    }
}
