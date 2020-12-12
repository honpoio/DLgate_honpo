<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGetenameAndDlurlToDlgateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dlgate_table', function (Blueprint $table) {
            $table->string('gate_name');
            $table->string('dl_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dlgate_table', function (Blueprint $table) {
            $table->dropColumn('gate_name');
            $table->dropColumn('dl_url');
        });
    }
}
