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
        Schema::create('personnel_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_detail_id')->constrained('personnel_details')->cascadeOnDelete();
            $table->string('post_photo_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_images');
    }
};
