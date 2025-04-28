<?php

namespace App\Http\Controllers\eservice\commercial_registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TradeRegistry;
use App\Models\TradeRegistryFile;
use App\Models\TradeRegistryReply;
use App\Models\TradeEntrepreneur;
use App\Models\TradeLocationMore;
use App\Models\TradeCopyLocation;
use App\Models\TradeShareCapital;
use App\Models\TradeShareValue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class TradeRegistryController extends Controller
{
    public function TradeRegistryFormPage()
    {
        return view('eservice.users.commercial_registration.page');
    }

    public function TradeRegistryFormCreate(Request $request)
    {
        $request->validate([
            'business_registration' => 'nullable|boolean',
            'register_change_items' => 'nullable|boolean',
            'register_change_number' => 'nullable|string|max:255',
            'register_change_date' => 'nullable|date',
            'business_termination' => 'nullable|boolean',
            'business_termination_detail' => 'nullable|string|max:255',

            'trade_entrepreneur_name' => 'nullable|string|max:255',
            'trade_entrepreneur_age' => 'nullable|string|max:255',
            'trade_entrepreneur_ethnicity' => 'nullable|string|max:255',
            'trade_entrepreneur_nationality' => 'nullable|string|max:255',
            'trade_entrepreneur_address_number' => 'nullable|string|max:255',
            'trade_entrepreneur_village' => 'nullable|string|max:255',
            'trade_entrepreneur_alley' => 'nullable|string|max:255',
            'trade_entrepreneur_road' => 'nullable|string|max:255',
            'trade_entrepreneur_subdistrict' => 'nullable|string|max:255',
            'trade_entrepreneur_district' => 'nullable|string|max:255',
            'trade_entrepreneur_province' => 'nullable|string|max:255',
            'trade_entrepreneur_phone' => 'nullable|string|max:255',
            'trade_entrepreneur_fax' => 'nullable|string|max:255',
            'business_thai_language' => 'nullable|string|max:255',
            'business_foreign_language' => 'nullable|string|max:255',
            'commercial_type1' => 'nullable|string|max:255',
            'commercial_type2' => 'nullable|string|max:255',
            'commercial_type3' => 'nullable|string|max:255',
            'commercial_type4' => 'nullable|string|max:255',
            'capital_amount' => 'nullable|string|max:255',
            'capital_amount_detaill' => 'nullable|string|max:255',

            'location_address_number' => 'nullable|string|max:255',
            'location_village' => 'nullable|string|max:255',
            'location_alley' => 'nullable|string|max:255',
            'location_road' => 'nullable|string|max:255',
            'location_subdistrict' => 'nullable|string|max:255',
            'location_district' => 'nullable|string|max:255',
            'location_province' => 'nullable|string|max:255',
            'location_phone' => 'nullable|string|max:255',
            'location_fax' => 'nullable|string|max:255',

            'manager_name' => 'nullable|string|max:255',
            'manager_age' => 'nullable|string|max:255',
            'manager_nationality' => 'nullable|string|max:255',
            'manager_address_number' => 'nullable|string|max:255',
            'manager_village' => 'nullable|string|max:255',
            'manager_alley' => 'nullable|string|max:255',
            'manager_road' => 'nullable|string|max:255',
            'manager_subdistrict' => 'nullable|string|max:255',
            'manager_district' => 'nullable|string|max:255',
            'manager_province' => 'nullable|string|max:255',
            'manager_phone' => 'nullable|string|max:255',
            'manager_fax' => 'nullable|string|max:255',

            'start_date' => 'nullable|string|max:255',
            'date_registration' => 'nullable|string|max:255',

            'accepting_commercial_name' => 'nullable|string|max:255',
            'accepting_commercial_nationality' => 'nullable|string|max:255',
            'accepting_commercial_address_number' => 'nullable|string|max:255',
            'accepting_commercial_village' => 'nullable|string|max:255',
            'accepting_commercial_alley' => 'nullable|string|max:255',
            'accepting_commercial_road' => 'nullable|string|max:255',
            'accepting_commercial_subdistrict' => 'nullable|string|max:255',
            'accepting_commercial_district' => 'nullable|string|max:255',
            'accepting_commercial_province' => 'nullable|string|max:255',
            'accepting_commercial_phone' => 'nullable|string|max:255',
            'accepting_commercial_fax' => 'nullable|string|max:255',

            'copy_location_address_number' => 'nullable|string',
            'copy_location_village' => 'nullable|string',
            'copy_location_alley' => 'nullable|string',
            'copy_location_road' => 'nullable|string',
            'copy_location_subdistrict' => 'nullable|string',
            'copy_location_district' => 'nullable|string',
            'copy_location_province' => 'nullable|string',
            'copy_location_phone' => 'nullable|string',
            'copy_location_fax' => 'nullable|string',

            'warehouse_location_address_number' => 'nullable|string',
            'warehouse_location_village' => 'nullable|string',
            'warehouse_location_alley' => 'nullable|string',
            'warehouse_location_road' => 'nullable|string',
            'warehouse_location_subdistrict' => 'nullable|string',
            'warehouse_location_district' => 'nullable|string',
            'warehouse_location_province' => 'nullable|string',
            'warehouse_location_phone' => 'nullable|string',
            'warehouse_location_fax' => 'nullable|string',

            'agent_name' => 'nullable|string',
            'agent_nationality' => 'nullable|string',
            'agent_address_number' => 'nullable|string',
            'agent_village' => 'nullable|string',
            'agent_alley' => 'nullable|string',
            'agent_road' => 'nullable|string',
            'agent_subdistrict' => 'nullable|string',
            'agent_district' => 'nullable|string',
            'agent_province' => 'nullable|string',
            'agent_phone' => 'nullable|string',
            'agent_fax' => 'nullable|string',

            'number_partners' => 'nullable|string',
            'share_capital1_name' => 'nullable|string',
            'share_capital1_age' => 'nullable|string',
            'share_capital1_ethnicity' => 'nullable|string',
            'share_capital1_nationality' => 'nullable|string',
            'share_capital1_address_number' => 'nullable|string',
            'share_capital1_village' => 'nullable|string',
            'share_capital1_alley' => 'nullable|string',
            'share_capital1_road' => 'nullable|string',
            'share_capital1_subdistrict' => 'nullable|string',
            'share_capital1_district' => 'nullable|string',
            'share_capital1_province' => 'nullable|string',
            'share_capital1_phone' => 'nullable|string',
            'share_capital1_fax' => 'nullable|string',
            'share_capital1_invest_with' => 'nullable|string',
            'share_capital1_quantity' => 'nullable|string',
            'share_capital2_name' => 'nullable|string',
            'share_capital2_age' => 'nullable|string',
            'share_capital2_ethnicity' => 'nullable|string',
            'share_capital2_nationality' => 'nullable|string',
            'share_capital2_address_number' => 'nullable|string',
            'share_capital2_village' => 'nullable|string',
            'share_capital2_alley' => 'nullable|string',
            'share_capital2_road' => 'nullable|string',
            'share_capital2_subdistrict' => 'nullable|string',
            'share_capital2_district' => 'nullable|string',
            'share_capital2_province' => 'nullable|string',
            'share_capital2_phone' => 'nullable|string',
            'share_capital2_fax' => 'nullable|string',
            'share_capital2_invest_with' => 'nullable|string',
            'share_capital2_quantity' => 'nullable|string',
            'share_capital3_name' => 'nullable|string',
            'share_capital3_age' => 'nullable|string',
            'share_capital3_ethnicity' => 'nullable|string',
            'share_capital3_nationality' => 'nullable|string',
            'share_capital3_address_number' => 'nullable|string',
            'share_capital3_village' => 'nullable|string',
            'share_capital3_alley' => 'nullable|string',
            'share_capital3_road' => 'nullable|string',
            'share_capital3_subdistrict' => 'nullable|string',
            'share_capital3_district' => 'nullable|string',
            'share_capital3_province' => 'nullable|string',
            'share_capital3_phone' => 'nullable|string',
            'share_capital3_fax' => 'nullable|string',
            'share_capital3_invest_with' => 'nullable|string',
            'share_capital3_quantity' => 'nullable|string',

            'registration_point' => 'nullable|string|max:255',
            'divided_into' => 'nullable|string|max:255',
            'value_per_share' => 'nullable|string|max:255',
            'nationality1' => 'nullable|string|max:255',
            'holding_shares1' => 'nullable|string|max:255',
            'nationality2' => 'nullable|string|max:255',
            'holding_shares2' => 'nullable|string|max:255',
            'nationality3' => 'nullable|string|max:255',
            'holding_shares3' => 'nullable|string|max:255',
            'nationality4' => 'nullable|string|max:255',
            'holding_shares4' => 'nullable|string|max:255',
            'many_partners' => 'nullable|string|max:255',

            'partner1_name' => 'nullable|string|max:255',
            'partner1_age' => 'nullable|string|max:255',
            'partner1_ethnicity' => 'nullable|string|max:255',
            'partner1_nationality' => 'nullable|string|max:255',
            'partner1_address_number' => 'nullable|string|max:255',
            'partner1_village' => 'nullable|string|max:255',
            'partner1_alley' => 'nullable|string|max:255',
            'partner1_road' => 'nullable|string|max:255',
            'partner1_subdistrict' => 'nullable|string|max:255',
            'partner1_district' => 'nullable|string|max:255',
            'partner1_province' => 'nullable|string|max:255',
            'partner1_phone' => 'nullable|string|max:255',
            'partner1_fax' => 'nullable|string|max:255',

            'partner2_name' => 'nullable|string|max:255',
            'partner2_age' => 'nullable|string|max:255',
            'partner2_ethnicity' => 'nullable|string|max:255',
            'partner2_nationality' => 'nullable|string|max:255',
            'partner2_address_number' => 'nullable|string|max:255',
            'partner2_village' => 'nullable|string|max:255',
            'partner2_alley' => 'nullable|string|max:255',
            'partner2_road' => 'nullable|string|max:255',
            'partner2_subdistrict' => 'nullable|string|max:255',
            'partner2_district' => 'nullable|string|max:255',
            'partner2_province' => 'nullable|string|max:255',
            'partner2_phone' => 'nullable|string|max:255',
            'partner2_fax' => 'nullable|string|max:255',

            'other' => 'nullable|string',

            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf',

            'accepting_commercial_name_used' => 'nullable|string|max:255', // ชื่อที่ใช้ในการประกอบพาณิชยกิจ
            'accepting_commercial_transferred' => 'nullable|date', // วันที่โอนการประกอบพาณิชยกิจ
            'accepting_commercial_cause' => 'nullable|string|max:255', // สาเหตุการประกอบพาณิชยกิจ

            'salutation' => 'nullable|string|max:255',
        ]);

        // dd($request);

        $TradeRegistry = TradeRegistry::create([
            'users_id' => auth()->id(),
            'status' => 1,
            'business_registration' => $request->business_registration,
            'register_change_items' => $request->register_change_items,
            'register_change_number' => $request->register_change_number,
            'register_change_date' => $request->register_change_date,
            'business_termination' => $request->business_termination,
            'business_termination_detail' => $request->business_termination_detail,
        ]);

        $TradeEntrepreneur = TradeEntrepreneur::create([
            'trade_registries_id' => $TradeRegistry->id,
            'salutation' => $request->salutation,
            'trade_entrepreneur_name' => $request->trade_entrepreneur_name,
            'trade_entrepreneur_age' => $request->trade_entrepreneur_age,
            'trade_entrepreneur_ethnicity' => $request->trade_entrepreneur_ethnicity,
            'trade_entrepreneur_nationality' => $request->trade_entrepreneur_nationality,
            'trade_entrepreneur_address_number' => $request->trade_entrepreneur_address_number,
            'trade_entrepreneur_village' => $request->trade_entrepreneur_village,
            'trade_entrepreneur_alley' => $request->trade_entrepreneur_alley,
            'trade_entrepreneur_road' => $request->trade_entrepreneur_road,
            'trade_entrepreneur_subdistrict' => $request->trade_entrepreneur_subdistrict,
            'trade_entrepreneur_district' => $request->trade_entrepreneur_district,
            'trade_entrepreneur_province' => $request->trade_entrepreneur_province,
            'trade_entrepreneur_phone' => $request->trade_entrepreneur_phone,
            'trade_entrepreneur_fax' => $request->trade_entrepreneur_fax,
            'business_thai_language' => $request->business_thai_language,
            'business_foreign_language' => $request->business_foreign_language,
            'commercial_type1' => $request->commercial_type1,
            'commercial_type2' => $request->commercial_type2,
            'commercial_type3' => $request->commercial_type3,
            'commercial_type4' => $request->commercial_type4,
            'capital_amount' => $request->capital_amount,
            'capital_amount_detaill' => $request->capital_amount_detaill,
        ]);

        $tradeLocationMore = TradeLocationMore::create([
            'trade_registries_id' => $TradeRegistry->id,
            'location_address_number' => $request->location_address_number,
            'location_village' => $request->location_village,
            'location_alley' => $request->location_alley,
            'location_road' => $request->location_road,
            'location_subdistrict' => $request->location_subdistrict,
            'location_district' => $request->location_district,
            'location_province' => $request->location_province,
            'location_phone' => $request->location_phone,
            'location_fax' => $request->location_fax,
            'manager_name' => $request->manager_name,
            'manager_age' => $request->manager_age,
            'manager_nationality' => $request->manager_nationality,
            'manager_address_number' => $request->manager_address_number,
            'manager_village' => $request->manager_village,
            'manager_alley' => $request->manager_alley,
            'manager_road' => $request->manager_road,
            'manager_subdistrict' => $request->manager_subdistrict,
            'manager_district' => $request->manager_district,
            'manager_province' => $request->manager_province,
            'manager_phone' => $request->manager_phone,
            'manager_fax' => $request->manager_fax,
            'start_date' => $request->start_date,
            'date_registration' => $request->date_registration,
            'accepting_commercial_name' => $request->accepting_commercial_name,
            'accepting_commercial_nationality' => $request->accepting_commercial_nationality,
            'accepting_commercial_address_number' => $request->accepting_commercial_address_number,
            'accepting_commercial_village' => $request->accepting_commercial_village,
            'accepting_commercial_alley' => $request->accepting_commercial_alley,
            'accepting_commercial_road' => $request->accepting_commercial_road,
            'accepting_commercial_subdistrict' => $request->accepting_commercial_subdistrict,
            'accepting_commercial_district' => $request->accepting_commercial_district,
            'accepting_commercial_province' => $request->accepting_commercial_province,
            'accepting_commercial_phone' => $request->accepting_commercial_phone,
            'accepting_commercial_fax' => $request->accepting_commercial_fax,
            'accepting_commercial_name_used' => $request->accepting_commercial_name_used,
            'accepting_commercial_transferred' => $request->accepting_commercial_transferred,
            'accepting_commercial_cause' => $request->accepting_commercial_cause,
        ]);

        $tradeCopyLocation = TradeCopyLocation::create([
            'trade_registries_id' => $TradeRegistry->id,
            'copy_location_address_number' => $request->copy_location_address_number,
            'copy_location_village' => $request->copy_location_village,
            'copy_location_alley' => $request->copy_location_alley,
            'copy_location_road' => $request->copy_location_road,
            'copy_location_subdistrict' => $request->copy_location_subdistrict,
            'copy_location_district' => $request->copy_location_district,
            'copy_location_province' => $request->copy_location_province,
            'copy_location_phone' => $request->copy_location_phone,
            'copy_location_fax' => $request->copy_location_fax,

            'warehouse_location_address_number' => $request->warehouse_location_address_number,
            'warehouse_location_village' => $request->warehouse_location_village,
            'warehouse_location_alley' => $request->warehouse_location_alley,
            'warehouse_location_road' => $request->warehouse_location_road,
            'warehouse_location_subdistrict' => $request->warehouse_location_subdistrict,
            'warehouse_location_district' => $request->warehouse_location_district,
            'warehouse_location_province' => $request->warehouse_location_province,
            'warehouse_location_phone' => $request->warehouse_location_phone,
            'warehouse_location_fax' => $request->warehouse_location_fax,

            'agent_name' => $request->agent_name,
            'agent_nationality' => $request->agent_nationality,
            'agent_address_number' => $request->agent_address_number,
            'agent_village' => $request->agent_village,
            'agent_alley' => $request->agent_alley,
            'agent_road' => $request->agent_road,
            'agent_subdistrict' => $request->agent_subdistrict,
            'agent_district' => $request->agent_district,
            'agent_province' => $request->agent_province,
            'agent_phone' => $request->agent_phone,
            'agent_fax' => $request->agent_fax,
        ]);

        $TradeShareCapital = TradeShareCapital::create([
            'trade_registries_id' => $TradeRegistry->id,
            'number_partners' => $request->number_partners,
            'share_capital1_name' => $request->share_capital1_name,
            'share_capital1_age' => $request->share_capital1_age,
            'share_capital1_ethnicity' => $request->share_capital1_ethnicity,
            'share_capital1_nationality' => $request->share_capital1_nationality,
            'share_capital1_address_number' => $request->share_capital1_address_number,
            'share_capital1_village' => $request->share_capital1_village,
            'share_capital1_alley' => $request->share_capital1_alley,
            'share_capital1_road' => $request->share_capital1_road,
            'share_capital1_subdistrict' => $request->share_capital1_subdistrict,
            'share_capital1_district' => $request->share_capital1_district,
            'share_capital1_province' => $request->share_capital1_province,
            'share_capital1_phone' => $request->share_capital1_phone,
            'share_capital1_fax' => $request->share_capital1_fax,
            'share_capital1_invest_with' => $request->share_capital1_invest_with,
            'share_capital1_quantity' => $request->share_capital1_quantity,
            'share_capital2_name' => $request->share_capital2_name,
            'share_capital2_age' => $request->share_capital2_age,
            'share_capital2_ethnicity' => $request->share_capital2_ethnicity,
            'share_capital2_nationality' => $request->share_capital2_nationality,
            'share_capital2_address_number' => $request->share_capital2_address_number,
            'share_capital2_village' => $request->share_capital2_village,
            'share_capital2_alley' => $request->share_capital2_alley,
            'share_capital2_road' => $request->share_capital2_road,
            'share_capital2_subdistrict' => $request->share_capital2_subdistrict,
            'share_capital2_district' => $request->share_capital2_district,
            'share_capital2_province' => $request->share_capital2_province,
            'share_capital2_phone' => $request->share_capital2_phone,
            'share_capital2_fax' => $request->share_capital2_fax,
            'share_capital2_invest_with' => $request->share_capital2_invest_with,
            'share_capital2_quantity' => $request->share_capital2_quantity,
            'share_capital3_name' => $request->share_capital3_name,
            'share_capital3_age' => $request->share_capital3_age,
            'share_capital3_ethnicity' => $request->share_capital3_ethnicity,
            'share_capital3_nationality' => $request->share_capital3_nationality,
            'share_capital3_address_number' => $request->share_capital3_address_number,
            'share_capital3_village' => $request->share_capital3_village,
            'share_capital3_alley' => $request->share_capital3_alley,
            'share_capital3_road' => $request->share_capital3_road,
            'share_capital3_subdistrict' => $request->share_capital3_subdistrict,
            'share_capital3_district' => $request->share_capital3_district,
            'share_capital3_province' => $request->share_capital3_province,
            'share_capital3_phone' => $request->share_capital3_phone,
            'share_capital3_fax' => $request->share_capital3_fax,
            'share_capital3_invest_with' => $request->share_capital3_invest_with,
            'share_capital3_quantity' => $request->share_capital3_quantity,
        ]);

        $TradeShareValue = TradeShareValue::create([
            'trade_registries_id' => $TradeRegistry->id,
            'registration_point' => $request->registration_point,
            'divided_into' => $request->divided_into,
            'value_per_share' => $request->value_per_share,
            'nationality1' => $request->nationality1,
            'holding_shares1' => $request->holding_shares1,
            'nationality2' => $request->nationality2,
            'holding_shares2' => $request->holding_shares2,
            'nationality3' => $request->nationality3,
            'holding_shares3' => $request->holding_shares3,
            'nationality4' => $request->nationality4,
            'holding_shares4' => $request->holding_shares4,
            'many_partners' => $request->many_partners,
            'partner1_name' => $request->partner1_name,
            'partner1_age' => $request->partner1_age,
            'partner1_ethnicity' => $request->partner1_ethnicity,
            'partner1_nationality' => $request->partner1_nationality,
            'partner1_address_number' => $request->partner1_address_number,
            'partner1_village' => $request->partner1_village,
            'partner1_alley' => $request->partner1_alley,
            'partner1_road' => $request->partner1_road,
            'partner1_subdistrict' => $request->partner1_subdistrict,
            'partner1_district' => $request->partner1_district,
            'partner1_province' => $request->partner1_province,
            'partner1_phone' => $request->partner1_phone,
            'partner1_fax' => $request->partner1_fax,
            'partner2_name' => $request->partner2_name,
            'partner2_age' => $request->partner2_age,
            'partner2_ethnicity' => $request->partner2_ethnicity,
            'partner2_nationality' => $request->partner2_nationality,
            'partner2_address_number' => $request->partner2_address_number,
            'partner2_village' => $request->partner2_village,
            'partner2_alley' => $request->partner2_alley,
            'partner2_road' => $request->partner2_road,
            'partner2_subdistrict' => $request->partner2_subdistrict,
            'partner2_district' => $request->partner2_district,
            'partner2_province' => $request->partner2_province,
            'partner2_phone' => $request->partner2_phone,
            'partner2_fax' => $request->partner2_fax,
            'other' => $request->other,
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('attachments', $filename, 'public');

                TradeRegistryFile::create([
                    'trade_registries_id' => $TradeRegistry->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ฟอร์มถูกส่งเรียบร้อยแล้ว');
    }

    public function TableTradeRegistryUsersPages()
    {
        $forms = TradeRegistry::with(['user', 'files', 'replies'])
            ->where('users_id', Auth::id())
            ->get();

        return view('eservice.users.commercial_registration.account.show-detail', compact('forms'));
    }

    public function TradeRegistryUserExportPDF($id)
    {
        // $form = TradeRegistry::find($id);
        $form = TradeRegistry::with(['tradeEntrepreneur', 'tradeLocationMore', 'tradeShareCapital', 'tradeCopyLocation', 'tradeShareValue'])->find($id);

        // dd($form->tradeShareCapital);

        $pdf = Pdf::loadView('eservice.users.commercial_registration.pdf-form', compact('form'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('คำร้องทะเบียนพาณิชย์' . $form->id . '.pdf');
    }

    public function TradeRegistryUserReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        TradeRegistryReply::create([
            'trade_registries_id' => $formId,
            'users_id' => auth()->id(),
            'reply_text' => $request->message,
            'reply_date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
