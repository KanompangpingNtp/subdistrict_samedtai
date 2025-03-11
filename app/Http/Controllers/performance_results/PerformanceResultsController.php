<?php

namespace App\Http\Controllers\performance_results;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerfResultsType;
use App\Models\PerfResultsSection;
use App\Models\PerfResultsSubTopic;
use App\Models\PerfResultsFile;
use Illuminate\Support\Facades\Storage;

class PerformanceResultsController extends Controller
{
    public function PerformanceResultsSectionPages($id)
    {
        $PerfResultsType = PerfResultsType::findOrFail($id);
        $PerfResultsSection = PerfResultsSection::where('type_id', $id)->get();

        return view('pages.performance_results.page_section', compact('PerfResultsType','PerfResultsSection'));
    }

    public function PerfResultsSubTopicPages($id)
    {
        $PerfResultsSection = PerfResultsSection::with('type')->findOrFail($id);
        $PerfResultsSubTopic = PerfResultsSubTopic::where('section_id', $id)->get();

        return view('pages.performance_results.page_sub_topic', compact('PerfResultsSection','PerfResultsSubTopic'));
    }

    public function PerfResultsShowDetailsPages($id)
    {
        $PerfResultsSubTopic = PerfResultsSubTopic::with('section.type')->findOrFail($id);
        $PerfResultsFile = PerfResultsFile::where('sub_topic_id', $id)->get();

        return view('pages.performance_results.page_detail', compact('PerfResultsSubTopic','PerfResultsFile'));
    }
}
