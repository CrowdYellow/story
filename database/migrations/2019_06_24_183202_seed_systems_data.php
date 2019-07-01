<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class SeedSystemsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cofig = [
            'web_title' => '手机读故事网',
            'web_keywords' => '手机读故事网，每天读点故事在线阅读',
            'web_description' => '手机读故事网,最适宜手机阅读的精品原创故事。作家作品集页面可以让你免费看完你喜欢的作家故事全文。电脑在线每天读点故事，让生活充满故事色彩。',
            'we_chat' => 'images/wechat.jpg',
        ];
        DB::table('systems')->insert($cofig);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('systems')->truncate();
    }
}
