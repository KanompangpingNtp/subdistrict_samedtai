<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'status',
        'admin_name_verifier',
        'written_at',
        'is_an_individual',
        'house_number',
        'village',
        'alley',
        'road',
        'subdistrict',
        'district',
        'province',
        'option',
        'registered',
        'registration_number',
        'office_located',
        'office_village',
        'office_alley',
        'office_road',
        'office_subdistrict',
        'office_district',
        'office_province',
        'by_name',
        'by_house_number',
        'by_village',
        'by_alley',
        'by_road',
        'by_subdistrict',
        'by_district',
        'by_province',
        'apply_for_license',
        'apply_house_number',
        'apply_village',
        'apply_alley',
        'apply_road',
        'apply_subdistrict',
        'apply_district',
        'apply_province',
        'apply_by',
        'apply_number',
        'it_the_land_of',
        'building_type_1',
        'building_num_1',
        'building_to_1',
        'building_Number_vehicles_1',
        'building_type_2',
        'building_num_2',
        'building_to_2',
        'building_Number_vehicles_2',
        'building_type_3',
        'building_num_3',
        'building_to_3',
        'building_Number_vehicles_3',
        'project_supervisor',
        'designer_and_calculator',
        'number_of_blueprints',
        'blueprint_set',
        'one_set_quantity',
        'designer_calculates',
        'control_architecture',
        'number',
        'quantity',
        'number_of_land_owners',
        'controller',
        'controller_2',
        'other_documents',
        'full_name',
        'option_detail',
        'scheduled_for_completion',
        'legal_name',
        'building_type_new',
        'title_deed_type',
        'according_document',
        'individual_call',
        'entity_calling'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function buildingChangeFiles()
    {
        return $this->hasMany(BuildingChangeFile::class, 'building_changes_id');
    }

    public function buildingChangeReplies()
    {
        return $this->hasMany(BuildingChangeReply::class, 'building_changes_id');
    }
}
