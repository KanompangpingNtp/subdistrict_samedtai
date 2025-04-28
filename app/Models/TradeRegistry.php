<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRegistry extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'status',
        'admin_name_verifier',
        'business_registration',
        'register_change_items',
        'register_change_number',
        'register_change_date',
        'business_termination',
        'business_termination_detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function files()
    {
        return $this->hasMany(TradeRegistryFile::class, 'trade_registries_id');
    }

    public function replies()
    {
        return $this->hasMany(TradeRegistryReply::class, 'trade_registries_id');
    }

    public function tradeCopyLocation()
    {
        return $this->hasMany(TradeCopyLocation::class, 'trade_registries_id');
    }

    public function tradeEntrepreneur()
    {
        return $this->hasMany(TradeEntrepreneur::class, 'trade_registries_id');
    }

    public function tradeLocationMore()
    {
        return $this->hasMany(TradeLocationMore::class, 'trade_registries_id');
    }

    public function tradeShareCapital()
    {
        return $this->hasMany(TradeShareCapital::class, 'trade_registries_id');
    }

    public function tradeShareValue()
    {
        return $this->hasMany(TradeShareValue::class, 'trade_registries_id');
    }
}
