<?php

namespace App\Http\Controllers\menu_for_public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicMenusType;
use App\Models\PublicMenusSection;
use App\Models\PublicMenusFiles;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;

class MenuForPublicController extends Controller
{
    public function MenuForPublicSectionPages($id)
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

        $PublicMenusType = PublicMenusType::findOrFail($id);
        $PublicMenusSection = PublicMenusSection::where('type_id', $id)->get();

        return view('pages.menu_for_public.page_section', compact(
            'LawsRegsMenu',
            'PublicMenus',
            'PublicMenusType',
            'PublicMenusSection',
            'personnelAgencies',
            'OperationalPlanMenu',
            'PerfResultsMenu',
            'PublicMenus'
        ));
    }

    public function MenuForPublicShowDetailsPages($id)
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

        $PublicMenusSection = PublicMenusSection::with('type')->findOrFail($id);
        $PublicMenusFiles = PublicMenusFiles::where('section_id', $id)->get();

        return view('pages.menu_for_public.page_detail', compact(
            'LawsRegsMenu',
            'PublicMenus',
            'PublicMenusSection',
            'PublicMenusFiles',
            'personnelAgencies',
            'OperationalPlanMenu',
            'PerfResultsMenu',
            'PublicMenus'
        ));
    }
}
