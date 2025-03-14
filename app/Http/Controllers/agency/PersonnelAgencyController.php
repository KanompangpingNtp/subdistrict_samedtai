<?php

namespace App\Http\Controllers\agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonnelAgency;
use App\Models\PersonnelGroupPhoto;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;

class PersonnelAgencyController extends Controller
{
    public function AgencyShow($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $agency = PersonnelAgency::with('ranks.details.images')->findOrFail($id);
        $photos = PersonnelGroupPhoto::whereIn('personnel_rank_id', $agency->ranks->pluck('id'))->get();

        preg_match('/(.*?)(\d{2,}-\d{3,}-\d{4,})/', $agency->phone, $matches);
        $text = trim($matches[1] ?? '');
        $phone = trim($matches[2] ?? '');

        return view('pages.agency.show', compact('PublicMenus','agency', 'photos', 'text', 'phone' ,'personnelAgencies','PerfResultsMenu','AuthorityMenu','OperationalPlanMenu','LawsRegsMenu'));
    }

    // public function PersonnelChart()
    // {
    //     $personnelAgencies = PersonnelAgency::with('ranks')->get();

    //     $AuthorityInfoType = BasicInfoType::where('type_name', 'อำนาจหน้าที่')->first();
    //     $AuthorityDetails = ListDetail::where('basic_info_type_id', $AuthorityInfoType->id)->get();

    //     $PerfResultsMenu = PerfResultsType::all();
    //     $OperationalPlanMenu = OperationalPlanType::all();
    //     $LawsRegsMenu = LawsRegsType::all();

    //     return view('pages.agency.personnel_chart', compact('LawsRegsMenu','personnelAgencies', 'AuthorityDetails', 'OperationalPlanMenu', 'PerfResultsMenu'));
    // }
}
