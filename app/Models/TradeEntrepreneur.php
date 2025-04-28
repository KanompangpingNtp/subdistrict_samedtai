<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeEntrepreneur extends Model
{
    use HasFactory;


    protected $fillable = [
        'trade_registries_id',
        'trade_entrepreneur_name',
        'trade_entrepreneur_age',
        'trade_entrepreneur_ethnicity',
        'trade_entrepreneur_nationality',
        'trade_entrepreneur_address_number',
        'trade_entrepreneur_village',
        'trade_entrepreneur_alley',
        'trade_entrepreneur_road',
        'trade_entrepreneur_subdistrict',
        'trade_entrepreneur_district',
        'trade_entrepreneur_province',
        'trade_entrepreneur_phone',
        'trade_entrepreneur_fax',
        'business_thai_language',
        'business_foreign_language',
        'commercial_type1',
        'commercial_type2',
        'commercial_type3',
        'commercial_type4',
        'capital_amount',
        'capital_amount_detaill',
        'salutation'
    ];

    // กำหนดความสัมพันธ์กับโมเดล TradeRegistry (หนึ่งต่อหนึ่ง)
    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
