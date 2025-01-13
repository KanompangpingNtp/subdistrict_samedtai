<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostType;
use App\Models\PostDetail;
use App\Models\PostPdf;
use App\Models\PostPhoto;
use App\Models\PostVideo;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    //
    public function ActivityHome()
    {
        $postTypes = PostType::all();

        $postTypeId = $postTypes->firstWhere('type_name', 'กิจกรรม')->id;
        $postDetails = PostDetail::with('postType','photos','pdfs','videos')
            ->where('post_type_id', $postTypeId)
            ->get();

        return view('admin.post.activity.activity', compact('postDetails', 'postTypes'));
    }

    public function ActivityCreate(Request $request)
    {
        $request->validate([
            'post_type_id' => 'required|exists:post_types,id',
            'date' => 'nullable|date',
            'title_name' => 'nullable|string|max:255',
            'topic_name' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'title_image' => 'file|mimes:jpg,jpeg,png',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file|mimes:jpg,jpeg,png,pdf',
            'file_video' => 'nullable|file|mimes:mp4,avi,mov,wmv',
        ]);

        // dd($request);

        $postDetail = PostDetail::create([
            'post_type_id' => $request->post_type_id,
            'date' => $request->date,
            'title_name' => $request->title_name,
            'topic_name' => $request->topic_name,
            'details' => $request->details,
            'title_details' => $request->title_details,
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
            foreach ($request->file('file_post') as $file) {

                $filename = time() . '_' . $file->getClientOriginalName();

                if ($file->getClientOriginalExtension() == 'pdf') {

                    $path = $file->storeAs('pdf', $filename, 'public');

                    PostPdf::create([
                        'post_detail_id' => $postDetail->id,
                        'post_pdf_file' => $path,
                    ]);
                } elseif (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) {

                    $path = $file->storeAs('photo', $filename, 'public');

                    PostPhoto::create([
                        'post_detail_id' => $postDetail->id,
                        'post_photo_file' => $path,
                        'post_photo_status' => '2',
                    ]);
                } else {
                    continue;
                }
            }
        }

        if ($request->hasFile('file_video')) {
            $file = $request->file('file_video');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('videos', $filename, 'public');

            PostVideo::create([
                'post_detail_id' => $postDetail->id,
                'post_video_file' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'โพสถูกเพิ่มแล้ว!');
    }

    public function ActivityDelete($id)
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

        $postPdfs = PostPdf::where('post_detail_id', $id)->get();
        foreach ($postPdfs as $postPdf) {
            if (Storage::exists('public/' . $postPdf->post_pdf_file)) {
                Storage::delete('public/' . $postPdf->post_pdf_file);
            }
            $postPdf->delete();
        }

        $postVideos = PostVideo::where('post_detail_id', $id)->get();
        foreach ($postVideos as $postVideo) {
            if (Storage::exists('public/' . $postVideo->post_video_file)) {
                Storage::delete('public/' . $postVideo->post_video_file);
            }
            $postVideo->delete();
        }

        $postDetail->delete();

        return redirect()->back()->with('success', 'โพสถูกลบเรียบร้อยแล้ว!');
    }

    public function ActivityUpdate(Request $request, $id)
    {
        $request->validate([
            'date' => 'nullable|date',
            'title_name' => 'nullable|string|max:255',
            'topic_name' => 'nullable|string|max:255',
            'details' => 'nullable|string',
        ]);

        $postDetail = PostDetail::findOrFail($id);
        $postDetail->update([
            'date' => $request->date,
            'title_name' => $request->title_name,
            'topic_name' => $request->topic_name,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อยแล้ว!');
    }
}
