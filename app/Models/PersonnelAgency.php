<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelAgency extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_agency_name','status'];

    public function ranks()
    {
        return $this->hasMany(PersonnelRank::class);
    }
}
