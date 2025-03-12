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
        Schema::create('i_t_a_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_id')->constrained('i_t_a_details')->onDelete('cascade');
            $table->text('url_name')->nullable();
            $table->string('url_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_t_a_links');
    }
};
