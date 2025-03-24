<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfoDetail extends Model
{
    use HasFactory;

    protected $fillable = ['basic_info_type_id', 'details'];

    public function type()
    {
        return $this->belongsTo(BasicInfoType::class, 'basic_info_type_id');
    }

    public function images()
    {
        return $this->hasMany(BasicInfoImage::class, 'basic_info_details_id');
    }

    public function pdf()
    {
        return $this->hasMany(BasicInfoPdf::class, 'basic_info_details_id');
    }
}
