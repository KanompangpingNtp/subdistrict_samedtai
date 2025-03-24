<?php

namespace App\Http\Controllers\authority;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorityDetails;
use App\Models\AuthorityType;
use App\Models\PersonnelAgency;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;

class AuthorityController extends Controller
{
    public function AuthorityShowDetailsPages($id)
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

        $AuthorityType = AuthorityType::findOrFail($id);
        $AuthorityDetails = AuthorityDetails::with('files')
            ->where('type_id', $id)
            ->first();

        return view('pages.authority.show_details', compact('PublicMenus','AuthorityType', 'AuthorityDetails', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }
}
