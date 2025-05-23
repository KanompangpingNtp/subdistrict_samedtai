<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostDetail;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\AuthorityType;
use App\Models\PersonnelAgency;
use App\Models\PublicMenusType;

class ShowDataController extends Controller
{
    public function HomeIndex()
    {
        //ข่าวประชาสัมพันธ์
        $pressRelease = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ข่าวประชาสัมพันธ์');
            })
            ->orderBy('date', 'desc')
            ->take(7)
            ->get();

        //กิจกรรม
        $activity = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'กิจกรรม');
            })
            ->orderBy('date', 'desc')
            ->take(7)
            ->get();


        //ประกาศจัดซื้อจัดจ้าง
        $procurement = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศจัดซื้อจัดจ้าง');
            })
            ->orderBy('date', 'desc')
            ->get();

        //ผลจัดซื้อจัดจ้าง
        $procurementResults = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ผลจัดซื้อจัดจ้าง');
            })
            ->orderBy('date', 'desc')
            ->get();

        //ประกาศราคากลาง
        $average = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศราคากลาง');
            })
            ->orderBy('date', 'desc')
            ->get();

        //งานเก็บรายได้
        $revenue = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'งานเก็บรายได้');
            })
            ->orderBy('date', 'desc')
            ->get();

        //จุดเช็คอินกินเที่ยว
        $checkinspot = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'จุดเช็คอินกินเที่ยว');
            })
            ->orderBy('date', 'desc')
            ->get();

        $noticeBoard = PostDetail::with('postType', 'photos')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ป้ายประกาศ');
            })
            ->orderBy('date', 'desc')
            ->get();

        //ผลการดำเนินงานเมนู
        $PerfResultsMenu = PerfResultsType::all();

        //อำนาจหน้าที่
        $AuthorityMenu = AuthorityType::all();

        //เมนูแผนงานพัฒนาท้องถิ่น
        $OperationalPlanMenu = OperationalPlanType::all();

        //กฎหมายและกฎระเบียบ
        $LawsRegsMenu = LawsRegsType::all();

        //เมนูสำหรับประชาชน
        $PublicMenus = PublicMenusType::all();

        //บุคลากร
        // $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $personnelAgencies = PersonnelAgency::with('ranks')
            ->whereIn('status', [1, 2, 3, 4, 5])
            ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
            ->get();

        return view('pages.home.app', compact(
            'pressRelease',
            'activity',
            'procurement',
            'procurementResults',
            'average',
            'revenue',
            'checkinspot',
            'noticeBoard',
            'PerfResultsMenu',
            'OperationalPlanMenu',
            'LawsRegsMenu',
            'AuthorityMenu',
            'personnelAgencies',
            'PublicMenus'
        ));
    }

    public function ShowDataButton()
    {
        return view('pages.base_data.app');
    }

    public function contact()
    {
        //ผลการดำเนินงานเมนู
        $PerfResultsMenu = PerfResultsType::all();

        //อำนาจหน้าที่
        $AuthorityMenu = AuthorityType::all();

        //เมนูแผนงานพัฒนาท้องถิ่น
        $OperationalPlanMenu = OperationalPlanType::all();

        //กฎหมายและกฎระเบียบ
        $LawsRegsMenu = LawsRegsType::all();

        //เมนูสำหรับประชาชน
        $PublicMenus = PublicMenusType::all();

        //บุคลากร
        // $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $personnelAgencies = PersonnelAgency::with('ranks')
            ->whereIn('status', [1, 2, 3, 4, 5])
            ->orderByRaw("FIELD(status, 1, 2, 3, 4, 5)")
            ->get();

        return view('pages.contact.page',compact(
            'PerfResultsMenu',
            'AuthorityMenu',
            'OperationalPlanMenu',
            'LawsRegsMenu',
            'PublicMenus',
            'personnelAgencies',
        ));
    }
}
