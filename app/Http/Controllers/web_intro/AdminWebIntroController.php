<?php

namespace App\Http\Controllers\web_intro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebIntro;

class AdminWebIntroController extends Controller
{
    public function AdminWebIntro()
    {
        $Image = WebIntro::all();

        return view('admin.post.web_intro.page', compact('Image'));
    }

    public function WebIntroCreate(Request $request)
    {
        $request->validate([
            'files_path' => 'file|mimes:jpg,jpeg,png',
            'button_name' => 'nullable|string',
            'button_link' => 'nullable|url',
        ]);

        // dd( $request);

        if ($request->hasFile('files_path')) {
            $file = $request->file('files_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('web_intro_file', $filename, 'public');

            $fileType = $file->getClientMimeType();

            WebIntro::create([
                'files_path' => $path,
                'files_type' => $fileType,
                'button_name' => $request->button_name,
                'button_link' => $request->button_link,
            ]);
        }

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function WebIntroDelete($id)
    {
        $webIntro = WebIntro::findOrFail($id);

        if (file_exists(public_path('storage/' . $webIntro->files_path))) {
            unlink(public_path('storage/' . $webIntro->files_path)); // ลบไฟล์
        }

        $webIntro->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
