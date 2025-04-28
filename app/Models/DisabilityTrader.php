<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisabilityTrader extends Model
{
    use HasFactory;

    protected $fillable = [
        'disability_people_id',
        'trade_condition',
        'elderly_name',
        'citizen_id',
        'address',
        'phone_number'
    ];

    public function disabilityPerson()
    {
        return $this->belongsTo(DisabilityPerson::class, 'disability_people_id');
    }
}
