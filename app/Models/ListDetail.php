<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'basic_info_type_id',
        'list_details_name',
        'details',
    ];

    public function type()
    {
        return $this->belongsTo(BasicInfoType::class, 'basic_info_type_id');
    }

    public function images()
    {
        return $this->hasMany(ListDetailImage::class, 'list_details_id');
    }

    public function pdf()
    {
        return $this->hasMany(ListDetailsPdf::class, 'list_details_id');
    }
}
