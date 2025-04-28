<?php

namespace App\Http\Controllers\evaluation_questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;
use App\Models\QuestionsType;
use App\Models\Evaluator;
use App\Models\EvaluationResponse;

class EvaluationQuestionsController extends Controller
{
    public function QuestionsPage()
    {
        $personnelAgencies = PersonnelAgency::with('ranks')
        ->whereIn('status', [1, 2, 3, 4, 5])
        ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
        ->get();

        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $questionGroups = QuestionsType::with('evaluationQuestions')->get();

        return view('pages.evaluation_questions.page', compact(
            'personnelAgencies',
            'PerfResultsMenu',
            'AuthorityMenu',
            'OperationalPlanMenu',
            'LawsRegsMenu',
            'PublicMenus',
            'questionGroups'
        ));
    }

    public function EvaluationQuestionsCreate(Request $request)
    {
        // dd($request);

        $Evaluator = Evaluator::create([
            'requester_name' => $request->requester_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'service_provider' => $request->service_provider,
            'requesting_service' => $request->requesting_service,
            'other_suggestions' => $request->other_suggestions
        ]);

        foreach ($request->responses as $questionId => $score) {
            EvaluationResponse::create([
                'question_id' => $questionId,
                'score' => $score,
                'date' => now(),
                'evaluator_id' => $Evaluator->id,
            ]);
        }

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }
}
