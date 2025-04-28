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
        Schema::create('building_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['1', '2']);
            $table->string('admin_name_verifier',150)->nullable();
            $table->string('written_at', 150)->nullable();
            $table->string('full_name', 150)->nullable();
            $table->string('is_an_individual', 150)->nullable();
            $table->string('house_number', 150)->nullable();
            $table->string('village', 150)->nullable();
            $table->string('alley', 150)->nullable();
            $table->string('road', 150)->nullable();
            $table->string('subdistrict', 150)->nullable();
            $table->string('district', 150)->nullable();
            $table->string('province', 150)->nullable();
            $table->string('option', 150)->nullable();
            $table->string('option_detail', 150)->nullable();
            $table->date('registered')->nullable();
            $table->string('registration_number', 150)->nullable();
            $table->string('office_located', 150)->nullable();
            $table->string('office_village', 150)->nullable();
            $table->string('office_alley', 150)->nullable();
            $table->string('office_road', 150)->nullable();
            $table->string('office_subdistrict', 150)->nullable();
            $table->string('office_district', 150)->nullable();
            $table->string('office_province', 150)->nullable();
            $table->string('by_name', 150)->nullable();
            $table->string('by_house_number', 150)->nullable();
            $table->string('by_village', 150)->nullable();
            $table->string('by_alley', 150)->nullable();
            $table->string('by_road', 150)->nullable();
            $table->string('by_subdistrict', 150)->nullable();
            $table->string('by_district', 150)->nullable();
            $table->string('by_province', 150)->nullable();
            $table->string('apply_for_license', 150)->nullable();
            $table->string('apply_house_number', 150)->nullable();
            $table->string('apply_village', 150)->nullable();
            $table->string('apply_alley', 150)->nullable();
            $table->string('apply_road', 150)->nullable();
            $table->string('apply_subdistrict', 150)->nullable();
            $table->string('apply_district', 150)->nullable();
            $table->string('apply_province', 150)->nullable();
            $table->string('apply_by', 150)->nullable();
            $table->string('apply_number', 150)->nullable();
            $table->string('it_the_land_of', 150)->nullable();
            $table->string('building_type_1', 150)->nullable();
            $table->string('building_num_1', 150)->nullable();
            $table->string('building_to_1', 150)->nullable();
            $table->string('building_Number_vehicles_1', 150)->nullable();
            $table->string('building_type_2', 150)->nullable();
            $table->string('building_num_2', 150)->nullable();
            $table->string('building_to_2', 150)->nullable();
            $table->string('building_Number_vehicles_2', 150)->nullable();
            $table->string('building_type_3', 150)->nullable();
            $table->string('building_num_3', 150)->nullable();
            $table->string('building_to_3', 150)->nullable();
            $table->string('building_Number_vehicles_3', 150)->nullable();
            $table->string('project_supervisor', 150)->nullable();
            $table->string('designer_and_calculator', 150)->nullable();
            $table->text('scheduled_for_completion')->nullable();
            $table->string('number_of_blueprints', 150)->nullable();
            $table->string('blueprint_set', 150)->nullable();
            $table->string('one_set_quantity', 150)->nullable();
            $table->string('designer_calculates', 150)->nullable();
            $table->string('control_architecture', 150)->nullable();
            $table->string('number', 150)->nullable();
            $table->string('quantity', 150)->nullable();
            $table->string('number_of_land_owners', 150)->nullable();
            $table->string('controller', 150)->nullable();
            $table->string('controller_2', 150)->nullable();
            $table->string('other_documents', 150)->nullable();
            $table->string('legal_name', 150)->nullable();
            $table->string('building_type_new', 150)->nullable();
            $table->string('title_deed_type', 150)->nullable();
            $table->string('according_document', 150)->nullable();
            $table->string('individual_call', 150)->nullable();
            $table->string('entity_calling', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_changes');
    }
};
