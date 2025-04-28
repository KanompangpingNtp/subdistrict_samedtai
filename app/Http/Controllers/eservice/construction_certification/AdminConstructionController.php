<?php

namespace App\Http\Controllers\eservice\construction_certification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuildBuilding;
use App\Models\BuildBuildingReply;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminConstructionController extends Controller
{
    public function TableCertificationAdminPages()
    {
        $forms = BuildBuilding::with(['user', 'files', 'replies'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('eservice.admin.construction_certification.show-data', compact('forms'));
    }

    public function CertificationAdminExportPDF($id)
    {
        $form = BuildBuilding::find($id);

        $pdf = Pdf::loadView('eservice.users.construction_certification.pdf-form', compact('form'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('คำขอรับรองสิ่งปลูกสร้างอาคาร' . $form->id . '.pdf');
    }

    public function CertificationAdminReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        BuildBuildingReply::create([
            'build_building_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

    public function CertificationUpdateStatus($id)
    {
        $form = BuildBuilding::findOrFail($id);

        $form->status = 2;
        $form->admin_name_verifier = Auth::user()->name;
        $form->save();

        return redirect()->back()->with('success', 'คุณได้กดรับแบบฟอร์มเรียบร้อยแล้ว');
    }
}
