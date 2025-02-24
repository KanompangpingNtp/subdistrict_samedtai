<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfResultsMinorDetail extends Model
{
    use HasFactory;

    protected $fillable = ['perf_results_detail_id', 'detail_name'];

    public function detail()
    {
        return $this->belongsTo(PerfResultsDetail::class, 'perf_results_detail_id');
    }

    public function files()
    {
        return $this->hasMany(PerfResultsMinorFile::class);
    }
}
