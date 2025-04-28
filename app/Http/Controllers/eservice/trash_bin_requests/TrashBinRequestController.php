<?php

namespace App\Http\Controllers\eservice\trash_bin_requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrashBinRequest;
use App\Models\TrashBinRequestFiles;
use App\Models\TrashBinRequestReply;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrashBinRequestController extends Controller
{
    public function TrashBinRequestPage()
    {
        return view('eservice.users.trash_bin_requests.page-form');
    }

    public function TrashBinRequestFormCreate(Request $request)
    {
        $request->validate([
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // dd($request);

        $Form = TrashBinRequest::create([
            'users_id' => auth()->id(),
            'status' => 1,
            'written_at' => $request->written_at,
            'date_written' => $request->date_written,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'village' => $request->village,
            'nearby_places' => $request->nearby_places,
            'contact_number' => $request->contact_number,
            'canon_options' => json_encode($request->canon_options),
            'option1_amount' => $request->option1_amount,
            'option1_month' => $request->option1_month,
            'option2_amount' => $request->option2_amount,
            'option2_month' => $request->option2_month,
            'option3_amount' => $request->option3_amount,
            'option3_month' => $request->option3_month,
            'option4_detail' => $request->option4_detail,
            'document_options' => json_encode($request->document_options),
            'document_options1_detail' => $request->document_options1_detail,
            'document_options3_detail' => $request->document_options3_detail,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'position' => $request->position,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('trash_bin_requests-files', $filename, 'public');

                TrashBinRequestFiles::create([
                    'trash_bin_id' => $Form->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function TrashBinRequestShowDetails()
    {
        $forms = TrashBinRequest::with(['user', 'files', 'replies'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.trash_bin_requests.account.show-detail', compact('forms'));
    }

    public function TrashBinRequestUserExportPDF($id)
    {
        $form = TrashBinRequest::find($id);

        $pdf = Pdf::loadView('eservice.users.trash_bin_requests.pdf-form', compact('form'))->setPaper('A4', 'portrait');

        return $pdf->stream('แบบคำร้องขอใช้ถังขยะ' . $form->id . '.pdf');
    }

    public function TrashBinRequestUserReply(Request $request, $formId)
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
}
