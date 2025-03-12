<?php

namespace App\Http\Controllers\operational_plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperationalPlanFile;
use App\Models\OperationalPlanSection;
use App\Models\OperationalPlanType;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\LawsRegsType;

class OperationalPlanController extends Controller
{
    public function OperationalPlanSectionPages($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();

        $OperationalPlanType = OperationalPlanType::findOrFail($id);
        $OperationalPlanSection = OperationalPlanSection::where('type_id', $id)->get();

        return view('pages.operational_plan.page_section', compact('OperationalPlanType', 'OperationalPlanSection', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }

    public function OperationalPlanShowDetailsPages($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();

        $OperationalPlanSection = OperationalPlanSection::with('type')->findOrFail($id);
        $OperationalPlanFile = OperationalPlanFile::where('section_id', $id)->get();

        return view('pages.operational_plan.page_detail', compact('OperationalPlanSection', 'OperationalPlanFile', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }
}
