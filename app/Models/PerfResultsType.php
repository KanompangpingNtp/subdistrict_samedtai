<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfResultsType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function details()
    {
        return $this->hasMany(PerfResultsDetail::class);
    }

    public function singleTopicFile()
    {
        return $this->hasMany(PerfResultsDetail::class);
    }
}
