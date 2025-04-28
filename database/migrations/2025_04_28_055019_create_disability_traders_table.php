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
        Schema::create('disability_traders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disability_people_id')->constrained('disability_people')->onDelete('cascade');
            $table->string('trade_condition');
            $table->string('elderly_name');
            $table->string('citizen_id');
            $table->text('address');
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disability_traders');
    }
};
