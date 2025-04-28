<?php

namespace App\Http\Controllers\forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ForumDetail;
use App\Models\ForumFile;
use App\Models\ForumComment;
use Illuminate\Support\Facades\Storage;

class AdminForumController extends Controller
{
    public function ForumAdminPages()
    {
        $forumDetail = ForumDetail::with(['user', 'comments', 'files'])->paginate(10);

        return view('admin.forum.app', compact('forumDetail'));
    }

    public function ForumAdminDeatils($id)
    {
        $forumDeatils = ForumDetail::with('user', 'comments', 'files')->findOrFail($id);

        $comments = $forumDeatils->comments()->paginate(perPage: 10);

        return view('admin.forum.details.app', compact(
            'forumDeatils',
            'comments'
        ));
    }

    public function ForumAdminCommentsCreate(Request $request, $id)
    {
        $request->validate([
            'comments_details' => 'required|string',
        ]);

        // dd($request);

        ForumComment::create([
            'details_id' => $id,
            'user_id' => auth()->id(),
            'comments_details' => $request->comments_details,
        ]);

        return redirect()->back()->with('success', 'สร้างคอมเม้นกระดานกระทู้สำเร็จ');
    }

    public function ForumAdminDetailsDelete($id)
    {
        // ค้นหากระทู้
        $forumDetail = ForumDetail::findOrFail($id);

        // ลบไฟล์ที่เกี่ยวข้อง
        $forumFiles = ForumFile::where('details_id', $forumDetail->id)->get();

        foreach ($forumFiles as $file) {
            if (Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }
            $file->delete();
        }

        ForumComment::where('details_id', $forumDetail->id)->delete();

        // ลบกระทู้
        $forumDetail->delete();

        return redirect()->back()->with('success', 'ลบกระทู้และคอมเมนต์เรียบร้อยแล้ว');
    }
}
