<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeShareValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_registries_id',
        'registration_point',
        'divided_into',
        'value_per_share',
        'nationality1',
        'holding_shares1',
        'nationality2',
        'holding_shares2',
        'nationality3',
        'holding_shares3',
        'nationality4',
        'holding_shares4',
        'many_partners',
        // Partner 1
        'partner1_name',
        'partner1_age',
        'partner1_ethnicity',
        'partner1_nationality',
        'partner1_address_number',
        'partner1_village',
        'partner1_alley',
        'partner1_road',
        'partner1_subdistrict',
        'partner1_district',
        'partner1_province',
        'partner1_phone',
        'partner1_fax',
        // Partner 2
        'partner2_name',
        'partner2_age',
        'partner2_ethnicity',
        'partner2_nationality',
        'partner2_address_number',
        'partner2_village',
        'partner2_alley',
        'partner2_road',
        'partner2_subdistrict',
        'partner2_district',
        'partner2_province',
        'partner2_phone',
        'partner2_fax',
        'other',
    ];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
