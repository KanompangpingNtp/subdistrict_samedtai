<?php

namespace App\Http\Controllers\eservice\trash_bin_requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrashBinRequest;
use App\Models\TrashBinRequestReply;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AdminTrashBinRequestController extends Controller
{
    public function TrashBinRequestAdminShowData()
    {
        $forms = TrashBinRequest::with(['user', 'files', 'replies'])->get();

        return view('eservice.admin.trash_bin_requests.show-data', compact('forms'));
    }

    public function TrashBinRequestAdminExportPDF($id)
    {
        $form = TrashBinRequest::find($id);

        $pdf = Pdf::loadView('eservice.users.trash_bin_requests.pdf-form', compact('form'))->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำร้องขอใช้ถังขยะ' . $form->id . '.pdf');
    }

    public function TrashBinRequestAdminReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        TrashBinRequestReply::create([
            'trash_bin_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }

    public function TrashBinRequestUpdateStatus($id)
    {
        $form = TrashBinRequest::findOrFail($id);

        $form->status = 2;
        $form->admin_name_verifier = Auth::user()->name;
        $form->save();

        return redirect()->back()->with('success', 'คุณได้กดรับแบบฟอร์มเรียบร้อยแล้ว');
    }
}
