<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
    ];

    public function evaluationQuestions()
    {
        return $this->hasMany(EvaluationQuestion::class, 'type_id');
    }
}
