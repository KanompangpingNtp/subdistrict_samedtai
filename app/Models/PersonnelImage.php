<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelImage extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_detail_id', 'post_photo_file'];

    public function detail()
    {
        return $this->belongsTo(PersonnelDetail::class);
    }
}
