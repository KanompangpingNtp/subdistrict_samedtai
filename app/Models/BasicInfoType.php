<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInfoType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function details()
    {
        return $this->hasMany(ListDetail::class, 'basic_info_type_id');
    }
}
