<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicMenusFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'files_path'
    ];

    public function section()
    {
        return $this->belongsTo(PublicMenusSection::class, 'section_id');
    }
}
