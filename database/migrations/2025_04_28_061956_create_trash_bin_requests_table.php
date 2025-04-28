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
        Schema::create('trash_bin_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', [1, 2]);
            $table->string('admin_name_verifier')->nullable();
            $table->string('written_at');
            $table->date('date_written')->nullable();
            $table->string('salutation')->nullable();
            $table->string('full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('village')->nullable();
            $table->string('nearby_places')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('canon_options')->nullable();
            $table->string('option1_amount')->nullable();
            $table->string('option1_month')->nullable();
            $table->string('option2_amount')->nullable();
            $table->string('option2_month')->nullable();
            $table->string('option3_amount')->nullable();
            $table->string('option3_month')->nullable();
            $table->string('option4_detail')->nullable();
            $table->string('document_options')->nullable();
            $table->string('document_options1_detail')->nullable();
            $table->string('document_options3_detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_bin_requests');
    }
};
