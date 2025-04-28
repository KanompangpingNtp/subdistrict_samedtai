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
        Schema::create('trade_registries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['1', '2']);
            $table->string('admin_name_verifier')->nullable();
            $table->string('business_registration')->nullable(); // จดทะเบียนพาณิชย์
            $table->string('register_change_items')->nullable(); // จดทะเบียนเปลี่ยนแปลงรายการ
            $table->string('register_change_number')->nullable(); // จดทะเบียนเปลี่ยนแปลงรายการเลข
            $table->date('register_change_date')->nullable(); // จดทะเบียนเปลี่ยนแปลงวันที่
            $table->string('business_termination')->nullable(); // จดทะเบียนเลิกประกอบพาณิชย์
            $table->string('business_termination_detail')->nullable(); // รายละเอียดการเลิกประกอบพาณิชย์
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_registries');
    }
};
