<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'details_id',
        'file_path',
        'file_type',
    ];

    public function detail()
    {
        return $this->belongsTo(ForumDetail::class, 'details_id');
    }
}
