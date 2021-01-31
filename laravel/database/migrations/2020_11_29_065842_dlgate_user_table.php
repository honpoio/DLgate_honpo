<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DlgateUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    // protected $primaryKey = 'name';
    public function up(): void
    {
        Schema::create('dlgate_table', function (Blueprint $table): void {
            $table->engine = 'InnoDB';
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
                ->onDelete('cascade');

            // $table->onDelete('SET NULL');
            //外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dlgate_table');
    }
}
