<?php

namespace App\Http\Controllers;

use App\Handler\ImageUploadHandler;
use App\Http\Requests\NameRequest;
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

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    public function avatar(User $user)
    {
        $this->authorize('update', $user);
        return view("users.avatar", compact('user'));
    }

    public function updateAvatar(Request $request, ImageUploadHandler $uploader, User $user)
    {
        $result = $uploader->save($request->avatar, 'avatars', $user->id);
        if ($result) {
            $data['avatar'] = $result['path'];
            $user->update($data);
            $data = [
                'status'  => 200,
                'message' => "成功",
                'data'    => [
                    'path' => $result['path'],
                ]
            ];
            return response()->json($data);
        }
        $data = [
            'status'  => 400,
            'message' => "失败",
        ];
        return response()->json($data);
    }

    public function name(User $user)
    {
        $this->authorize('update', $user);
        return view("users.name", compact('user'));
    }

    public function updateName(NameRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->save();
        return redirect()->route('users.show', $user->id);
    }
}
