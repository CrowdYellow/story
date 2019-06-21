<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => '推荐',
            ],
            [
                'name'        => '爱情',
            ],
            [
                'name'        => '奇幻',
            ],
            [
                'name'        => '悬疑',
            ],
            [
                'name'        => '世情',
            ],
            [
                'name'        => '婚姻',
            ],
            [
                'name'        => '青春',
            ],
            [
                'name'        => '励志',
            ],
            [
                'name'        => '小知识',
            ],
            [
                'name'        => '情趣',
            ],
            [
                'name'        => '问答',
            ],
            [
                'name'        => '娱乐',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
