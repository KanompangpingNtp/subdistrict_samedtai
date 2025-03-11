<?php

namespace App\Http\Controllers\operational_plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OperationalPlanType;
use App\Models\OperationalPlanSection;
use App\Models\OperationalPlanFile;
use Illuminate\Support\Facades\Storage;

class AdminOperationalPlanController extends Controller
{
    public function OperationalPlanType()
    {
        $OperationalPlanType = OperationalPlanType::all();

        return view('admin.operational_plan.page_type', compact('OperationalPlanType'));
    }

    public function OperationalPlanTypeCreate(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        OperationalPlanType::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function OperationalPlanUpdate(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        $OperationalPlanType = OperationalPlanType::findOrFail($id);

        $OperationalPlanType->update([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'อัปเดตข้อมูลสำเร็จ');
    }

    public function OperationalPlanDelete($id)
    {
        $OperationalPlanType = OperationalPlanType::findOrFail($id);

        $OperationalPlanType->delete();

        return redirect()->back()->with('success', 'ข้อมูลถูกลบเรียบร้อยแล้ว');
    }

    public function OperationalPlanShowSection($id)
    {
        $OperationalPlanType = OperationalPlanType::findOrFail($id);
        $OperationalPlanSection = OperationalPlanSection::where('type_id', $id)->get();

        return view('admin.operational_plan.page_section', compact('OperationalPlanType', 'OperationalPlanSection'));
    }

    public function OperationalPlanSectionCreate(Request $request, $TypeId)
    {
        $request->validate([
            'section_name' => 'required|string',
        ]);

        // dd($request);

        OperationalPlanSection::create([
            'type_id' => $TypeId,
            'section_name' => $request->section_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function OperationalPlanSectionUpdate(Request $request, $TypeId)
    {
        $request->validate([
            'section_name' => 'required|string',
        ]);

        $OperationalPlanSection = OperationalPlanSection::findOrFail($TypeId);

        $OperationalPlanSection->update([
            'section_name' => $request->section_name,
        ]);

        return redirect()->back()->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }

    public function OperationalPlanSectionDelete($id)
    {
        $OperationalPlanSection = OperationalPlanSection::findOrFail($id);
        $OperationalPlanSection->delete();

        return redirect()->back()->with('success', 'โพสถูกลบแล้ว');
    }

    public function OperationalPlanShowDetails($id)
    {
        $OperationalPlanSection = OperationalPlanSection::findOrFail($id);
        $OperationalPlanFile = OperationalPlanFile::where('section_id', $id)->get();

        return view('admin.operational_plan.page_detail', compact('OperationalPlanSection', 'OperationalPlanFile'));
    }

    public function OperationalPlanDetailCreate(Request $request, $DetailsId)
    {
        // Validate the files
        $request->validate([
            'files_path.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx', // max size 2MB
        ]);

        if ($request->hasFile('files_path')) {
            foreach ($request->file('files_path') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('operational_plan_file', $filename, 'public');

                // Create record in the database
                OperationalPlanFile::create([
                    'section_id' => $DetailsId,
                    'files_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function OperationalPlanDetailDelete($fileId)
    {
        // ค้นหาไฟล์ที่ต้องการลบจากฐานข้อมูล
        $file = OperationalPlanFile::findOrFail(id: $fileId);

        // ลบไฟล์จาก storage
        if (Storage::exists($file->files_path)) {
            Storage::delete($file->files_path);
        }

        // ลบข้อมูลไฟล์จากฐานข้อมูล
        $file->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
