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
        Schema::table('post_details', function (Blueprint $table) {
            //
            $table->text('title_name')->nullable()->change();
            $table->text('topic_name')->nullable()->change();
            $table->text('details')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_details', function (Blueprint $table) {
            $table->string('title_name')->nullable()->change();
            $table->string('topic_name')->nullable()->change();
            $table->string('details')->nullable()->change();
        });
    }
};
