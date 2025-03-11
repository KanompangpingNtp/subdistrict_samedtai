<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorityDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'details'

    ];

    public function type()
    {
        return $this->belongsTo(AuthorityType::class, 'type_id');
    }

    public function files()
    {
        return $this->hasMany(AuthorityFiles::class, 'detail_id');
    }
}
