<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeShareCapital extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_registries_id',
        'number_partners',
        // Share Capital 1
        'share_capital1_name',
        'share_capital1_age',
        'share_capital1_ethnicity',
        'share_capital1_nationality',
        'share_capital1_address_number',
        'share_capital1_village',
        'share_capital1_alley',
        'share_capital1_road',
        'share_capital1_subdistrict',
        'share_capital1_district',
        'share_capital1_province',
        'share_capital1_phone',
        'share_capital1_fax',
        'share_capital1_invest_with',
        'share_capital1_quantity',
        // Share Capital 2
        'share_capital2_name',
        'share_capital2_age',
        'share_capital2_ethnicity',
        'share_capital2_nationality',
        'share_capital2_address_number',
        'share_capital2_village',
        'share_capital2_alley',
        'share_capital2_road',
        'share_capital2_subdistrict',
        'share_capital2_district',
        'share_capital2_province',
        'share_capital2_phone',
        'share_capital2_fax',
        'share_capital2_invest_with',
        'share_capital2_quantity',
        // Share Capital 3
        'share_capital3_name',
        'share_capital3_age',
        'share_capital3_ethnicity',
        'share_capital3_nationality',
        'share_capital3_address_number',
        'share_capital3_village',
        'share_capital3_alley',
        'share_capital3_road',
        'share_capital3_subdistrict',
        'share_capital3_district',
        'share_capital3_province',
        'share_capital3_phone',
        'share_capital3_fax',
        'share_capital3_invest_with',
        'share_capital3_quantity',
    ];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
