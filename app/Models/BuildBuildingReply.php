<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildBuildingReply extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'build_building_id', 'reply_text', 'reply_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function buildBuilding()
    {
        return $this->belongsTo(BuildBuilding::class, 'build_building_id');
    }
}
