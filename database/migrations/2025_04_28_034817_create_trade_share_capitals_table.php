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
        Schema::create('trade_share_capitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trade_registries_id')->constrained('trade_registries')->onDelete('cascade');
            $table->string('number_partners')->nullable();

            // Share Capital 1
            $table->string('share_capital1_name')->nullable();
            $table->string('share_capital1_age')->nullable();
            $table->string('share_capital1_ethnicity')->nullable();
            $table->string('share_capital1_nationality')->nullable();
            $table->string('share_capital1_address_number')->nullable();
            $table->string('share_capital1_village')->nullable();
            $table->string('share_capital1_alley')->nullable();
            $table->string('share_capital1_road')->nullable();
            $table->string('share_capital1_subdistrict')->nullable();
            $table->string('share_capital1_district')->nullable();
            $table->string('share_capital1_province')->nullable();
            $table->string('share_capital1_phone')->nullable();
            $table->string('share_capital1_fax')->nullable();
            $table->string('share_capital1_invest_with')->nullable();
            $table->string('share_capital1_quantity')->nullable();

            // Share Capital 2
            $table->string('share_capital2_name')->nullable();
            $table->string('share_capital2_age')->nullable();
            $table->string('share_capital2_ethnicity')->nullable();
            $table->string('share_capital2_nationality')->nullable();
            $table->string('share_capital2_address_number')->nullable();
            $table->string('share_capital2_village')->nullable();
            $table->string('share_capital2_alley')->nullable();
            $table->string('share_capital2_road')->nullable();
            $table->string('share_capital2_subdistrict')->nullable();
            $table->string('share_capital2_district')->nullable();
            $table->string('share_capital2_province')->nullable();
            $table->string('share_capital2_phone')->nullable();
            $table->string('share_capital2_fax')->nullable();
            $table->string('share_capital2_invest_with')->nullable();
            $table->string('share_capital2_quantity')->nullable();

            // Share Capital 3
            $table->string('share_capital3_name')->nullable();
            $table->string('share_capital3_age')->nullable();
            $table->string('share_capital3_ethnicity')->nullable();
            $table->string('share_capital3_nationality')->nullable();
            $table->string('share_capital3_address_number')->nullable();
            $table->string('share_capital3_village')->nullable();
            $table->string('share_capital3_alley')->nullable();
            $table->string('share_capital3_road')->nullable();
            $table->string('share_capital3_subdistrict')->nullable();
            $table->string('share_capital3_district')->nullable();
            $table->string('share_capital3_province')->nullable();
            $table->string('share_capital3_phone')->nullable();
            $table->string('share_capital3_fax')->nullable();
            $table->string('share_capital3_invest_with')->nullable();
            $table->string('share_capital3_quantity')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_share_capitals');
    }
};
