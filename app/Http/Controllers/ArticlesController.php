<?php

namespace App\Http\Controllers;

use QL\QueryList;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $url = 'https://www.guozhi.org/qihuan/69017.html';
// 定义采集规则
        $rules = [
            // 采集文章标题
            'title' => ['h1','text'],
            // 采集文章作者
            'topics' => ['.tag>a','text'],
            // 采集文章内容
            'content' => ['.main','html']
        ];
        $rt = QueryList::get($url)->rules($rules)->query()->getData();

        print_r($rt->all());
//        return view("articles.index");
    }
}
