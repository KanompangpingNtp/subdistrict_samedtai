<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRegistryReply extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'trade_registries_id', 'reply_text', 'reply_date'];

    public function tradeRegistry()
    {
        return $this->belongsTo(TradeRegistry::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
