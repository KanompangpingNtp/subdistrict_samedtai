<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeCopyLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_registries_id',
        'copy_location_address_number',
        'copy_location_village',
        'copy_location_alley',
        'copy_location_road',
        'copy_location_subdistrict',
        'copy_location_district',
        'copy_location_province',
        'copy_location_phone',
        'copy_location_fax',
        'warehouse_location_address_number',
        'warehouse_location_village',
        'warehouse_location_alley',
        'warehouse_location_road',
        'warehouse_location_subdistrict',
        'warehouse_location_district',
        'warehouse_location_province',
        'warehouse_location_phone',
        'warehouse_location_fax',
        'agent_name',
        'agent_nationality',
        'agent_address_number',
        'agent_village',
        'agent_alley',
        'agent_road',
        'agent_subdistrict',
        'agent_district',
        'agent_province',
        'agent_phone',
        'agent_fax'
    ];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
