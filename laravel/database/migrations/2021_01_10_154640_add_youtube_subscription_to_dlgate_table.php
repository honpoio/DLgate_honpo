<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYoutubeSubscriptionToDlgateTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dlgate_table', function (Blueprint $table): void {
            $table->string('youtube_channel_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dlgate_table', function (Blueprint $table): void {
            $table->dropColumn('youtube_channel_id');
        });
    }
}
