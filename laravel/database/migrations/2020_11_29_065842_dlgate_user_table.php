<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DlgateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // protected $primaryKey = 'name';
    public function up()
    {
        Schema::create('dlgate_table', function (Blueprint $table) {

            $table->engine = 'InnoDB';
<<<<<<< HEAD
<<<<<<< HEAD
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->uuid('URL_id')->unique();
            $table->string('gate_name');
            $table->string('dl_url');
            $table->string('Twitter_user')->nullable();
            $table->string('Twitter_tweet')->nullable();
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
=======
            $table->string('name');
=======
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
>>>>>>> DB_redesign
            $table->uuid('URL_id')->unique();
            $table->string('gate_name');
            $table->string('dl_url');
            $table->string('Twitter_user')->nullable();
            $table->string('Twitter_tweet')->nullable();
            
<<<<<<< HEAD
            $table->foreign('name')
            ->references('user')
            ->on('gate_users')
>>>>>>> test
=======
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
>>>>>>> DB_redesign
            ->onDelete('cascade');

            // $table->onDelete('SET NULL');
            //外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dlgate_table');
    }
}
