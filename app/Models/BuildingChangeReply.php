<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingChangeReply extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'building_changes_id', 'reply_text', 'reply_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function buildingChange()
    {
        return $this->belongsTo(BuildingChange::class, 'building_changes_id');
    }
}
