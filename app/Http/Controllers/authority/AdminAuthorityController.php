<?php

namespace App\Http\Controllers\authority;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorityType;
use App\Models\AuthorityDetails;
use App\Models\AuthorityFiles;
use Illuminate\Support\Facades\Storage;

class AdminAuthorityController extends Controller
{
    public function AuthorityType()
    {
        $AuthorityType = AuthorityType::all();

        return view('admin.authority.page_type', compact('AuthorityType'));
    }

    public function AuthorityTypeCreate(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        AuthorityType::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function AuthorityTypeUpdate(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        $AuthorityType = AuthorityType::findOrFail($id);

        $AuthorityType->update([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'อัปเดตข้อมูลสำเร็จ');
    }

    public function AuthorityTypeDelete($id)
    {
        $AuthorityType = AuthorityType::findOrFail($id);
        $AuthorityType->delete();

        return redirect()->back()->with('success', 'ข้อมูลถูกลบเรียบร้อยแล้ว');
    }

    public function AuthorityShowDetail($id)
    {
        $AuthorityType = AuthorityType::findOrFail($id);
        $AuthorityDetails = AuthorityDetails::with('files')
            ->where('type_id', $id)
            ->get();

        return view('admin.authority.page_details', compact('AuthorityType', 'AuthorityDetails'));
    }

    public function AuthorityDetailCreate(Request $request, $Id)
    {
        $request->validate([
            'details' => 'nullable|string',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file|mimes:jpg,jpeg,png,pdf',
        ]);

        // dd($request);

        $AuthorityDetails = AuthorityDetails::create([
            'type_id' => $Id,
            'details' => $request->details,
        ]);

        if ($request->hasFile('file_post')) {
            foreach ($request->file('file_post') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $fileType = $file->extension();
                $folder = ($fileType == 'pdf') ? 'authority_pdf' : 'authority_image';
                $path = $file->storeAs($folder, $filename, 'public');

                AuthorityFiles::create([
                    'detail_id' => $AuthorityDetails->id,
                    'files_path' => $path,
                    'files_type' => $fileType,
                ]);
            }
        }

        return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ');
    }

    public function AuthorityDetailDelete($id)
    {
        $AuthorityDetails = AuthorityDetails::findOrFail($id);

        // ลบไฟล์ที่เกี่ยวข้อง
        $AuthorityFiles = AuthorityFiles::where('detail_id', $id)->get();
        foreach ($AuthorityFiles as $file) {
            // ลบไฟล์จาก storage
            Storage::disk('public')->delete($file->files_path);
            $file->delete();
        }

        // ลบข้อมูลหลัก
        $AuthorityDetails->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
