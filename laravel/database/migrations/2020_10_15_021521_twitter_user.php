<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TwitterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitter_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('twitter_id');
            $table->string('twitter_name');
            $table->string('twitter_nickname');
            $table->string('twitter_description');
            $table->string('twitter_icon_url');
            $table->string('twitter_token');
            $table->string('twitter_token_secret');
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
        Schema::dropIfExists('twitter_user');
    }
}
