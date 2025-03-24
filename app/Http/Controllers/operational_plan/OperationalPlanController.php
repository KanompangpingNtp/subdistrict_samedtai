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
use App\Models\PublicMenusType;

class OperationalPlanController extends Controller
{
    public function OperationalPlanSectionPages($id)
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

        $OperationalPlanType = OperationalPlanType::findOrFail($id);
        $OperationalPlanSection = OperationalPlanSection::where('type_id', $id)->get();

        return view('pages.operational_plan.page_section', compact('PublicMenus','OperationalPlanType', 'OperationalPlanSection', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }

    public function OperationalPlanShowDetailsPages($id)
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

        $OperationalPlanSection = OperationalPlanSection::with('type')->findOrFail($id);
        $OperationalPlanFile = OperationalPlanFile::where('section_id', $id)->get();

        return view('pages.operational_plan.page_detail', compact('PublicMenus','OperationalPlanSection', 'OperationalPlanFile', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }
}
