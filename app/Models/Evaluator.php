<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_name',
        'address',
        'phone_number',
        'service_provider',
        'requesting_service',
        'other_suggestions'
    ];

    public function responses()
    {
        return $this->hasMany(EvaluationResponse::class, 'evaluator_id');
    }

    public function question()
    {
        return $this->belongsTo(EvaluationQuestion::class, 'question_id');
    }
}
