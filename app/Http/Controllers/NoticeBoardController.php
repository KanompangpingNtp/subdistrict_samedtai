<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostType;
use App\Models\PostDetail;
use App\Models\PostPhoto;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;
use Illuminate\Support\Facades\Storage;

class NoticeBoardController extends Controller
{
    public function NoticeBoardHome()
    {
        $postTypes = PostType::all();

        $postTypeId = $postTypes->firstWhere('type_name', 'ป้ายประกาศ')->id;

        $postDetails = PostDetail::with('postType', 'pdfs')
            ->where('post_type_id', $postTypeId)
            ->get();

        return view('admin.post.notice_board.page', compact('postDetails', 'postTypes'));
    }

    public function NoticeBoardCreate(Request $request)
    {
        $request->validate([
            'post_type_id' => 'required|exists:post_types,id',
            'topic_name' => 'nullable|string|max:255',
        ]);

        // dd($request);

        $postDetail = PostDetail::create([
            'post_type_id' => $request->post_type_id,
            'topic_name' => $request->topic_name,
        ]);

        if ($request->hasFile('file_post')) {
            $hasValidFile = false; // ตัวแปรตรวจสอบว่ามีไฟล์ที่ตรงเงื่อนไขหรือไม่

            foreach ($request->file('file_post') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
                    $path = $file->storeAs('photo', $filename, 'public');

                    PostPhoto::create([
                        'post_detail_id' => $postDetail->id,
                        'post_photo_file' => $path,
                        'post_photo_status' => '1',
                    ]);

                    $hasValidFile = true; // พบไฟล์ที่ตรงเงื่อนไข
                }
            }

            if (!$hasValidFile) {
                return redirect()->back()->with('error', 'โพสถูกเพิ่มแล้ว แต่ไม่มีไฟล์รูปภาพที่ถูกต้อง!');
            }
        } else {
            return redirect()->back()->with('error', 'กรุณาอัพโหลดไฟล์รูปภาพ!');
        }

        return redirect()->back()->with('success', 'โพสถูกเพิ่มแล้ว!');
    }

    public function NoticeBoardDelete($id)
    {
        $postDetail = PostDetail::find($id);

        if (!$postDetail) {
            return redirect()->back()->with('error', 'ไม่พบโพสที่ต้องการลบ');
        }

        $postPhotos = PostPhoto::where('post_detail_id', $id)->get();

        foreach ($postPhotos as $postPhoto) {

            if (Storage::exists('public/' . $postPhoto->post_photo_file)) {
                Storage::delete('public/' . $postPhoto->post_photo_file);
            }

            $postPhoto->delete();
        }

        $postDetail->delete();

        return redirect()->back()->with('success', 'โพสถูกลบแล้ว');
    }

    public function NoticeBoardShowData()
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $noticeBoard = PostDetail::with('postType', 'photos')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ป้ายประกาศ');
            })->paginate(14);

        return view('pages.notice_board.show_data', compact('PublicMenus','noticeBoard', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }

    public function NoticeBoardShowDetails($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $noticeBoard = PostDetail::with(['postType', 'photos'])
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ป้ายประกาศ');
            })
            ->findOrFail($id);

        return view('pages.notice_board.show_detail', compact('PublicMenus','noticeBoard', 'personnelAgencies', 'PerfResultsMenu', 'AuthorityMenu', 'OperationalPlanMenu', 'LawsRegsMenu'));
    }
}
