<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITADetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'number_ita',
        'title_name',
        'detail'
    ];

    public function itaType()
    {
        return $this->belongsTo(ITAType::class, 'type_id');
    }

    public function itaLinks()
    {
        return $this->hasMany(ITALink::class, 'detail_id');
    }
}
