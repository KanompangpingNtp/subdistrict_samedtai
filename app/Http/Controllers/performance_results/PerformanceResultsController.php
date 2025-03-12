<?php

namespace App\Http\Controllers\performance_results;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerfResultsType;
use App\Models\PerfResultsSection;
use App\Models\PerfResultsSubTopic;
use App\Models\PerfResultsFile;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;

class PerformanceResultsController extends Controller
{
    public function PerformanceResultsSectionPages($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
$PerfResultsMenu = PerfResultsType::all();
$AuthorityMenu = AuthorityType::all();
$OperationalPlanMenu = OperationalPlanType::all();
$LawsRegsMenu = LawsRegsType::all();

        $PerfResultsType = PerfResultsType::findOrFail($id);
        $PerfResultsSection = PerfResultsSection::where('type_id', $id)->get();

        return view('pages.performance_results.page_section', compact('PerfResultsType','PerfResultsSection','personnelAgencies','PerfResultsMenu','AuthorityMenu','OperationalPlanMenu','LawsRegsMenu'));
    }

    public function PerfResultsSubTopicPages($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
$PerfResultsMenu = PerfResultsType::all();
$AuthorityMenu = AuthorityType::all();
$OperationalPlanMenu = OperationalPlanType::all();
$LawsRegsMenu = LawsRegsType::all();

        $PerfResultsSection = PerfResultsSection::with('type')->findOrFail($id);
        $PerfResultsSubTopic = PerfResultsSubTopic::where('section_id', $id)->get();

        return view('pages.performance_results.page_sub_topic', compact('PerfResultsSection','PerfResultsSubTopic','personnelAgencies','PerfResultsMenu','AuthorityMenu','OperationalPlanMenu','LawsRegsMenu'));
    }

    public function PerfResultsShowDetailsPages($id)
    {
        $PerfResultsSubTopic = PerfResultsSubTopic::with('section.type')->findOrFail($id);
        $PerfResultsFile = PerfResultsFile::where('sub_topic_id', $id)->get();

        return view('pages.performance_results.page_detail', compact('PerfResultsSubTopic','PerfResultsFile'));
    }
}
