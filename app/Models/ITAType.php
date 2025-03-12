<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITAType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function itADetails()
    {
        return $this->hasMany(ITADetails::class, 'type_id');
    }
}
