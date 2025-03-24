<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfoPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'basic_info_details_id',
        'pdf_file',
    ];

    public function detail()
    {
        return $this->belongsTo(BasicInfoDetail::class, 'basic_info_details_id');
    }
}
