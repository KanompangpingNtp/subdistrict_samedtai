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
        Schema::create('authority_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_id')->nullable()->constrained('authority_details')->onDelete('set null');
            $table->text('files_path');
            $table->text('files_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authority_files');
    }
};
