<?php

namespace App\Http\Controllers\ITA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ITADetails;
use App\Models\ITAType;
use App\Models\ITALink;

class AdminITAController extends Controller
{
    public function  AdminITAType()
    {
        $showITAType = ITAType::all();

        return view('admin.post.ita.page_type', compact('showITAType'));
    }

    public function ITATypeCreate(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        // dd($request);

        ITAType::create([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function ITATypeUpdate(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string',
        ]);

        $ITAType = ITAType::findOrFail($id);
        $ITAType->update([
            'type_name' => $request->type_name,
        ]);

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อยแล้ว!');
    }

    public function ITATypeDelete($id)
    {
        $ITAType = ITAType::find($id);
        $ITAType->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }

    public function AdminITA($id)
    {
        $ITAType = ITAType::findOrFail($id);
        $ITADetails = ITADetails::with('iTALinks')->where('type_id', $id)->get();

        return view('admin.post.ita.ita_page', compact('ITAType', 'ITADetails'));
    }

    public function ITACreate(Request $request, $TypeId)
    {
        $request->validate([
            'number_ita' => 'nullable|string',
            'title_name' => 'required|string',
            'detail' => 'nullable|string',
            'url_name' => 'array', // ตรวจสอบว่าเป็นอาร์เรย์
            'url_name.*' => 'nullable|string', // ตรวจสอบแต่ละค่าภายในอาร์เรย์
            'url_link' => 'array',
            'url_link.*' => 'nullable|string|url',
        ]);

        // dd($request);

        // สร้างข้อมูลหลักใน i_t_a_details
        $itaDetail = ITADetails::create([
            'type_id' => $TypeId,
            'number_ita' => $request->number_ita,
            'title_name' => $request->title_name,
            'detail' => $request->detail,
        ]);

        // ตรวจสอบว่ามี URL ส่งมาหรือไม่
        if ($request->has('url_name') && $request->has('url_link')) {
            foreach ($request->url_name as $index => $urlName) {
                // ตรวจสอบว่ามีข้อมูลของ url_name หรือ url_link หรือไม่
                if (!empty($urlName) || !empty($request->url_link[$index])) {
                    ITALink::create([
                        'detail_id' => $itaDetail->id,
                        'url_name' => $urlName,
                        'url_link' => $request->url_link[$index],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'สร้างข้อมูลสำเร็จ');
    }

    public function ITAUpdate(Request $request, $detailId)
    {
        $request->validate([
            'number_ita' => 'nullable|string',
            'title_name' => 'required|string',
            'url_name' => 'array',
            'url_name.*' => 'nullable|string',
            'url_link' => 'array',
            'url_link.*' => 'nullable|string|url',
            'detail' => 'nullable|string',
        ]);

        $postDetail = ITADetails::with('iTALinks')->findOrFail($detailId);

        // อัปเดตข้อมูลของ postDetail
        $postDetail->update([
            'number_ita' => $request->number_ita,
            'title_name' => $request->title_name,
            'detail' => $request->detail,
        ]);

        if ($request->has('url_name') && $request->has('url_link')) {
            foreach ($request->url_name as $index => $urlName) {
                $urlLink = $request->url_link[$index];

                // ตรวจสอบว่าเป็นข้อมูลใหม่หรือไม่ (ไม่มี id)
                if (empty($request->url_id[$index])) {
                    // ถ้าไม่มี url_id ให้ create ข้อมูลใหม่
                    if (!empty($urlName) || !empty($urlLink)) {
                        ITALink::create([
                            'detail_id' => $postDetail->id,
                            'url_name' => $urlName,
                            'url_link' => $urlLink
                        ]);
                    }
                } else {

                    $link = ITALink::where('detail_id', $postDetail->id)
                        ->where('id', $request->input('url_id')[$index])
                        ->first();

                    if ($link) {
                        $link->update([
                            'url_name' => $urlName,  // อัปเดตชื่อ URL
                            'url_link' => $urlLink   // อัปเดตลิงก์
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'แก้ไขข้อมูลเรียบร้อยแล้ว!');
    }

    public function destroy($id)
    {
        $iTALink = ITALink::findOrFail($id);
        $iTALink->delete();

        return response()->json(['success' => true]);
    }

    public function ITADelete($id)
    {
        $detail = ITADetails::find($id);
        $detail->delete();

        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
