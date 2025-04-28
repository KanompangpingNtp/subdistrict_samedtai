<?php

namespace App\Http\Controllers\eservice\food_storage_license;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodStorageInformations;
use App\Models\FoodStorageFormDetails;
use App\Models\FoodStorageFormFiles;
use App\Models\FoodStorageFormReplies;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FoodStorageLicenseController extends Controller
{
    public function FoodStorageLicenseFormPage()
    {
        return view('eservice.users.food_storage_license.page');
    }

    public function FoodStorageLicenseFormCreate(Request $request)
    {
        $request->validate([
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // dd($request);

        $FoodStorageInformations = FoodStorageInformations::create([
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

        $FoodStorageFormDetails = FoodStorageFormDetails::create([
            'informations_id' => $FoodStorageInformations->id,
            'comfirm_option' => $request->comfirm_option,
            'confirm_volume' => $request->confirm_volume,
            'confirm_number' => $request->confirm_number,
            'confirm_year' => $request->confirm_year,
            'confirm_expiration_date' => $request->confirm_expiration_date,
            'place_name' => $request->place_name,
            'shop_type' => $request->shop_type,
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
            'number_of_cooks' => $request->number_of_cooks,
            'number_of_food' => $request->number_of_food,
            'including_food_handlers' => $request->including_food_handlers,
            'number_of_trainees' => $request->number_of_trainees,
            'opening_hours' => $request->opening_hours,
            'opening_for_business_until' => $request->opening_for_business_until,
            'total_hours' => $request->total_hours,
            'document_option' => json_encode($request->document_option),
            'document_option_detail' => $request->document_option_detail,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $optionKey => $file) {
                $documentType = str_replace('option', '', $optionKey);

                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                FoodStorageFormFiles::create([
                    'informations_id' => $FoodStorageInformations->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                    'document_type' => $documentType,
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function FoodStorageLicenseShowDetails()
    {
        $forms = FoodStorageInformations::with(['user', 'files', 'replies', 'details'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.food_storage_license.account.show-detail', compact('forms'));
    }

    public function FoodStorageLicenseUserExportPDF($id)
    {
        $form = FoodStorageInformations::with('details')->find($id);

        $details = $form->details->first();
        $document_option = $details->document_option ?? [];

        if (is_string($document_option)) {
            $document_option = json_decode($document_option, true);
        }

        $document_option = is_array($document_option) ? $document_option : [];

        $pdf = Pdf::loadView(
            'eservice.users.food_storage_license.pdf-form',
            compact('form', 'document_option')
        )->setPaper('A4', 'portrait');

        return $pdf->stream('pdf' . $form->id . '.pdf');
    }

    public function FoodStorageLicenseUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);

        FoodStorageFormReplies::create([
            'informations_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
