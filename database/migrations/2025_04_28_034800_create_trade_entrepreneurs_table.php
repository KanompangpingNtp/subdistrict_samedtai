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
        Schema::create('trade_entrepreneurs', function (Blueprint $table) {
            $table->id(); // id เป็น primary key และ auto increment
            $table->foreignId('trade_registries_id')->constrained('trade_registries')->onDelete('cascade'); // เชื่อมกับ trade_registries.id
            $table->string('trade_entrepreneur_name')->nullable(); // ชื่อผู้ประกอบกิจการ
            $table->string('trade_entrepreneur_age')->nullable()->nullable(); // อายุ
            $table->string('trade_entrepreneur_ethnicity')->nullable(); // เชื้อชาติ
            $table->string('trade_entrepreneur_nationality')->nullable(); // สัญชาติ
            $table->string('trade_entrepreneur_address_number')->nullable(); // ที่อยู่
            $table->string('trade_entrepreneur_village')->nullable(); // หมู่ที่
            $table->string('trade_entrepreneur_alley')->nullable(); // ตรอก/ซอย
            $table->string('trade_entrepreneur_road')->nullable(); // ถนน
            $table->string('trade_entrepreneur_subdistrict')->nullable(); // ตำบล
            $table->string('trade_entrepreneur_district')->nullable(); // อำเภอ
            $table->string('trade_entrepreneur_province')->nullable(); // จังหวัด
            $table->string('trade_entrepreneur_phone')->nullable(); // โทรศัพท์
            $table->string('trade_entrepreneur_fax')->nullable(); // โทรสาร
            $table->string('business_thai_language')->nullable(); // ภาษาไทย
            $table->string('business_foreign_language')->nullable()->nullable(); // ภาษาต่างประเทศ (ถ้ามี)
            $table->string('commercial_type1')->nullable(); // ชนิดพาณิชย
            $table->string('commercial_type2')->nullable(); // ชนิดพาณิชย
            $table->string('commercial_type3')->nullable(); // ชนิดพาณิชย
            $table->string('commercial_type4')->nullable(); // ชนิดพาณิชย
            $table->string('capital_amount')->nullable(); // จำนวนเงินทุน
            $table->string('capital_amount_detaill')->nullable();
            $table->string('salutation')->nullable();
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_entrepreneurs');
    }
};
