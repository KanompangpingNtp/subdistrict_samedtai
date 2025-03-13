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
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();

        //กิจกรรม
        $activity = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'กิจกรรม');
            })
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();


        //ประกาศจัดซื้อจัดจ้าง
        $procurement = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศจัดซื้อจัดจ้าง');
            })->get();

        //ผลจัดซื้อจัดจ้าง
        $procurementResults = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ผลจัดซื้อจัดจ้าง');
            })->get();

        //ประกาศราคากลาง
        $average = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศราคากลาง');
            })->get();

        //งานเก็บรายได้
        $revenue = PostDetail::with('postType', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'งานเก็บรายได้');
            })->get();

        //จุดเช็คอินกินเที่ยว
        $checkinspot = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'จุดเช็คอินกินเที่ยว');
            })->get();

        $noticeBoard = PostDetail::with('postType', 'photos')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ป้ายประกาศ');
            })->get();

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
        $personnelAgencies = PersonnelAgency::with('ranks')->get();

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
}
