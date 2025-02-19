<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostType;
use App\Models\PostDetail;
use App\Models\PostPhoto;
use Illuminate\Support\Facades\Storage;

class CheckinSpotController extends Controller
{
    public function CheckinSpotHome()
    {
        $postTypes = PostType::all();

        $postTypeId = $postTypes->firstWhere('type_name', 'จุดเช็คอินกินเที่ยว')->id;

        $postDetails = PostDetail::with('postType', 'pdfs')
            ->where('post_type_id', $postTypeId)
            ->get();

        return view('admin.post.checkin_spot.page', compact('postDetails', 'postTypes'));
    }

    public function CheckinSpotCreate(Request $request)
    {
        $request->validate([
            'post_type_id' => 'required|exists:post_types,id',
            'topic_name' => 'nullable|string|max:255',
            'details' => 'nullable|string|max:255',
            'title_image' => 'file|mimes:jpg,jpeg,png',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file|mimes:jpg,jpeg,png|max:10240',
        ]);

        // dd($request);

        $postDetail = PostDetail::create([
            'post_type_id' => $request->post_type_id,
            'topic_name' => $request->topic_name,
            'details' => $request->details,
        ]);

        if ($request->hasFile('title_image')) {
            $file = $request->file('title_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photo_title', $filename, 'public');

            PostPhoto::create([
                'post_detail_id' => $postDetail->id,
                'post_photo_file' => $path,
                'post_photo_status' => '1',
            ]);
        }

        if ($request->hasFile('file_post')) {
            $hasValidFile = false; // ตัวแปรตรวจสอบว่ามีไฟล์ที่ตรงเงื่อนไขหรือไม่

            foreach ($request->file('file_post') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {
                    $path = $file->storeAs('photo', $filename, 'public');

                    PostPhoto::create([
                        'post_detail_id' => $postDetail->id,
                        'post_photo_file' => $path,
                        'post_photo_status' => '2',
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

    public function CheckinSpotDelete($id)
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

    public function CheckinSpotShowData()
    {
        $checkinspot = PostDetail::with('postType', 'videos', 'photos', 'pdfs')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'จุดเช็คอินกินเที่ยว');
            })->paginate(14);

        return view('pages.checkin_spot.show_data', compact('checkinspot'));
    }

    public function CheckinSpotShowDetails($id)
    {
        $checkinspot = PostDetail::with(['postType', 'videos', 'photos', 'pdfs'])
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'จุดเช็คอินกินเที่ยว');
            })
            ->findOrFail($id);

        return view('pages.checkin_spot.show_detail', compact('checkinspot'));
    }
}
