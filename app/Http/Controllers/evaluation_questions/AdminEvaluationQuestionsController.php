<?php

namespace App\Http\Controllers\evaluation_questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evaluator;
use App\Models\EvaluationResponse;

class AdminEvaluationQuestionsController extends Controller
{
    public function AdminQuestions(Request $request)
    {
        $year = $request->input('year'); // ปีที่เลือก

        $responsesQuery = EvaluationResponse::with('question', 'evaluator');

        if ($year) {
            $responsesQuery->whereYear('date', $year);
        }

        $responses = $responsesQuery
        ->orderBy('created_at', 'desc')
        ->get();

        // คะแนนรวมแต่ละข้อ ตามปีที่เลือก
        $scoresByQuestion = EvaluationResponse::select('question_id')
            ->selectRaw('SUM(score) as total_score')
            ->when($year, function ($query) use ($year) {
                $query->whereYear('date', $year);
            })
            ->groupBy('question_id')
            ->with('question')
            ->get();

        // ดึงปีที่มีข้อมูลใน EvaluationResponse
        $yearsWithData = EvaluationResponse::selectRaw('YEAR(date) as year')
            ->groupBy('year')
            ->pluck('year')
            ->toArray();

        return view('admin.evaluation_questions.page', compact('responses', 'scoresByQuestion', 'year', 'yearsWithData'));
    }

    public function AdminShowEvaluator($id)
    {
        $evaluator = Evaluator::with('responses', 'question')->findOrFail($id);

        return view('admin.evaluation_questions.details', compact('evaluator'));
    }
}
