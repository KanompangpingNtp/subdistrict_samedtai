<?php

namespace App\Http\Controllers\laws_and_regulations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LawsRegsType;
use App\Models\LawsRegsSection;
use App\Models\LawsRegsFiles;

class LawsAndRegulationsController extends Controller
{
    public function LawsAndRegulationsSectionPages($id)
    {
        $LawsRegsType = LawsRegsType::findOrFail($id);
        $LawsRegsSection = LawsRegsSection::where('type_id', $id)->get();

        return view('pages.laws_and_regulations.page_section', compact('LawsRegsMenu','LawsRegsType', 'LawsRegsSection', 'personnelAgencies','AuthorityDetails','OperationalPlanMenu','PerfResultsMenu'));
    }

    public function LawsAndRegulationsShowDetailsPages($id)
    {
        $LawsRegsSection = LawsRegsSection::with('type')->findOrFail($id);
        $LawsRegsFiles = LawsRegsFiles::where('section_id', $id)->get();

        return view('pages.laws_and_regulations.page_detail', compact('LawsRegsMenu','LawsRegsSection', 'LawsRegsFiles', 'personnelAgencies','AuthorityDetails','OperationalPlanMenu','PerfResultsMenu'));
    }
}
