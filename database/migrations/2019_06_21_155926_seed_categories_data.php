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
                'name' => '爱情',
                'sort' => 2,
            ],
            [
                'name' => '奇幻',
                'sort' => 3,
            ],
            [
                'name' => '悬疑',
                'sort' => 4,
            ],
            [
                'name' => '世情',
                'sort' => 5,
            ],
            [
                'name' => '婚姻',
                'sort' => 6,
            ],
            [
                'name' => '青春',
                'sort' => 7,
            ],
            [
                'name' => '励志',
                'sort' => 8,
            ],
            [
                'name' => '小知识',
                'sort' => 9,
            ],
            [
                'name' => '情趣',
                'sort' => 10,
            ],
            [
                'name' => '问答',
                'sort' => 11,
            ],
            [
                'name' => '娱乐',
                'sort' => 12,
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
