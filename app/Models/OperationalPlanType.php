<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalPlanType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
    ];

    public function sections()
    {
        return $this->hasMany(OperationalPlanSection::class, 'type_id');
    }
}
