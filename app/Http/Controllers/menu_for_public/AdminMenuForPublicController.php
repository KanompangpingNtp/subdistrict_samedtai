<?php

namespace App\Http\Controllers\menu_for_public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicMenusType;
use App\Models\PublicMenusSection;
use App\Models\PublicMenusFiles;
use Illuminate\Support\Facades\Storage;

class AdminMenuForPublicController extends Controller
{
    public function MenuForPublicType()
    {
        $PublicMenusType = PublicMenusType::all();

        return view('admin.menu_for_public.page_type', compact('PublicMenusType'));
    }

    public function MenuForPublicTypeCreate(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        PublicMenusType::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function MenuForPublicUpdate(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        $PublicMenusType = PublicMenusType::findOrFail($id);

        $PublicMenusType->update([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'อัปเดตข้อมูลสำเร็จ');
    }

    public function MenuForPublicDelete($id)
    {
        $PublicMenusType = PublicMenusType::findOrFail($id);

        $PublicMenusType->delete();

        return redirect()->back()->with('success', 'ข้อมูลถูกลบเรียบร้อยแล้ว');
    }

    public function MenuForPublicShowSection($id)
    {
        $PublicMenusType = PublicMenusType::findOrFail($id);
        $PublicMenusSection = PublicMenusSection::where('type_id', $id)->get();

        return view('admin.menu_for_public.page_section', compact('PublicMenusType', 'PublicMenusSection'));
    }

    public function MenuForPublicSectionCreate(Request $request, $TypeId)
    {
        $request->validate([
            'section_name' => 'required|string',
        ]);

        // dd($request);

        PublicMenusSection::create([
            'type_id' => $TypeId,
            'section_name' => $request->section_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function MenuForPublicSectionUpdate(Request $request, $TypeId)
    {
        $request->validate([
            'section_name' => 'required|string',
        ]);

        $PublicMenusSection = PublicMenusSection::findOrFail($TypeId);

        $PublicMenusSection->update([
            'section_name' => $request->section_name,
        ]);

        return redirect()->back()->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function MenuForPublicSectionDelete($id)
    {
        $PublicMenusSection = PublicMenusSection::findOrFail($id);
        $PublicMenusSection->delete();

        return redirect()->back()->with('success', 'โพสถูกลบแล้ว');
    }

    public function MenuForPublicShowDetails($id)
    {
        $PublicMenusSection = PublicMenusSection::findOrFail($id);
        $PublicMenusFiles = PublicMenusFiles::where('section_id', $id)->get();

        return view('admin.menu_for_public.page_detail', compact('PublicMenusSection', 'PublicMenusFiles'));
    }

    public function MenuForPublicDetailCreate(Request $request, $DetailsId)
    {
        $request->validate([
            'files_path.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx', // max size 2MB
        ]);

        if ($request->hasFile('files_path')) {
            foreach ($request->file('files_path') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('operational_plan_file', $filename, 'public');

                PublicMenusFiles::create([
                    'section_id' => $DetailsId,
                    'files_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function MenuForPublicDetailDelete($fileId)
    {
        $file = PublicMenusFiles::findOrFail(id: $fileId);

        if (Storage::exists($file->files_path)) {
            Storage::delete($file->files_path);
        }

        $file->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
