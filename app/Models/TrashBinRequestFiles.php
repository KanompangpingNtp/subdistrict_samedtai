<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashBinRequestFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'trash_bin_id',
        'file_path',
        'file_type'
    ];

    public function trashBinRequest()
    {
        return $this->belongsTo(TrashBinRequest::class, 'trash_bin_id');
    }
}
