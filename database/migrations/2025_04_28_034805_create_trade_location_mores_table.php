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
        Schema::create('trade_location_mores', function (Blueprint $table) {
            $table->id(); // id เป็น primary key และ auto increment
            $table->foreignId('trade_registries_id')->constrained('trade_registries')->onDelete('cascade'); // เชื่อมกับ trade_registries.id
            $table->string('location_address_number')->nullable();
            $table->string('location_village')->nullable();
            $table->string('location_alley')->nullable();
            $table->string('location_road')->nullable();
            $table->string('location_subdistrict')->nullable();
            $table->string('location_district')->nullable();
            $table->string('location_province')->nullable();
            $table->string('location_phone')->nullable();
            $table->string('location_fax')->nullable();

            // ข้อมูลของผู้จัดการ
            $table->string('manager_name')->nullable();
            $table->string('manager_age')->nullable();
            $table->string('manager_nationality')->nullable();
            $table->string('manager_address_number')->nullable();
            $table->string('manager_village')->nullable();
            $table->string('manager_alley')->nullable();
            $table->string('manager_road')->nullable();
            $table->string('manager_subdistrict')->nullable();
            $table->string('manager_district')->nullable();
            $table->string('manager_province')->nullable();
            $table->string('manager_phone')->nullable();
            $table->string('manager_fax')->nullable();

            // ข้อมูลวันเริ่มต้นและวันที่จดทะเบียน
            $table->string('start_date')->nullable();
            $table->string('date_registration')->nullable();

            // ข้อมูลการรับโอนเงินพาณิชย์
            $table->string('accepting_commercial_name')->nullable();
            $table->string('accepting_commercial_nationality')->nullable();
            $table->string('accepting_commercial_address_number')->nullable();
            $table->string('accepting_commercial_village')->nullable();
            $table->string('accepting_commercial_alley')->nullable();
            $table->string('accepting_commercial_road')->nullable();
            $table->string('accepting_commercial_subdistrict')->nullable();
            $table->string('accepting_commercial_district')->nullable();
            $table->string('accepting_commercial_province')->nullable();
            $table->string('accepting_commercial_phone')->nullable();
            $table->string('accepting_commercial_fax')->nullable();
            $table->string('accepting_commercial_name_used')->nullable();
            $table->string('accepting_commercial_transferred')->nullable();
            $table->string('accepting_commercial_cause')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_location_mores');
    }
};
