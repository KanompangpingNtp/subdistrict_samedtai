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
        Schema::create('trade_copy_locations', function (Blueprint $table) {
            $table->id(); // id เป็น primary key และ auto increment
            $table->foreignId('trade_registries_id')->constrained('trade_registries')->onDelete('cascade'); // เชื่อมกับ trade_registries.id

            // ที่ตั้งสำนักงาน
            $table->string('copy_location_address_number')->nullable();
            $table->string('copy_location_village')->nullable();
            $table->string('copy_location_alley')->nullable();
            $table->string('copy_location_road')->nullable();
            $table->string('copy_location_subdistrict')->nullable();
            $table->string('copy_location_district')->nullable();
            $table->string('copy_location_province')->nullable();
            $table->string('copy_location_phone')->nullable();
            $table->string('copy_location_fax')->nullable();

            // ที่ตั้งคลังสินค้า
            $table->string('warehouse_location_address_number')->nullable();
            $table->string('warehouse_location_village')->nullable();
            $table->string('warehouse_location_alley')->nullable();
            $table->string('warehouse_location_road')->nullable();
            $table->string('warehouse_location_subdistrict')->nullable();
            $table->string('warehouse_location_district')->nullable();
            $table->string('warehouse_location_province')->nullable();
            $table->string('warehouse_location_phone')->nullable();
            $table->string('warehouse_location_fax')->nullable();

            // ตัวแทนค้าต่าง
            $table->string('agent_name')->nullable();
            $table->string('agent_nationality')->nullable();
            $table->string('agent_address_number')->nullable();
            $table->string('agent_village')->nullable();
            $table->string('agent_alley')->nullable();
            $table->string('agent_road')->nullable();
            $table->string('agent_subdistrict')->nullable();
            $table->string('agent_district')->nullable();
            $table->string('agent_province')->nullable();
            $table->string('agent_phone')->nullable();
            $table->string('agent_fax')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_copy_locations');
    }
};
