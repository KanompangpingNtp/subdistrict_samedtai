<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelGroupPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_rank_id', 'group_photo_file'];

    public function rank()
    {
        return $this->belongsTo(PersonnelRank::class);
    }
}
