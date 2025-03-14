<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostType;
use App\Models\PostDetail;
use App\Models\PostPdf;
use Illuminate\Support\Facades\Storage;
use App\Models\PersonnelAgency;
use App\Models\AuthorityType;
use App\Models\PerfResultsType;
use App\Models\OperationalPlanType;
use App\Models\LawsRegsType;
use App\Models\PublicMenusType;

class AveragePriceController extends Controller
{
    //
    public function AveragePriceHome()
    {
        $postTypes = PostType::all();

        $postTypeId = $postTypes->firstWhere('type_name', 'ประกาศราคากลาง')->id;
        $postDetails = PostDetail::with('postType', 'pdfs')
            ->where('post_type_id', $postTypeId)
            ->get();

        return view('admin.post.average_price.average_price', compact('postDetails', 'postTypes'));
    }

    public function AveragePriceCreate(Request $request)
    {
        $request->validate([
            'post_type_id' => 'required|exists:post_types,id',
            'date' => 'nullable|date',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file', // ตรวจสอบขนาดไฟล์
            'title_name' => 'nullable|string',
        ]);

        $postDetail = PostDetail::create([
            'post_type_id' => $request->post_type_id,
            'date' => $request->date,
            'title_name' => $request->title_name,
        ]);

        // ตรวจสอบและอัปโหลดไฟล์ PDF
        if ($request->hasFile('file_post')) {
            foreach ($request->file('file_post') as $file) {
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->with('error', 'รองรับเฉพาะไฟล์ PDF เท่านั้น!');
                }

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('pdf', $filename, 'public');

                PostPdf::create([
                    'post_detail_id' => $postDetail->id,
                    'post_pdf_file' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'ไฟล์ประกาศถูกเพิ่มแล้ว!');
    }

    public function AveragePriceUpdate(Request $request, $id)
    {
        $request->validate([
            'date' => 'nullable|date',
            'title_name' => 'nullable|string',
            'file_post' => 'nullable|array',
            'file_post.*' => 'file|mimes:pdf|max:2048',
            'delete_files' => 'nullable|array',
            'delete_files.*' => 'exists:post_pdfs,id',
        ]);

        $postDetail = PostDetail::findOrFail($id);

        // อัปเดตข้อมูลทั่วไป
        $postDetail->update([
            'date' => $request->date,
            'title_name' => $request->title_name,
        ]);

        // ลบไฟล์ที่ถูกเลือก
        if ($request->delete_files) {
            $filesToDelete = PostPdf::whereIn('id', $request->delete_files)->get();
            foreach ($filesToDelete as $file) {
                // ลบไฟล์ออกจาก Storage
                Storage::disk('public')->delete($file->post_pdf_file);
                // ลบข้อมูลในฐานข้อมูล
                $file->delete();
            }
        }

        // อัปโหลดไฟล์ใหม่ถ้ามี
        if ($request->hasFile('file_post')) {
            foreach ($request->file('file_post') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('pdf', $filename, 'public');

                PostPdf::create([
                    'post_detail_id' => $postDetail->id,
                    'post_pdf_file' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'แก้ไขประกาศสำเร็จ!');
    }

    public function AveragePriceDelete($id)
    {
        $postDetail = PostDetail::findOrFail($id);
        $postPdfs = $postDetail->pdfs;

        foreach ($postPdfs as $pdfs) {
            if (Storage::exists('public/' . $pdfs->post_pdf_file)) {
                Storage::delete('public/' . $pdfs->post_pdf_file);
            }
        }

        $postDetail->delete();

        return redirect()->back()->with('success', 'โพสถูกลบแล้ว');
    }

    public function AveragePriceDetail($id)
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $AveragePrice = PostDetail::with(['pdfs'])
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศราคากลาง');
            })->findOrFail($id);

        return view('pages.average_price.show_detail', compact(
            'AveragePrice',
            'personnelAgencies',
            'PerfResultsMenu',
            'AuthorityMenu',
            'OperationalPlanMenu',
            'LawsRegsMenu',
            'PublicMenus'
        ));
    }

    public function AveragePriceShowData()
    {
        $personnelAgencies = PersonnelAgency::with('ranks')->get();
        $PerfResultsMenu = PerfResultsType::all();
        $AuthorityMenu = AuthorityType::all();
        $OperationalPlanMenu = OperationalPlanType::all();
        $LawsRegsMenu = LawsRegsType::all();
        $PublicMenus = PublicMenusType::all();

        $AveragePrice = PostDetail::with('postType','photos')
            ->whereHas('postType', function ($query) {
                $query->where('type_name', 'ประกาศราคากลาง');
            })->paginate(14);

        return view('pages.average_price.show_data', compact(
            'AveragePrice',
            'personnelAgencies',
            'PerfResultsMenu',
            'AuthorityMenu',
            'OperationalPlanMenu',
            'LawsRegsMenu',
            'PublicMenus'
        ));
    }
}
