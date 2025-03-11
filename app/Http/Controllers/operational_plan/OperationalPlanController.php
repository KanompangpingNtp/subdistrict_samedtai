<?php

namespace App\Http\Controllers\operational_plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperationalPlanFile;
use App\Models\OperationalPlanSection;
use App\Models\OperationalPlanType;

class OperationalPlanController extends Controller
{
    public function OperationalPlanSectionPages($id)
    {

        $OperationalPlanType = OperationalPlanType::findOrFail($id);
        $OperationalPlanSection = OperationalPlanSection::where('type_id', $id)->get();

        return view('pages.operational_plan.page_section', compact('OperationalPlanType','OperationalPlanSection'));
    }

    public function OperationalPlanShowDetailsPages($id)
    {

        $OperationalPlanSection = OperationalPlanSection::with('type')->findOrFail($id);
        $OperationalPlanFile = OperationalPlanFile::where('section_id', $id)->get();

        return view('pages.operational_plan.page_detail', compact('OperationalPlanSection','OperationalPlanFile'));
    }
}
