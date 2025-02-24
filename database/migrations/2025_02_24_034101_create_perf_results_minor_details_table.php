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
        Schema::create('perf_results_minor_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perf_results_detail_id')->constrained('perf_results_details')->onDelete('cascade');
            $table->string('detail_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perf_results_minor_details');
    }
};
