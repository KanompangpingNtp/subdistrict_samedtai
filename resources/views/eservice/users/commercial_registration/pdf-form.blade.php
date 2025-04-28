<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF Report</title>

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun-bold';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew-Bold.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 18px;
            margin: 0;
            padding: 0;
            line-height: 1;
        }

        .font-sarabun {
            font-family: 'sarabun', sans-serif;
            font-size: 20px;
        }

        .font-sarabun-bold {
            font-family: 'sarabun-bold', sans-serif;
            font-size: 20px;
            font-weight: bold;
        }

        .title_doc {
            font-family: 'sarabun-bold', sans-serif;
            /* ใช้ฟอนต์ sarabun-bold */
            font-size: 30px;
            font-weight: bold;
        }

        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .box_text {
            text-align: center;
        }

        .box_text span {
            display: inline-flex;
            align-items: center;
            line-height: 1;
        }

        .dotted-line {
            margin-left: 2px;
            color: blue;
            border-bottom: 2px dotted blue;
            word-wrap: break-word;
            /* ห่อข้อความที่ยาวเกิน */
            overflow-wrap: break-word;
            /* รองรับ browser อื่น */
        }

        .footer {
            position: absolute;
            /* ทำให้ footer ยึดที่ด้านล่าง */
            bottom: -50px;
            /* ตั้งให้ footer อยู่ที่ด้านล่างสุดของหน้ากระดาษ */
            width: 100%;
            /* ให้ footer กว้างเต็มหน้ากระดาษ */
            text-align: start;
            /* จัดข้อความให้ตรงกลาง */
            padding: 5px 0;
            /* เพิ่มพื้นที่ด้านบนและล่างให้กับ footer */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
        }

        th {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    {{-- @php
        use Carbon\Carbon;
        $date = Carbon::parse($form->created_at);
        $day = $date->day;
        $month = $date->locale('th')->translatedFormat('F');
        $year = $date->year + 543;
    @endphp --}}

    <div class="regis_number">แบบ ทพ.
    </div>
    <table>
        <tbody>
            <tr>
                <td
                    style="border: 1px solid black; width: 12rem; padding-left:25px; padding-top:10px; padding-bottom:10px;">
                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                        <input type="checkbox" style="margin-right: 5px;">
                        <span style="position: relative; top: -5px;">บันเทิง และนันทนาการ</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" style="margin-right: 5px;">
                        <span style="position: relative; top: -5px;">สำนักงานทะเบียนพาณิชย์</span>
                    </div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>อำเภอ</span>
                        <span class="dotted-line" style="width: 50%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>จังหวัด</span>
                        <span class="dotted-line" style="width: 50%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                </td>
                <td
                    style="border: 1px solid black; width: 8rem; padding-top:10px; padding-bottom:10px; text-align: center;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('pdf/Logo.png'))) }}" alt="Logo" style="width: 100px">
                </td>
                <td style="border: 1px solid black; width: 12rem; padding-top:10px; padding-bottom:10px;">
                    <div style="display: flex; align-items: center; margin-bottom: 5px; text-align: center;">
                        <span style="position: relative; top: -5px;">(เฉพาะเจ้าหน้าที่)</span>
                    </div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>เลขรับที่</span>
                        <span class="dotted-line" style="width: 70%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>รับวันที่</span>
                        <span class="dotted-line" style="width: 72%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div style="border-top: 1px solid black; margin: 5px 0;"></div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>เลขที่คำขอเดิม</span>
                        <span class="dotted-line" style="width: 56%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style="text-align: left; margin-left:25px;">
                        <span>ทะเบียนเลขที่</span>
                        <span class="dotted-line" style="width: 58%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div style="text-decoration: underline;">ประเภทคำขอ</div>
                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                        <input type="checkbox" style="margin-right: 5px;" {{ $form->business_registration == '1' ? 'checked' : '' }}>
                        <span style="position: relative; top: -5px;">จดทะเบียนพาณิชย์ (ให้กรอก [1] - [8] ส่วน [9] - [12]
                            ให้เลือกกรอกตามแต่กรณี)</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <input type="checkbox" style="margin-right: 5px;" {{ $form->register_change_items == '1' ? 'checked' : '' }}>
                        {{-- <span>จดทะเบียนเปลี่ยนแปลงรายการ [ ] [ ] [ ] [ ] [ ] ตั้งแต่วันที่</span> --}}
                        <span>จดทะเบียนเปลี่ยนแปลงรายการ {{$form->register_change_number}} ตั้งแต่วันที่</span>
                        <span class="dotted-line" style="width: 20%; text-align: center;"> {{$form->register_change_date}}</span>
                        <span>เป็นดังนี้ </span><span
                            style="margin-left: 1.5rem;">(ให้กรอกเฉพาะรายการซึ่งประสงค์จะขอเปลี่ยนแปลง)</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <input type="checkbox" style="margin-right: 5px;" {{ $form->business_termination == '1' ? 'checked' : '' }}>
                        <span>จดทะเบียนเลิกประกอบพาณิชยกิจ ตั้งแต่วันที่</span>
                        <span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->business_termination_detail}}</span>
                        <span>(ให้กรอกรายการเฉพาะใน [1] [2] และ [5])</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div class="box_text" style=" text-align: left; margin-top: 1rem;">
                        <span >[1] ชื่อผู้ประกอบพาณิชยกิจ</span>
                        <span class="dotted-line" style="width: 20%; text-align: center;">{{$form->tradeEntrepreneur->first()->salutation}}&nbsp;{{$form->tradeEntrepreneur->first()->trade_entrepreneur_name}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span style="margin-left:1.3rem;">ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 19%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_alley}}</span>
                        <span>ถนน</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_subdistrict}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 17%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_district}}</span>
                        <span>จังหวัด</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 14%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[2] ชื่อที่ใช้ในการประกอบพาณิชยกิจ ภาษาไทย</span>
                        <span class="dotted-line" style="width: 61%; text-align: center;">{{$form->tradeEntrepreneur->first()->business_thai_language}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span style="margin-left:8rem;">ภาษาต่างประเทศ (ถ้ามี)</span>
                        <span class="dotted-line" style="width: 60%; text-align: center;">{{$form->tradeEntrepreneur->first()->business_foreign_language}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 1rem;">
                        <span>[3] ชนิดแห่งพาณิชยกิจ</span>
                        <span style="margin-left: 24rem;">รหัสสำหรับเจ้าหน้าที่</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 0.8rem;">
                        <span style="margin-left:1.2rem;">(1)</span><span class="dotted-line"
                            style="width: 60%; text-align: center;">{{$form->tradeEntrepreneur->first()->commercial_type1}}</span>
                            <span class="dotted-line"
                            style="margin-left: 3.8rem; width: 16%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 0.8rem;">
                        <span style="margin-left:1.2rem;">(2)</span><span class="dotted-line"
                            style="width: 60%; text-align: center;">{{$form->tradeEntrepreneur->first()->commercial_type2}}</span>
                            <span class="dotted-line"
                            style="margin-left: 3.8rem; width: 16%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 0.8rem;">
                        <span style="margin-left:1.2rem;">(3)</span><span class="dotted-line"
                            style="width: 60%; text-align: center;">{{$form->tradeEntrepreneur->first()->commercial_type3}}</span>
                            <span class="dotted-line"
                            style="margin-left: 3.8rem; width: 16%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 0.8rem;">
                        <span style="margin-left:1.2rem;">(4)</span><span class="dotted-line"
                            style="width: 60%; text-align: center;">{{$form->tradeEntrepreneur->first()->commercial_type4}}</span>
                            <span class="dotted-line"
                            style="margin-left: 3.8rem; width: 16%; text-align: center; border-bottom: 2px dotted black;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-top: 1rem;">
                        <span>[4] จำนวนเงินทุนที่นำมาใช้ในการประกอบพาณิชยกิจเป็นประจำ จำนวน</span>
                        <span class="dotted-line" style="width: 17%; text-align: center;">{{$form->tradeEntrepreneur->first()->capital_amount}}</span><span>บาท
                            (</span><span class="dotted-line"
                            style="width: 20%; text-align: center;">{{$form->tradeEntrepreneur->first()->capital_amount_detaill}}</span><span>)</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[5] ที่ตั้งสำนักงานแห่งใหญ่ เลขที่</span>
                        <span class="dotted-line"
                            style="width: 20%; text-align: center;">{{$form->tradeLocationMore->first()->location_address_number}}</span><span>หมู่ที่</span><span
                            class="dotted-line"
                            style="width: 20%; text-align: center;">{{$form->tradeLocationMore->first()->location_village}}</span><span>ตรอก/ซอย</span><span
                            class="dotted-line" style="width: 20%; text-align: center;">{{$form->tradeLocationMore->first()->location_alley}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span>
                        <span class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeLocationMore->first()->location_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeLocationMore->first()->location_subdistrict}}</span><span>อำเภอ/เขต</span><span
                            class="dotted-line" style="width: 27%; text-align: center;">{{$form->tradeLocationMore->first()->location_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeLocationMore->first()->location_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeLocationMore->first()->location_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeLocationMore->first()->location_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[6] ชื่อผู้จัดการ</span>
                        <span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->manager_name}}</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->manager_age}}</span><span>ปี สัญชาติ</span><span
                            class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->manager_nationality}}</span><span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeLocationMore->first()->manager_address_number}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>หมู่ที่</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeLocationMore->first()->manager_village}}</span><span>ตรอก/ซอย</span><span
                            class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeLocationMore->first()->manager_alley}}</span>
                        <span>ถนน</span>
                        <span class="dotted-line"
                            style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->manager_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line" style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->manager_subdistrict}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>อำเภอ/เขต</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->manager_district}}</span>
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->manager_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->manager_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 19%; text-align: center;">{{$form->tradeLocationMore->first()->manager_fax}}
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[7] วันที่เริ่มต้นประกอบพาณิชยกิจในประเทศไทย ตั้งแต่วันที่</span>
                        <span class="dotted-line" style="width: 51%; text-align: center;">{{ \Carbon\Carbon::parse($form->tradeLocationMore->first()->start_date)->addYears(543)->format('d/m/Y') }}
                        </span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[8] วันที่ขอจดทะเบียนพาณิชย์</span>
                        <span class="dotted-line" style="width: 74%; text-align: center;">{{ \Carbon\Carbon::parse($form->tradeLocationMore->first()->date_registration)->addYears(543)->format('d/m/Y') }}
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- new page --}}
    <div style="page-break-before: always;"></div>
    <table>
        <tbody>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div class="box_text" style=" text-align: left; margin-top: 0.1rem;">
                        <span>[9] รับโอนพาณิชยกิจนี้จาก</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_name}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_nationality}}</span>
                        <span>ที่อยู่เลขที่</span><span class="dotted-line"
                            style="width: 12%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_address_number}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>หมู่ที่</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_village}}</span><span>ตรอก/ซอย</span><span
                            class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_alley}}</span>
                        <span>ถนน</span>
                        <span class="dotted-line"
                            style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line" style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_subdistrict}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>อำเภอ/เขต</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_district}}</span>
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 17%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 19%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_fax}}
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>ชื่อที่ใช้ในการประกอบพาณิชยกิจ</span><span class="dotted-line"
                            style="width: 31%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_name_used}}</span>
                        <span>โอนเมื่อวันที่</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{ \Carbon\Carbon::parse($form->tradeLocationMore->first()->accepting_commercial_transferred)->addYears(543)->format('d/m/Y') }}
                        </span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>สาเหตุที่โอน</span><span class="dotted-line"
                            style="width: 89%; text-align: center;">{{$form->tradeLocationMore->first()->accepting_commercial_cause}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[10] ที่ตั้งสำนักงานสาขา เลขที่</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_alley}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line"
                            style="width: 25%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_subdistrict}}</span>
                        <span>อำเภอ/เขต</span><span class="dotted-line"
                            style="width: 25%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->copy_location_fax}}
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>ที่ตั้งโรงเก็บสินค้า เลขที่</span><span class="dotted-line"
                            style="width: 29%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_alley}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span>
                        <span class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_subdistrict}}</span><span>อำเภอ/เขต</span><span
                            class="dotted-line" style="width: 27%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->warehouse_location_fax}}
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>ตัวแทนค้าต่าง คือ</span>
                        <span class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_name}}</span><span>ที่อยู่เลขที่</span><span
                            class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_nationality}}</span><span>หมู่ที่</span><span
                            class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_village}}
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_alley}}</span>
                        <span>ถนน</span>
                        <span class="dotted-line"
                            style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_road}}</span><span>ตำบล/แขวง</span><span
                            class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_subdistrict}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>อำเภอ/เขต</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_district}}</span>
                        <span>จังหวัด</span>
                        <span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_province}}</span><span>โทรศัพท์</span><span
                            class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_phone}}</span><span>โทรสาร</span><span
                            class="dotted-line" style="width: 15%; text-align: center;">{{$form->tradeCopyLocation->first()->agent_fax}}
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[11] ชื่อ อายุ เชื้อชาติ สัญชาติ ตำบลที่อยู่ และจำนวนทุนลงหุ้นของผู้เป็นหุ้นส่วน
                            และจำนวนเงินทุนของห้างหุ้นส่วน</span>
                    </div>
                    <div class="box_text" style=" text-align: left;  margin-left: 1.5rem;">
                        <span>ผู้เป็นหุ้นส่วนของห้างหุ้นส่วน/ผู้เป็นหุ้นส่วนเข้าใหม่ มีจำนวน</span><span
                            class="dotted-line" style="width: 18%; text-align: center;">{{$form->tradeShareCapital->first()->number_partners}}</span>
                        <span>คน ดังนี้</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>(1)</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_name}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_alley}}</span>

                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line"
                            style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_subdistrict}}</span>
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>จังหวัด</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ลงหุ้นด้วย</span><span class="dotted-line"
                            style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_invest_with}}</span>
                        <span>จำนวน</span><span class="dotted-line" style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital1_quantity}}</span>
                        <span>บาท (ลงลายมือชื่อ)</span><span class="dotted-line"
                            style="width: 23%; text-align: center;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>(2)</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_name}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_alley}}</span>

                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line"
                            style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_subdistrict}}</span>
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>จังหวัด</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ลงหุ้นด้วย</span><span class="dotted-line"
                            style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_invest_with}}</span>
                        <span>จำนวน</span><span class="dotted-line" style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital2_quantity}}</span>
                        <span>บาท (ลงลายมือชื่อ)</span><span class="dotted-line"
                            style="width: 23%; text-align: center;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>(3)</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_name}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_alley}}</span>

                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line"
                            style="width: 23%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_subdistrict}}</span>
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>จังหวัด</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ลงหุ้นด้วย</span><span class="dotted-line"
                            style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_invest_with}}</span>
                        <span>จำนวน</span><span class="dotted-line" style="width: 22%; text-align: center;">{{$form->tradeShareCapital->first()->share_capital3_quantity}}</span>
                        <span>บาท (ลงลายมือชื่อ)</span><span class="dotted-line"
                            style="width: 23%; text-align: center;"></span>
                    </div>
                    <div class="box_text" style=" text-align: left;">
                        <span>[12] จำนวนเงินทน จำนวนหุ้น และมูลค่าหุ้นของบริษัทจำกัด
                            จำนวนและมูลค่าหุ้นที่บุคคลแตละสัญชาติถืออยู่</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ทุนจดทะเบียน</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeShareValue->first()->registration_point}}</span>
                        <span>บาท แบ่งออกเป็น</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeShareValue->first()->divided_into}}</span>
                        <span>หุ้น มูลค่าหุ้นละ</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeShareValue->first()->value_per_share}}</span><span>บาท</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->nationality1}}</span>
                        <span>ถือหุ้น</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->holding_shares1}}</span>
                        <span>หุ้น สัญชาติ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->nationality2}}</span><span>บาท</span>
                        <span>ถือหุ้น</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->holding_shares2}}</span><span>หุ้น</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->nationality3}}</span>
                        <span>ถือหุ้น</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->holding_shares3}}</span>
                        <span>หุ้น สัญชาติ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->nationality4}}</span><span>บาท</span>
                        <span>ถือหุ้น</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->holding_shares4}}</span><span>หุ้น</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- new page --}}
    <div style="page-break-before: always;"></div>
    <table>
        <tbody>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div class="box_text" style=" text-align: left; margin-top: 1rem;">
                        <span>[13] ผู้เป็นหุ้นส่วนออกหรือตาย จำนวน</span><span class="dotted-line"
                            style="width: 18%; text-align: center;">{{$form->tradeShareValue->first()->many_partners}}</span><span>คน ดังนี้
                            (ใช้กรณีขอจดทะเบียนเปลี่ยนแปลงรายการตามข้อ 11)</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>(1)</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->tradeShareValue->first()->many_partners}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeShareValue->first()->partner1_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->partner1_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->partner1_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner1_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner1_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner1_alley}}</span>

                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeShareValue->first()->partner1_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line"
                            style="width: 23%; text-align: center;">{{$form->tradeShareValue->first()->partner1_subdistrict}}</span>
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeShareValue->first()->partner1_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>จังหวัด</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner1_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner1_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner1_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>(2)</span>
                        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->tradeShareValue->first()->partner2_name}}</span>
                        <span>อายุ</span><span class="dotted-line" style="width: 10%; text-align: center;">{{$form->tradeShareValue->first()->partner2_age}}</span>
                        <span>ปี เชื้อชาติ</span><span>อายุ</span><span class="dotted-line"
                            style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->partner2_ethnicity}}</span>
                        <span>สัญชาติ</span><span class="dotted-line" style="width: 16%; text-align: center;">{{$form->tradeShareValue->first()->partner2_nationality}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ที่อยู่เลขที่</span>
                        <span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner2_address_number}}</span>
                        <span>หมู่ที่</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner2_village}}</span>
                        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 25%; text-align: center;">{{$form->tradeShareValue->first()->partner2_alley}}</span>

                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>ถนน</span><span class="dotted-line" style="width: 23%; text-align: center;">{{$form->tradeShareValue->first()->partner2_road}}</span>
                        <span>ตำบล/แขวง</span><span class="dotted-line"
                            style="width: 23%; text-align: center;">{{$form->tradeShareValue->first()->partner2_subdistrict}}</span>
                        <span style="margin-left:1.3rem;">อำเภอ/เขต</span>
                        <span class="dotted-line" style="width: 24%; text-align: center;">{{$form->tradeShareValue->first()->partner2_district}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-left: 1.5rem;">
                        <span>จังหวัด</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner2_province}}</span>
                        <span>โทรศัพท์</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner2_phone}}</span>
                        <span>โทรสาร</span><span class="dotted-line" style="width: 26%; text-align: center;">{{$form->tradeShareValue->first()->partner2_fax}}</span>
                    </div>
                    <div class="box_text" style=" text-align: left; margin-bottom: 2rem;">
                        <span>[14] อื่นๆ</span><span class="dotted-line"
                            style="width: 91%; text-align: center;">{{$form->tradeShareValue->first()->other}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div class="box_text" style="text-align: center; margin-top:2rem;">
                        <span>ข้าพเจ้าขอรับรองว่ารายการข้างต้นถูกต้องและเป็นความจริงทุกประการ</span>
                    </div>
                    <div class="box_text" style="text-align: center; margin-top:2rem; margin-bottom:2rem;">
                        <span>(ลงลายมือชื่อ)</span>
                        <span class="dotted-line" style="width: 35%; text-align: center; border-bottom: 2px dotted black;">{{$form->tradeEntrepreneur->first()->trade_entrepreneur_name}}</span><span>ผู้ประกอบการพาณิชยกิจ</span>
                        <div style="text-align: center; margin-right:3rem;">
                            <span>(</span>
                            <span class="dotted-line" style="width: 35%; text-align: center; border-bottom: 2px dotted black;">{{$form->tradeEntrepreneur->first()->salutation}}&nbsp;{{$form->tradeEntrepreneur->first()->trade_entrepreneur_name}}</span>
                            <span>)</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black; padding-left:1rem;">
                    <div class="box_text" style="text-align: center; margin-top:1rem;">
                        <span>บันทึกนายทะเบียนพาณิชย์</span>
                    </div>
                    <div class="box_text" style="text-align: center; ">
                        <span>รับจดทะเบียน ณ วันที่</span>
                        <span class="dotted-line" style="width: 50%; text-align: center; border-bottom: 2px dotted black;"></span>
                        </div>
                    </div>
                    <div class="box_text" style="text-align: center; margin-top:1rem; margin-bottom:2rem;">
                        <span>(ลงลายมือชื่อ)</span>
                        <span class="dotted-line" style="width: 35%; text-align: center; border-bottom: 2px dotted black;"></span><span>นายทะเบียนพาณิชย์</span>
                        <div style="text-align: center; margin-right:3rem;">
                            <span>(</span>
                            <span class="dotted-line" style="width: 35%; text-align: center; border-bottom: 2px dotted black;"></span>
                            <span>)</span>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


</body>


</html>
