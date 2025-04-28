<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashBinRequestReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'trash_bin_id',
        'users_id',
        'reply_text',
        'reply_date'
    ];

    public function trashBinRequest()
    {
        return $this->belongsTo(TrashBinRequest::class, 'trash_bin_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
