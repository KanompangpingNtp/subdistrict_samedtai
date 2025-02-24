<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfSingleTopicFile extends Model
{
    use HasFactory;

    protected $fillable = ['perf_single_topic_id', 'file_path', 'file_type'];

    public function perfSingleTopic()
    {
        return $this->belongsTo(PerfSingleTopic::class);
    }
}
