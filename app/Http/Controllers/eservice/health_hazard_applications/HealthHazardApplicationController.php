<?php

namespace App\Http\Controllers\eservice\health_hazard_applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthLicenseApp;
use App\Models\HealthLicenseDetail;
use App\Models\HealthLicenseFiles;
use App\Models\HealthLicenseReplies;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class HealthHazardApplicationController extends Controller
{
    public function HealthHazardApplicationFormPage()
    {
        return view('eservice.users.health_hazard_applications.page');
    }

    public function HealthHazardApplicationFormCreate(Request $request)
    {
        $request->validate([
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // dd($request);

        $HealthLicenseApp = HealthLicenseApp::create([
            'users_id' => auth()->id(),
            'form_status' => 1,
            'title_name' => $request->title_name,
            'salutation' => $request->salutation,
            'full_name' => $request->full_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'id_card_number' => $request->id_card_number,
            'address' => $request->address,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
        ]);

        $HealthLicenseDetail = HealthLicenseDetail::create([
            'health_license_id' => $HealthLicenseApp->id,
            'type_request' => $request->type_request,
            'petition' => $request->petition,
            'name_establishment' => $request->name_establishment,
            'location' => $request->location,
            'details_village' => $request->details_village,
            'details_alley' => $request->details_alley,
            'details_road' => $request->details_road,
            'details_subdistrict' => $request->details_subdistrict,
            'details_district' => $request->details_district,
            'details_province' => $request->details_province,
            'details_telephone' => $request->details_telephone,
            'details_fax' => $request->details_fax,
            'business_area' => $request->business_area,
            'machine_power' => $request->machine_power,
            'number_male_workers' => $request->number_male_workers,
            'number_female_workers' => $request->number_female_workers,
            'opening_hours' => $request->opening_hours,
            'opening_for_business_until' => $request->opening_for_business_until,
            'document_option' => json_encode($request->document_option),
            'document_option_detail' => $request->document_option_detail,
            // 'status' => 1,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $optionKey => $file) {
                $documentType = str_replace('option', '', $optionKey);

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                HealthLicenseFiles::create([
                    'health_license_id' => $HealthLicenseApp->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                    'document_type' => $documentType,
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function HealthHazardApplicationShowDetails()
    {
        $forms = HealthLicenseApp::with(['user', 'files', 'replies', 'details'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.health_hazard_applications.account.show-detail', compact('forms'));
    }

    public function HealthHazardApplicationUserExportPDF($id)
    {
        $form = HealthLicenseApp::with('details')->find($id);

        $document_option = $form->details->first()->document_option ?? [];
        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $pdf = Pdf::loadView(
            'eservice.users.health_hazard_applications.pdf-form',
            compact('form', 'document_option')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function HealthHazardApplicationUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);

        HealthLicenseReplies::create([
            'health_license_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
