<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicMenusSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'section_name'

    ];

    public function type()
    {
        return $this->belongsTo(PublicMenusType::class, 'type_id');
    }

    public function files()
    {
        return $this->hasMany(PublicMenusFiles::class, 'section_id');
    }
}
