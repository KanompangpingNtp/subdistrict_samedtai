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
        Schema::create('perf_single_topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perf_results_type_id')->constrained('perf_results_types')->onDelete('cascade');
            $table->string('detail_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perf_single_topics');
    }
};
