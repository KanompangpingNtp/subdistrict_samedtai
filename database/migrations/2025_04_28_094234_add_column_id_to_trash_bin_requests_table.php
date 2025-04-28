<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trash_bin_requests', function (Blueprint $table) {
            //
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trash_bin_requests', function (Blueprint $table) {
            //
            $table->dropColumn('last_name');
            $table->dropColumn('age');
            $table->dropColumn('position');
        });
    }
};
