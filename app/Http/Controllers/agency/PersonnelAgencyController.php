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
        $personnelAgencies = PersonnelAgency::with('ranks')
        ->whereIn('status', [1, 2, 3, 4, 5])
        ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
        ->get();

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

    public function PersonnelChart()
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

        return view('pages.agency.personnel_chart', compact('LawsRegsMenu','personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu','LawsRegsMenu','PublicMenus'));
    }
}
