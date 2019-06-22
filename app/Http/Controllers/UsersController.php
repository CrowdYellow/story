<?php

namespace App\Http\Controllers;

use App\Handlers\ApiResponse;
use App\Http\Requests\PasswordRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(User $user)
    {
        $user->updateViewCount();
        $articles = Article::where('user_id', $user->id)->paginate(20);
        return view("users.show", compact('user', 'articles'));
    }

    public function password(User $user)
    {
        $this->authorize('update', $user);
        return view("users.password", compact('user'));
    }

    public function updatePassword(PasswordRequest $request, User $user)
    {
        $oldPassword = $request->oldPassword;

        if (!Hash::check($oldPassword, $user->password)) {
            // 返回401
            return back();
        }

        $user->password = $request->password;

        $user->save();

        return redirect()->route('users.show', $user->id);
    }
}
