<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey = 'user';
    public function up()
    {
        Schema::create('gate_users', function (Blueprint $table) {
            $table->string('user')->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gate_users');
    }
}
