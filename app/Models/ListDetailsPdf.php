<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDetailsPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_details_id',
        'pdf_file',
        'status',
    ];

    public function listDetails()
    {
        return $this->belongsTo(ListDetail::class, 'list_details_id');
    }
}
