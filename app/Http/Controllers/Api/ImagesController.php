<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function ads()
    {
        $images = Image::where('type', 1)->select('url', 'images')->get()->toArray();
        return response()->json($images);
    }
}
