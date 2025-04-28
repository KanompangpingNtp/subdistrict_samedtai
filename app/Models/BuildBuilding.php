<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildBuilding extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'status',
        'admin_name_verifier',
        'write_the_date',
        'subject',
        'salutation',
        'full_name',
        'house_number',
        'village',
        'alley',
        'road',
        'subdistrict',
        'district',
        'province',
        'have_intention',
        'have_to',
        'land_title_number',
        'volume',
        'page',
        'village_area',
        'subdistrict_area',
        'district_area',
        'province_area'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function files()
    {
        return $this->hasMany(BuildBuildingFile::class, 'build_building_id');
    }

    public function replies()
    {
        return $this->hasMany(BuildBuildingReply::class, 'build_building_id');
    }
}
