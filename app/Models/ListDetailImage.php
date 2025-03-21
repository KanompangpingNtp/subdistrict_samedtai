<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDetailImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_details_id',
        'images_file',
        'status',
    ];

    public function listDetail()
    {
        return $this->belongsTo(ListDetail::class, 'list_details_id');
    }
}
