<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildBuildingFile extends Model
{
    use HasFactory;

    protected $fillable = ['build_building_id', 'file_path', 'file_type'];

    public function buildBuilding()
    {
        return $this->belongsTo(BuildBuilding::class, 'build_building_id');
    }
}
