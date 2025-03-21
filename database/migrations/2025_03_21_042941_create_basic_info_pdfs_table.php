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
        Schema::create('basic_info_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('basic_info_details_id')->constrained('basic_info_details')->onDelete('cascade');
            $table->string('pdf_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_info_pdfs');
    }
};
