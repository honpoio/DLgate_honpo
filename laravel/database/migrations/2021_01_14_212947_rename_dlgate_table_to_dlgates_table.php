<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameDlgateTableToDlgatesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('dlgate_table', 'dlgates');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('dlgate_table', 'dlgates');
    }
}
