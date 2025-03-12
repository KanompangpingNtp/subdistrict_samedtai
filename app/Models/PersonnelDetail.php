<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelDetail extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_rank_id', 'full_name', 'phone', 'status','department'];

    public function rank()
    {
        return $this->belongsTo(PersonnelRank::class);
    }

    public function images()
    {
        return $this->hasMany(PersonnelImage::class);
    }
}
