<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdxDlgatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dlgates', function (Blueprint $table) {
            $table->index(['user_id', 'URL_id']);
            $table->index(['user_id']);
        });
    }

    /**user_id
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dlgates', function (Blueprint $table) {
            
        });
    }
}
