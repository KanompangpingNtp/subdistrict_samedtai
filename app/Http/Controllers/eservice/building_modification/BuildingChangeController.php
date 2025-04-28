<?php

namespace App\Http\Controllers\eservice\building_modification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BuildingChange;
use App\Models\BuildingChangeFile;
use App\Models\BuildingChangeReply;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BuildingChangeController extends Controller
{
    public function BuildingChangeFormPage()
    {
        return view('eservice.users.building_modification.page');
    }

    public function BuildingChangeFormCreate(Request $request)
    {
        $request->validate([
            'written_at' => 'nullable|string',
            'full_name' => 'nullable|string',
            'is_an_individual' => 'nullable|string',
            'house_number' => 'nullable|string',
            'village' => 'nullable|string',
            'alley' => 'nullable|string',
            'road' => 'nullable|string',
            'subdistrict' => 'nullable|string',
            'district' => 'nullable|string',
            'province' => 'nullable|string',
            'option_detail' => 'nullable|string',
            'registered' => 'nullable|date',
            'registration_number' => 'nullable|string',
            'office_located' => 'nullable|string',
            'office_village' => 'nullable|string',
            'office_alley' => 'nullable|string',
            'office_road' => 'nullable|string',
            'office_subdistrict' => 'nullable|string',
            'office_district' => 'nullable|string',
            'office_province' => 'nullable|string',
            'by_name' => 'nullable|string',
            'by_house_number' => 'nullable|string',
            'by_village' => 'nullable|string',
            'by_alley' => 'nullable|string',
            'by_road' => 'nullable|string',
            'by_subdistrict' => 'nullable|string',
            'by_district' => 'nullable|string',
            'by_province' => 'nullable|string',
            'apply_for_license' => 'nullable|string',
            'apply_house_number' => 'nullable|string',
            'apply_village' => 'nullable|string',
            'apply_alley' => 'nullable|string',
            'apply_road' => 'nullable|string',
            'apply_subdistrict' => 'nullable|string',
            'apply_district' => 'nullable|string',
            'apply_province' => 'nullable|string',
            'apply_by' => 'nullable|string',
            'apply_number' => 'nullable|string',
            'it_the_land_of' => 'nullable|string',
            'building_type_1' => 'nullable|string',
            'building_num_1' => 'nullable|string',
            'building_to_1' => 'nullable|string',
            'building_Number_vehicles_1' => 'nullable|string',
            'building_type_2' => 'nullable|string',
            'building_num_2' => 'nullable|string',
            'building_to_2' => 'nullable|string',
            'building_Number_vehicles_2' => 'nullable|string',
            'building_type_3' => 'nullable|string',
            'building_num_3' => 'nullable|string',
            'building_to_3' => 'nullable|string',
            'building_Number_vehicles_3' => 'nullable|string',
            'project_supervisor' => 'nullable|string',
            'designer_and_calculator' => 'nullable|string',
            'number_of_blueprints' => 'nullable|string',
            'blueprint_set' => 'nullable|string',
            'one_set_quantity' => 'nullable|string',
            'designer_calculates' => 'nullable|string',
            'control_architecture' => 'nullable|string',
            'number' => 'nullable|string',
            'quantity' => 'nullable|string',
            'number_of_land_owners' => 'nullable|string',
            'controller' => 'nullable|string',
            'controller_2' => 'nullable|string',
            'other_documents' => 'nullable|string',
            'scheduled_for_completion' => 'nullable|string',

            'legal_name' => 'nullable|string',
            'building_type_new' => 'nullable|string|in:1,2,3',
            'title_deed_type' => 'nullable|string|in:1,2,3',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

            'according_document' => 'nullable|string',
            'individual_call' => 'nullable|string',
            'entity_calling' => 'nullable|string',


        ]);

        // dd($request);

        $buildingChange = BuildingChange::create([
            'users_id' => auth()->id(),
            'status' => 1,
            'admin_name_verifier' => $request->admin_name_verifier,
            'written_at' => $request->written_at,
            'full_name' => $request->full_name,
            'is_an_individual' => $request->is_an_individual,
            'house_number' => $request->house_number,
            'village' => $request->village,
            'alley' => $request->alley,
            'road' => $request->road,
            'subdistrict' => $request->subdistrict,
            'district' => $request->district,
            'province' => $request->province,
            'option_detail' => $request->option_detail,
            'registered' => $request->registered,
            'registration_number' => $request->registration_number,
            'office_located' => $request->office_located,
            'office_village' => $request->office_village,
            'office_alley' => $request->office_alley,
            'office_road' => $request->office_road,
            'office_subdistrict' => $request->office_subdistrict,
            'office_district' => $request->office_district,
            'office_province' => $request->office_province,
            'by_name' => $request->by_name,
            'by_house_number' => $request->by_house_number,
            'by_village' => $request->by_village,
            'by_alley' => $request->by_alley,
            'by_road' => $request->by_road,
            'by_subdistrict' => $request->by_subdistrict,
            'by_district' => $request->by_district,
            'by_province' => $request->by_province,
            'apply_for_license' => $request->apply_for_license,
            'apply_house_number' => $request->apply_house_number,
            'apply_village' => $request->apply_village,
            'apply_alley' => $request->apply_alley,
            'apply_road' => $request->apply_road,
            'apply_subdistrict' => $request->apply_subdistrict,
            'apply_district' => $request->apply_district,
            'apply_province' => $request->apply_province,
            'apply_by' => $request->apply_by,
            'apply_number' => $request->apply_number,
            'it_the_land_of' => $request->it_the_land_of,
            'building_type_1' => $request->building_type_1,
            'building_num_1' => $request->building_num_1,
            'building_to_1' => $request->building_to_1,
            'building_Number_vehicles_1' => $request->building_Number_vehicles_1,
            'building_type_2' => $request->building_type_2,
            'building_num_2' => $request->building_num_2,
            'building_to_2' => $request->building_to_2,
            'building_Number_vehicles_2' => $request->building_Number_vehicles_2,
            'building_type_3' => $request->building_type_3,
            'building_num_3' => $request->building_num_3,
            'building_to_3' => $request->building_to_3,
            'building_Number_vehicles_3' => $request->building_Number_vehicles_3,
            'project_supervisor' => $request->project_supervisor,
            'designer_and_calculator' => $request->designer_and_calculator,
            'number_of_blueprints' => $request->number_of_blueprints,
            'blueprint_set' => $request->blueprint_set,
            'one_set_quantity' => $request->one_set_quantity,
            'designer_calculates' => $request->designer_calculates,
            'control_architecture' => $request->control_architecture,
            'number' => $request->number,
            'quantity' => $request->quantity,
            'number_of_land_owners' => $request->number_of_land_owners,
            'controller' => $request->controller,
            'controller_2' => $request->controller_2,
            'other_documents' => $request->other_documents,
            'scheduled_for_completion' => $request->scheduled_for_completion,
            'legal_name' => $request->legal_name,
            'building_type_new' => $request->building_type_new,
            'title_deed_type' => $request->title_deed_type,
            'according_document' => $request->according_document,
            'individual_call' => $request->individual_call,
            'entity_calling' => $request->entity_calling,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                BuildingChangeFile::create([
                    'building_changes_id' => $buildingChange->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function BuildingChangeUsersPages()
    {
        $forms = BuildingChange::with(['user', 'buildingChangeFiles', 'buildingChangeReplies'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.building_modification.account.show-detail', compact('forms'));
    }

    public function BuildingChangeUserExportPDF($id)
    {
        $form = BuildingChange::find($id);

        $pdf = Pdf::loadView('eservice.users.building_modification.pdf-form', compact('form'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('คำร้องทะเบียนพาณิชย์' . $form->id . '.pdf');
    }

    public function BuildingChangeUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        BuildingChangeReply::create([
            'building_changes_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
