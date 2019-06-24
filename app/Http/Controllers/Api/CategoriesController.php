<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort', 'asc')->select('id', 'name')->get()->toArray();
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category['id'],
                'text' => $category['name'],
            ];
        }

        return response()->json($data);
    }
}
