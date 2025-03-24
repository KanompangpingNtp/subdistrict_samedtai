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
        Schema::create('list_details_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_details_id')->constrained('list_details')->onDelete('cascade');
            $table->string('pdf_file');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_details_pdfs');
    }
};
