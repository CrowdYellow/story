<?php

namespace App\Http\Controllers\Api;

use App\Models\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function index()
    {
        $weChat = System::select('we_chat')->first();

        return response()->json(['wechat' => $weChat->we_chat]);
    }
}
