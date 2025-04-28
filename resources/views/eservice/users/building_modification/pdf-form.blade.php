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
            font-size: 18px;
        }

        .font-sarabun-bold {
            font-family: 'sarabun-bold', sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        .title_doc {
            font-family: 'sarabun-bold', sans-serif;
            /* ใช้ฟอนต์ sarabun-bold */
            font-size: 25px;
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

        .box_text input[type="checkbox"] {
            width: 17px;
            /* ปรับขนาด checkbox ให้พอดีกับข้อความ */
            height: 17px;
            /* ปรับความสูงให้พอดีกับข้อความ */
            margin-right: 5px;
            margin-left: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
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

    </style>
</head>

<body>
    @php
    use Carbon\Carbon;
    $date = Carbon::parse($form->created_at);
    $day = $date->day;
    $month = $date->locale('th')->translatedFormat('F');
    $year = $date->year + 543;

    // $registered = Carbon::parse($form->registered);
    // $registered_day = $registered->day;
    // $registered_month = $registered->locale('th')->translatedFormat('F');
    // $registered_year = $registered->year + 543;
    $registered_day = null; // กำหนดค่าเริ่มต้น
    $registered_month = null;
    $registered_year = null;

    $registered = $form->registered ? Carbon::parse($form->registered) : null;

    if ($registered) {
    $registered_day = $registered->day;
    $registered_month = $registered->locale('th')->translatedFormat('F');
    $registered_year = $registered->year + 543;
    }


    @endphp

    <div class="regis_number">แบบ ข1.
    </div>
    <div class="title_doc" style="text-align:center;">
        <div>
            คำขออนุญาตก่อสร้างอาคาร
        </div>
    </div>
    <div class="box_text" style="text-align: right;">
        <span>เลขรับที่</span>
        <span class="dotted-line" style="width: 18%; text-align: center; line-height: 1; border-bottom: 2px dotted black;"></span>
    </div>
    <div class="box_text" style="text-align: right;">
        <span>วันที่</span>
        <span class="dotted-line" style="width: 21%; text-align: center; line-height: 1; border-bottom: 2px dotted black;"></span>
    </div>
    <div class="box_text" style="text-align: right;">
        <span>ลงชื่อ</span>
        <span class="dotted-line" style="width: 20%; text-align: center; line-height: 1; border-bottom: 2px dotted black;"></span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:1rem;">
        <span>เขียนที่</span>
        <span class="dotted-line" style="width: 25%; text-align: center; line-height: 1;">{{ $form->written_at }}</span>
    </div>
    <div class="box_text" style="text-align: right; ">
        <span>วันที่</span>
        <span class="dotted-line" style="width: 5%; text-align: center;">{{ $day }}</span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 15%; text-align: center;"> {{ $month }}</span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 10%; text-align: center;"> {{ $year }}</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:5rem;">
        <span>ข้าพเจ้า</span>
        <span class="dotted-line" style="width: 62%; text-align: center;">{{ $form->full_name }}</span>
        <span>เจ้าของอาคารหรือตัวแทนเจ้าของอาคาร</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:3rem;">
        <span><span><input type="checkbox" {{ $form->is_an_individual == 'yes' ? 'checked' : '' }}></span>เป็นบุคคลธรรมดา อยู่ที่เลขที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center;">{{ $form->house_number }}</span>
        <span>ตรอก/ซอย</span><span class="dotted-line" style="width: 18%; text-align: center;">{{ $form->alley }}</span>
        <span>ถนน</span>
        <span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->road }}</span>
        <span>หมู่ที่</span><span class="dotted-line" style="width: 7%; text-align: center;">{{ $form->village }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        {{-- <span>หมู่ที่</span><span class="dotted-line" style="width: 5%; text-align: center;">{{ $form->village }}</span> --}}
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 17%; text-align: center;">{{ $form->subdistrict }}</span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{ $form->district }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{ $form->province }}</span>
        <span>โทร</span>
        <span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->individual_call }}</span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:3rem;">
        <span><span><input type="checkbox" {{ $form->option_detail == 'yes' ? 'checked' : '' }}></span>เป็นนิติบุคคลประเภท</span>
        <span class="dotted-line" style="width: 41%; text-align: center;">{{ $form->legal_name }}</span>
        <span>จดทะเบียนเมื่อ</span>
        {{-- <span class="dotted-line" style="width: 25%; text-align: center;">{{ $registered_day }}</span> --}}
        <span class="dotted-line" style="width: 25%; text-align: center;">
            @if ($registered_day && $registered_month && $registered_year)
                {{ $registered_day }} {{ $registered_month }} {{ $registered_year }}
            @else

            @endif
        </span>

    </div>
    <div class="box_text" style="text-align: left;">
        <span>เลขทะเบียน</span>
        <span class="dotted-line" style="width: 23%; text-align: center;">{{ $form->registration_number }}</span>
        <span>มีสำนักงานอยู่ที่</span>
        <span class="dotted-line" style="width: 25%; text-align: center;">{{ $form->office_village }}</span><span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 22%; text-align: center;">{{ $form->office_alley }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ถนน</span>
        <span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->office_road }}</span><span>หมู่ที่</span>
        <span class="dotted-line" style="width: 17%; text-align: center;">{{ $form->office_located }}</span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{ $form->office_subdistrict }}</span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 18%; text-align: center;">{{ $form->office_district }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 29%; text-align: center;">{{ $form->office_province }}</span>
        <span>โดย</span>
        <span class="dotted-line" style="width: 33%; text-align: center;">{{ $form->by_name }}</span><span>ผู้มีอำนาจลงชื่อแทนนิติบุคคลของผู้อนุญาต</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>อยู่บ้านเลขที่</span>
        <span class="dotted-line" style="width: 12%; text-align: center;">{{ $form->by_house_number }}</span><span>ตรอก/ซอย</span>
        <span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->by_alley }}</span><span>ถนน</span><span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->by_road }}</span><span>หมู่ที่</span>
        <span class="dotted-line" style="width: 8%; text-align: center;">{{ $form->by_village }}</span>
        <span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->by_subdistrict }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 24%; text-align: center;">{{ $form->by_district }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 24%; text-align: center;">{{ $form->by_province }}</span>
        <span>โทร</span>
        <span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->entity_calling }}</span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <span>ขอยื่นคำขอรับใบอนุญาต</span>
        <span class="dotted-line" style="width: 40%; text-align: center;">{{ $form->apply_for_license }}</span><span>ต่อเจ้าพนักงานท้องถิ่น
            ดังต่อไปนี้
        </span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        {{-- <span>ข้อที่ 1 ทำการก่อสร้างอาคาร/ดัดแปลงอาคาร/รื้อถอนอาคาร </span> --}}
        <span>ข้อที่ 1 <input type="checkbox" {{ $form->building_type_new == '1' ? 'checked' : '' }}> ทำการก่อสร้างอาคาร</span>
        <span><input type="checkbox" {{ $form->building_type_new == '2' ? 'checked' : '' }}> ดัดแปลงอาคาร</span>
        <span><input type="checkbox" {{ $form->building_type_new == '3' ? 'checked' : '' }}> รื้อถอนอาคาร</span>
        <span>ที่บ้านเลขที่
        </span><span class="dotted-line" style="width: 10%; text-align: center;">{{ $form->apply_house_number }}</span>
        <span>ตรอก/ซอย
        </span><span class="dotted-line" style="width: 10%; text-align: center;">{{ $form->apply_alley }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ถนน</span>
        <span class="dotted-line" style="width: 14%; text-align: center;">{{ $form->apply_road }}</span> <span>หมู่ที่</span>
        <span class="dotted-line" style="width: 13%; text-align: center;">{{ $form->apply_village }}</span><span>ตำบล/แขวง</span>
        <span class="dotted-line" style="width: 13%; text-align: center;">{{ $form->apply_subdistrict }}</span>
        <span>อำเภอ/เขต</span>
        <span class="dotted-line" style="width: 13%; text-align: center;">{{ $form->apply_district }}</span>
        <span>จังหวัด</span>
        <span class="dotted-line" style="width: 14%; text-align: center;">{{ $form->apply_province }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>โดย</span>
        <span class="dotted-line" style="width: 36%; text-align: center;">{{ $form->apply_by }}</span><span>เป็นเจ้าของอาคารในโฉนดเลขที่</span>
        <span class="dotted-line" style="width: 38%; text-align: center;">{{ $form->apply_number }}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เป็นที่ดินของ</span>
        <span class="dotted-line" style="width: 90%; text-align: center;">{{ $form->it_the_land_of }}</span>
        {{-- <span>ในที่ดินโฉนดที่ดิน เลขที่/น.ส.3 เลขที่ / ส.ค.1 เลขที่</span>
        <span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->apply_number }}</span> --}}
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ตามเอกสาร</span>
        <span class="dotted-line" style="width: 91%; text-align: center;">{{$form->according_document}}</span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <span>ข้อ 2 เป็นอาคาร </span>
        <div style="margin-left:1rem;">
            <span>(1) ชนิด</span><span class="dotted-line" style="width: 36%; text-align: center;">{{ $form->building_type_1 }}</span><span>จำนวน</span><span class="dotted-line" style="width: 12%; text-align: center;">{{ $form->building_num_1 }}</span><span>หลัง เพื่อใช้เป็น</span><span class="dotted-line" style="width: 26%; text-align: center;">{{ $form->building_to_1 }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน </span><span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->building_Number_vehicles_1 }}</span><span>คัน </span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <div style="margin-left:1rem;">
            <span>(2) ชนิด</span><span class="dotted-line" style="width: 36%; text-align: center;">{{ $form->building_type_2 }}</span><span>จำนวน</span><span class="dotted-line" style="width: 12%; text-align: center;">{{ $form->building_num_2 }}</span><span>หลัง เพื่อใช้เป็น</span><span class="dotted-line" style="width: 26%; text-align: center;">{{ $form->building_to_2 }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน </span><span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->building_Number_vehicles_2 }}</span><span>คัน </span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <div style="margin-left:1rem;">
            <span>(3) ชนิด</span><span class="dotted-line" style="width: 36%; text-align: center;">{{ $form->building_type_3 }}</span><span>จำนวน</span><span class="dotted-line" style="width: 12%; text-align: center;">{{ $form->building_num_3 }}</span><span>หลัง เพื่อใช้เป็น</span><span class="dotted-line" style="width: 26%; text-align: center;">{{ $form->building_to_3 }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน </span><span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->building_Number_vehicles_3 }}</span><span>คัน </span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>ตามแผนผังบริเวณ แบบแปลน รายการคำนวณประกอบแบบแปลน และรายการคำนวณที่แนบมาพร้อมนี้
        </span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <div>
            <span>ข้อ 3 มี </span><span class="dotted-line" style="width: 40%; text-align: center;">{{ $form->project_supervisor }}</span>
            <span>เป็นผู้ควบคุมงาน</span>
        </div>
        <div style="margin-left: 0.5rem;">
            <span>และมี</span>
            <span class="dotted-line" style="width: 40%; text-align: center;">{{ $form->designer_and_calculator }}</span>
            <span>เป็นผู้ออกแบบและคำนวณ</span>
        </div>
    </div>
    <div class="footer font-sarabun-bold">
        <p>องค์การบริหารส่วนเทศบาลตำบลเกวียนหักิ์ เทศบาลตำบลเกวียนหัก</p>
    </div>
    {{-- new page --}}
    <div style="page-break-before: always;"></div>
    {{-- <div class="regis_number">เทศบาลเมืองต้นแบบ ๔.๐
    </div> --}}

    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <span>ข้อ 4 กำหนดแล้วเสร็จภายใน </span><span class="dotted-line" style="width: 29%; text-align: center;">{{ $form->scheduled_for_completion }}</span>
        <span>วัน นับแต่วันที่ได้รับใบอนุญาตเนื่องจากปลูกเสร็จแล้ว</span>
    </div>
    <div class="box_text" style="text-align: left;  margin-left:5rem;">
        <span>ข้อ 5 พร้อมคำขอนี้ ข้าพเจ้าได้แนบเอกสารหลักฐานต่างๆมาด้วยแล้วคือ </span>
        <div style="margin-left: 1rem;">
            <span>(1) แผนผังบริเวณ แบบแปลน รายการประกอบแบบแปลน จำนวน </span>
            <span class="dotted-line" style="width: 16%; text-align: center;">{{ $form->number_of_blueprints }}</span><span>ชุด</span>
            {{-- <span class="dotted-line" style="width: 16%; text-align: center;">{{ $form->blueprint_set }}</span> --}}
        </div>
        <div style="margin-left: 1rem;">
            <span>(2) รายการคำนวณ 1 ชุด จำนวน </span>
            <span class="dotted-line" style="width: 16%; text-align: center;">{{ $form->one_set_quantity }}</span><span>แผ่น</span><span>
                (กรณีเป็นอาคารสาธารณะ อาคารพิเศษหรืออาคารที่
                ก่อสร้างด้วยวัตถุถาวรและวัตถุทนไฟเป็นส่วนใหญ่)
            </span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(3) หนังสือแสดงความเป็นเจ้าของอาคาร (กรณีตัวแทนเจ้าของอาคารเป็นผู้ขออนุญาต)</span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(4) สำเนาหนังสือรับรองการจดทะเบียน
                วัตถุประสงค์และ ผู้มีอำนาจลงชื่อแทนนิติบุคคลผู้ขออนุญาตที่ออกให้ไม่เกิน 6 เดือน
            </span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(5) หนังสือแสดงว่าเป็นผู้จัดการหรือตัวแทน ซึ่งเป็นผู้ดำเนินกิจการของนิติบุคคล
                (กรณีที่นิติบุคคลเป็นผู้ขออนุญาต)
            </span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(6) หนังสือแสดงความยินยอมและรับรองของผู้ออกแบบและคำนวณจำนวน
            </span><span class="dotted-line" style="width: 30%; text-align: center;">{{ $form->designer_calculates }}</span><span>ฉบับ</span>
            <span>พร้อมทั้งสำเนาใบอนุญาตเป็นผู้ประกอบวิชาชีพวิศวกรรมควบคุมหรือสถาปัตยกรรมควบคุม จำนวน </span><span class="dotted-line" style="width: 11%; text-align: center;">{{ $form->control_architecture }}</span><span>ฉบับ</span>
            <span>(กรณีที่เป็นอาคารมีลักษณะ ขนาด
                อยู่ในประเภทเป็นวิชาชีพวิศวกรรมควบคุมหรือสถาปัตยกรรมควบคุมแล้วแต่กรณี)</span>
        </div>
        <div style="margin-left: 1rem;">
            {{-- <span>(7) สำเนาหรือภาพถ่ายโฉนดที่ดิน เลขที่/ น.ส.3 เลขที่/ ส.ค.1 เลขที่</span> --}}
            <span>(7) สำเนาหรือภาพถ่าย<input type="checkbox" {{ $form->title_deed_type == '1' ? 'checked' : '' }}>โฉนดที่ดิน</span>
            <span><input type="checkbox" {{ $form->title_deed_type == '2' ? 'checked' : '' }}>น.ส.3</span>
            <span><input type="checkbox" {{ $form->title_deed_type == '3' ? 'checked' : '' }}>ส.ค.1</span>
            <span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->number }}</span><span>จำนวน</span><span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->quantity }}</span><span>ฉบับ</span>
            <span>หนังสือยินยอมของเจ้าของที่ดิน จำนวน </span><span class="dotted-line" style="width: 20%; text-align: center;">{{ $form->number_of_land_owners }}</span><span>ฉบับ</span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(8) หนังสือแสดงความยินยอมของผู้ควบคุมงานตามข้อ 3 จำนวน
            </span><span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->controller }}</span><span>ฉบับ</span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(9) สำเนาหรือภาพถ่ายใบอนุญาตเป็นผู้ประกอบวิชาชีพวิศวกรรมควบคุมหรือวิชาชีพสถาปัตยกรรมควบคุม
            </span><span>ของผู้ควบคุม จำนวน</span><span class="dotted-line" style="width: 15%; text-align: center;">{{ $form->controller_2 }}</span><span>ฉบับ </span><span> ( กรณีที่เป็นอาคารมีลักษณะขนาดอยู่ในประเภทเป็นวิชา
            </span><span>ชีพวิศวกรรมควบคุม หรือ
                วิชาชีพสถาปัตยกรรมควบคุม แล้วแต่กรณี )</span>
        </div>
        <div style="margin-left: 1rem;">
            <span>(10) เอกสาร อื่นๆ (ถ้ามี)
            </span><span class="dotted-line" style="width: 77%; text-align: center;">{{ $form->other_documents }}</span>
        </div>
    </div>
    <div class="box_text" style="text-align: center; margin-top:0.5rem;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 35%; text-align: center;">{{ $form->full_name }}</span>
        <span>ผู้ขออนุญาต</span>
        <div style="margin-right: 25px;">
            <span>(</span>
            <span class="dotted-line" style="width: 35%; text-align: center;"> {{ $form->full_name }} </span>
            <span>)</span>
        </div>
        <span>โทร</span>
        <span class="dotted-line" style="width: 35%;">
            {{ $form->entity_calling ?? $form->individual_call }}
        </span>
    </div>
    {{-- <div class="footer font-sarabun-bold">
        <p>องค์การบริหารส่วนเทศบาลตำบลเกวียนหักิ์ เทศบาลตำบลเกวียนหัก</p>
    </div> --}}
    {{-- new page --}}
    {{-- <div style="page-break-before: always;"></div>
    <div class="regis_number">หน้า 3 จาก 3
    </div>
    <div class="regis_number">เทศบาลเมืองต้นแบบ ๔.๐
    </div> --}}
    {{-- <div class="box_text"
        style="text-align: left; margin-top:1rem; border-bottom:2px solid black; padding-bottom:20px;">
        <span class="font-sarabun-bold" style="text-decoration: underline;">หมายเหตุ </span>
        <span style="margin-left:1.5rem;">(1) ข้อความใดที่ไม่ใช้ให้ขีดฆ่า</span>
        <div style="margin-left:5rem;">(2) ใส่เครื่องหมาย ถูก ในช่อง ว่าง หน้าที่ต้องการ</div>
    </div> --}}
    <div class="box_text" style="text-align: left; margin-top:1rem; border-top:2px solid black; ">
        <span class="font-sarabun-bold" style="text-decoration: underline;">หมายเหตุของเจ้าหน้าที่ </span>
        <div style="margin-left:5rem;">จะต้องแจ้งให้ผู้ขออนุญาตทราบว่า จะอนุญาตหรือไม่อนุญาตหรือขยายเวลาภายใน
        </div>
    </div>
    <div class="box_text" style="text-align: left; margin-top:1rem;">
        <span>วันที่</span>
        <span class="dotted-line" style="width: 5%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 15%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"> </span>
    </div>
    <div class="box_text" style="text-align: left; margin-top:1rem; margin-left:5rem;">
        <span>ผู้ขอขออนุญาตได้ชำระค่าธรรมเนียมใบอนุญาต</span>
        <span class="dotted-line" style="width: 21%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>เป็นเงิน</span>
        <span class="dotted-line" style="width: 26%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>บาท</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>และค่าธรรมเนียมการตรวจแบบแปลน</span>
        <span class="dotted-line" style="width: 16%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>เป็นเงิน</span>
        <span class="dotted-line" style="width: 16%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>บาท</span><span class="dotted-line" style="width: 15%; text-align: center; border-bottom: 2px dotted black;">
        </span><span>สตางค์ รวมเป็น</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <span>เงินทั้งสิน</span>
        <span class="dotted-line" style="width: 8%; text-align: center; border-bottom: 2px dotted black;"></span><span>บาท (</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>) ตามใบเสร็จรับเงินเล่มที่</span>
        <span class="dotted-line" style="width: 6%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>เลขที่</span>
        <span class="dotted-line" style="width: 6%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>ลงวันที่</span><span class="dotted-line" style="width: 4%; text-align: center; border-bottom: 2px dotted black;">
        </span><span>เดือน</span><span class="dotted-line" style="width: 7%; text-align: center; border-bottom: 2px dotted black;">
        </span><span>พ.ศ.</span><span class="dotted-line" style="width: 6%; text-align: center; border-bottom: 2px dotted black;">
        </span>
    </div>
    <div class="box_text" style="text-align: left; margin-left:3rem;">
        <span>ออกใบอนุญาตแล้ว เล่มที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"></span>
        <span>ฉบับ</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>ลงวันที่</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>เดือน</span>
        <span class="dotted-line" style="width: 12%; text-align: center; border-bottom: 2px dotted black;"> </span>
        <span>พ.ศ.</span>
        <span class="dotted-line" style="width: 10%; text-align: center; border-bottom: 2px dotted black;"> </span>
    </div>
    <div class="box_text" style="text-align: center; margin-top:0.5rem;">
        <span>(ลายชื่อ)</span>
        <span class="dotted-line" style="width: 35%; text-align: center;"></span>
        <div style="margin-right: 25px;">
            <span>(</span>
            <span class="dotted-line" style="width: 35%; text-align: center;"> </span>
            <span>)</span>
        </div>
        <div style="margin-right: 70px;">
            <span>ตำแหน่ง</span>
            <span class="dotted-line" style="width: 45%; text-align: center; border-bottom: 2px dotted black;"></span>
        </div>
    </div>
    <div class="footer font-sarabun-bold">
        <p>องค์การบริหารส่วนเทศบาลตำบลเกวียนหักิ์ เทศบาลตำบลเกวียนหัก</p>
    </div>
</body>

</html>
