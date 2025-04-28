<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'questions_name',
    ];

    public function type()
    {
        return $this->belongsTo(QuestionsType::class, 'type_id');
    }

    public function responses()
    {
        return $this->hasMany(EvaluationResponse::class, 'question_id');
    }
}
