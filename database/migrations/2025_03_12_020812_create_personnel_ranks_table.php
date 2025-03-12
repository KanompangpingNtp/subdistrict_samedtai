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
        Schema::create('personnel_ranks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_agency_id')->constrained('personnel_agencies')->cascadeOnDelete();
            $table->string('personnel_rank_name');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_ranks');
    }
};
