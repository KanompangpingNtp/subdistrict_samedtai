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
        Schema::create('trade_share_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trade_registries_id')->constrained('trade_registries')->onDelete('cascade');
            $table->string('registration_point')->nullable();
            $table->string('divided_into')->nullable();
            $table->string('value_per_share')->nullable();
            $table->string('nationality1')->nullable();
            $table->string('holding_shares1')->nullable();
            $table->string('nationality2')->nullable();
            $table->string('holding_shares2')->nullable();
            $table->string('nationality3')->nullable();
            $table->string('holding_shares3')->nullable();
            $table->string('nationality4')->nullable();
            $table->string('holding_shares4')->nullable();
            $table->string('many_partners')->nullable();

            // Partner 1
            $table->string('partner1_name')->nullable();
            $table->string('partner1_age')->nullable();
            $table->string('partner1_ethnicity')->nullable();
            $table->string('partner1_nationality')->nullable();
            $table->string('partner1_address_number')->nullable();
            $table->string('partner1_village')->nullable();
            $table->string('partner1_alley')->nullable();
            $table->string('partner1_road')->nullable();
            $table->string('partner1_subdistrict')->nullable();
            $table->string('partner1_district')->nullable();
            $table->string('partner1_province')->nullable();
            $table->string('partner1_phone')->nullable();
            $table->string('partner1_fax')->nullable();

            // Partner 2
            $table->string('partner2_name')->nullable();
            $table->string('partner2_age')->nullable();
            $table->string('partner2_ethnicity')->nullable();
            $table->string('partner2_nationality')->nullable();
            $table->string('partner2_address_number')->nullable();
            $table->string('partner2_village')->nullable();
            $table->string('partner2_alley')->nullable();
            $table->string('partner2_road')->nullable();
            $table->string('partner2_subdistrict')->nullable();
            $table->string('partner2_district')->nullable();
            $table->string('partner2_province')->nullable();
            $table->string('partner2_phone')->nullable();
            $table->string('partner2_fax')->nullable();

            $table->text('other')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_share_values');
    }
};
