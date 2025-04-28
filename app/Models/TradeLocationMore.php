<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLocationMore extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_registries_id',
        'location_address_number',
        'location_village',
        'location_alley',
        'location_road',
        'location_subdistrict',
        'location_district',
        'location_province',
        'location_phone',
        'location_fax',
        'manager_name',
        'manager_age',
        'manager_nationality',
        'manager_address_number',
        'manager_village',
        'manager_alley',
        'manager_road',
        'manager_subdistrict',
        'manager_district',
        'manager_province',
        'manager_phone',
        'manager_fax',
        'start_date',
        'date_registration',
        'accepting_commercial_name',
        'accepting_commercial_nationality',
        'accepting_commercial_address_number',
        'accepting_commercial_village',
        'accepting_commercial_alley',
        'accepting_commercial_road',
        'accepting_commercial_subdistrict',
        'accepting_commercial_district',
        'accepting_commercial_province',
        'accepting_commercial_phone',
        'accepting_commercial_fax',
        'accepting_commercial_name_used',
        'accepting_commercial_transferred',
        'accepting_commercial_cause'
    ];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
