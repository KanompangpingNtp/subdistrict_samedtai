<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingChangeFile extends Model
{
    use HasFactory;

    protected $fillable = ['building_changes_id', 'file_path', 'file_type'];

    public function buildingChange()
    {
        return $this->belongsTo(BuildingChange::class, 'building_changes_id');
    }
}
