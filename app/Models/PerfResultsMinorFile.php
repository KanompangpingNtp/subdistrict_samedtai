<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfResultsMinorFile extends Model
{
    use HasFactory;

    protected $fillable = ['perf_results_minor_detail_id', 'file_path', 'file_type'];

    public function minorDetail()
    {
        return $this->belongsTo(PerfResultsMinorDetail::class, 'perf_results_minor_detail_id');
    }
}
