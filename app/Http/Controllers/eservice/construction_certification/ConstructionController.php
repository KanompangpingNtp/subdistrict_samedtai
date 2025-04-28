<?php

namespace App\Http\Controllers\eservice\construction_certification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuildBuilding;
use App\Models\BuildBuildingFile;
use App\Models\BuildBuildingReply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ConstructionController extends Controller
{
    public function UserCertificationFormPage ()
    {
        return view('eservice.users.construction_certification.page');
    }

    public function CertificationFormCreate(Request $request)
    {
        $request->validate([
            'write_the_date' => 'nullable|date',
            'subject' => 'nullable|string|max:255',
            'salutation' => 'nullable|string|max:50',
            'full_name' => 'nullable|string|max:255',
            'house_number' => 'nullable|string|max:50',
            'village' => 'nullable|string|max:50',
            'alley' => 'nullable|string|max:50',
            'road' => 'nullable|string|max:50',
            'subdistrict' => 'nullable|string|max:50',
            'district' => 'nullable|string|max:50',
            'province' => 'nullable|string|max:50',
            'have_intention' => 'nullable|string|max:255',
            'have_to' => 'nullable|string|max:255',
            'land_title_number' => 'nullable|string|max:50',
            'volume' => 'nullable|string|max:50',
            'page' => 'nullable|string|max:50',
            'village_area' => 'nullable|string|max:50',
            'subdistrict_area' => 'nullable|string|max:50',
            'district_area' => 'nullable|string|max:50',
            'province_area' => 'nullable|string|max:50',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $buildBuilding = BuildBuilding::create([
            'users_id' => auth()->id(),
            'status' => 1,
            'write_the_date' => $request->write_the_date,
            'subject' => $request->subject,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'house_number' => $request->house_number,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'have_intention' => $request->have_intention,
            'have_to' => $request->have_to,
            'land_title_number' => $request->land_title_number,
            'volume' => $request->volume,
            'page' => $request->page,
            'village_area' => $request->village_area,
            'subdistrict_area' => $request->subdistrict_area,
            'district_area' => $request->district_area,
            'province_area' => $request->province_area,
        ]);

           if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                BuildBuildingFile::create([
                    'build_building_id' => $buildBuilding->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function TableCertificationUsersPages()
    {
        $forms = BuildBuilding::with(['user', 'files', 'replies'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.construction_certification.account.show-detail', compact('forms'));
    }

    public function CertificationUserExportPDF($id)
    {
        $form = BuildBuilding::find($id);

        $pdf = Pdf::loadView('eservice.users.construction_certification.pdf-form', compact('form'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('คำขอรับรองสิ่งปลูกสร้างอาคาร' . $form->id . '.pdf');
    }

    public function CertificationUserReply(Request $request, $formId)
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
}
