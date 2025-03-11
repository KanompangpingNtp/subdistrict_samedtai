<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorityFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_id',
        'files_path',
        'files_type'
    ];

    public function details()
    {
        return $this->belongsTo(AuthorityDetails::class, 'detail_id');
    }
}
