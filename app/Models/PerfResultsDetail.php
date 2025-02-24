<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfResultsDetail extends Model
{
    use HasFactory;

    protected $fillable = ['perf_results_type_id', 'detail_name'];

    public function type()
    {
        return $this->belongsTo(PerfResultsType::class, 'perf_results_type_id');
    }

    public function minorDetails()
    {
        return $this->hasMany(PerfResultsMinorDetail::class);
    }
}
