<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRegistryFile extends Model
{
    use HasFactory;

    protected $fillable = ['trade_registries_id', 'file_path', 'file_type'];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class, 'trade_registries_id');
    }
}
