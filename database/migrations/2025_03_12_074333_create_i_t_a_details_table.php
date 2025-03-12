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
        Schema::create('i_t_a_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('i_t_a_types')->onDelete('cascade');
            $table->string('number_ita')->nullable();
            $table->text('title_name');
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_t_a_details');
    }
};
