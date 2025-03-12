<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITALink extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_id',
        'url_name',
        'url_link'
    ];

    public function itaDetail()
    {
        return $this->belongsTo(ITADetails::class, 'detail_id');
    }
}
