<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
    ];

    public function details()
    {
        return $this->hasMany(AuthorityDetails::class, 'type_id');
    }
}
