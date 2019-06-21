<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("role_id");
            $table->string('name')->unique();
            $table->string('nickname')->unique();
            $table->string('avatar');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string("introduction")->comment("介绍");
            $table->integer('follow_count')->default(0)->comment("关注量");
            $table->integer('articles_count')->default(0)->comment("文章数量");
            $table->integer('views_count')->default(0)->comment("访问量");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
