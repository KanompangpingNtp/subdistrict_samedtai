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
            font-family: 'sarabun', 'sarabun-bold', sans-serif;
            font-size: 17px;
            margin: 0;
            padding: 0;
            line-height: 1;
        }


        .regis_number {
            text-align: right;
            margin-right: 8px;
        }

        .title_doc {
            text-align: center;
        }

        .box_text {
            border: 1px solid rgba(255, 255, 255, 0);
            text-align: start;
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
            margin-bottom: 5px;
            /* เว้นระยะห่างระหว่าง checkbox และข้อความ */
        }

        .box_text_border {
            margin-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            margin-bottom: 5px;
            border: 2px solid black;
            text-align: left;

        }

        .box_text_border span {
            display: inline-flex;
            align-items: left;
            line-height: 0.3;
        }

        .box_text_border input[type="checkbox"] {
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
    </style>
</head>

<body>
    @php
    use Carbon\Carbon;
    $created = Carbon::parse($form->created_at);
    $created_day = $created->day;
    $created_month = $created->locale('th')->translatedFormat('F');
    $created_year = $created->year + 543;
    @endphp

    <div class="box_text" style="text-align: center; font-weight: bold;">
        <span>แบบแสดงจำนงขอใช้บริการจัดเก็บขยะมูลฝอย</span><br>
        <span>โดยองค์การบริหารส่วนตำบลเสม็ดใต้ อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา</span>
    </div>
    <div class="box_text" style="text-align: right; margin-top:0.5rem;">
        <span>เขียนที่</span><span class="dotted-line" style="width: 34%; text-align: center; line-height: 1;">{{$form->written_at}}</span><br>
        <span>วันที่</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;">{{$created_day}}</span>
        <span>เดือน</span><span class="dotted-line" style="width: 12%; text-align: center; line-height: 1;">{{$created_month}}</span>
        <span>พ.ศ.</span><span class="dotted-line" style="width: 8%; text-align: center; line-height: 1;">{{$created_year}}</span>
    </div>
    <div class="box_text" style="text-align: left;">
        <div style="margin-left: 6rem;">
            <span>ข้าพเจ้า&nbsp;{{$form->position}}&nbsp;ชื่อ</span><span class="dotted-line" style="width: 32%; text-align: center; line-height: 1;">{{$form->salutation}}&nbsp;{{$form->full_name}}</span>
            <span>นามสกุล</span><span class="dotted-line" style="width: 33%; text-align: center; line-height: 1;">{{$form->last_name}}</span>
        </div>
        <span>อายุ</span><span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;">{{$form->age}}</span>
        <span>ปี เลขที่</span><span class="dotted-line" style="width: 17%; text-align: center; line-height: 1;">{{$form->address}}</span>
        <span>หมู่ที่</span><span class="dotted-line" style="width: 18%; text-align: center; line-height: 1;">{{$form->village}}</span>
        <span>ตำบลเสม็ดใต้ อำเภอเมือง จังหวัดฉะเชิงเทรา</span>
        <span>ให้ดำเนินการแสดงความจำนงขอใช้บริการจัดเก็บขยะมูลฝอย พร้อมนี้ได้จัดหาถังขยะไว้เพื่อรองรับขยะมูลฝอยอย่างถูกต้องตามกหลักสุขาภิบาลแล้ว</span>
        <span> สถานที่ใกล้เคียง</span><span class="dotted-line" style="width: 89%; text-align: center; line-height: 1;">{{$form->nearby_places}}</span>
        <span>เบอร์โทรศัพท์ติดต่อ</span><span class="dotted-line" style="width: 55%; text-align: center; line-height: 1;">{{$form->contact_number}}</span>
        <span>โดยยินดีจ่ายค่าธรรมเนียมการเก็บขน ขยะมูลฝอย</span><span>อัตราตามข้อบัญญัติองค์การบริหารส่วนตำบลเสม็ดใต้ ดังนี้</span>

        @php
        $CanonOptions = json_decode($form->canon_options, true) ?? [];
        @endphp

        <div style="margin-left: 4.5rem;">
            <input type="checkbox" {{ in_array('option1', $CanonOptions) ? 'checked' : '' }}><span>รายเดือน เป็นจำนวนเงิน</span><span class="dotted-line" style="width: 15%; text-align: center; line-height: 1;">{{$form->option1_amount}}</span>
            <span>บาท ต่อ เดือน (เริ่มตั้งแต่เดือน</span><span class="dotted-line" style="width: 30%; text-align: center; line-height: 1;">{{$form->option1_month}}</span>
            <span>เป็นต้นนไป)</span>
            <input type="checkbox" {{ in_array('option2', $CanonOptions) ? 'checked' : '' }}><span>ราย ๖ เดือน เป็นจำนวนเงิน</span><span class="dotted-line" style="width: 13%; text-align: center; line-height: 1;">{{$form->option2_amount}}</span>
            <span>บาท ต่อ ๖ เดือน (เริ่มตั้งแต่เดือน</span><span class="dotted-line" style="width: 29%; text-align: center; line-height: 1;">{{$form->option2_month}}</span>
            <span>เป็นต้นนไป)</span>
            <input type="checkbox" {{ in_array('option3', $CanonOptions) ? 'checked' : '' }}><span>รายปี เป็นจำนวนเงิน</span><span class="dotted-line" style="width: 16%; text-align: center; line-height: 1;">{{$form->option3_amount}}</span>
            <span>บาท ต่อ ๑ ปี (เริ่มตั้งแต่เดือน</span><span class="dotted-line" style="width: 33%; text-align: center; line-height: 1;">{{$form->option3_month}}</span>
            <span>เป็นต้นนไป)</span>
            <input type="checkbox" {{ in_array('option4', $CanonOptions) ? 'checked' : '' }}><span>อื่นๆ ระบุ</span><span class="dotted-line" style="width: 88%; text-align: center; line-height: 1;">{{$form->option4_detail}}</span>
        </div>
        <span>พร้อมคำขอนี้ข้าพเจ้าได้แนบเอกสารหลักฐานต่างๆ มาด้วยแล้ว ดังนี้</span>

        @php
        $DocumentOptions = json_decode($form->document_options, true) ?? [];
        @endphp

        <div style="margin-left: 4.5rem;">
            <input type="checkbox" {{ in_array('option1', $DocumentOptions) ? 'checked' : '' }}><span>สำเนาบัตรประจำตัวประชาชน/ข้าราชการ/พนักงานรัฐวิสาหกิจ/อื่นๆ</span><span class="dotted-line" style="width: 47%; text-align: center; line-height: 1;">{{$form->document_options1_detail}}</span>
            <input type="checkbox" {{ in_array('option2', $DocumentOptions) ? 'checked' : '' }}><span>สำเนาทะเบียนบ้าน</span><br>
            <input type="checkbox" {{ in_array('option3', $DocumentOptions) ? 'checked' : '' }}><span>เอกสารและหลักฐานอื่นๆ</span><span class="dotted-line" style="width: 77%; text-align: center; line-height: 1;">{{$form->document_options3_detail}}</span>
        </div>

    </div>
    <div class="box_text" style="text-align: center;">
        <span>ขอรับรองว่าข้อความในคำขอนี้เป็นความจริงทุกประการ</span>
    </div>
    <div class="box_text" style="text-align: center; margin-top:1rem; position: relative;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->full_name}}&nbsp;{{$form->last_name}}</span>
        <span>ผู้ยื่นความจำนง</span>
        <div style="margin-right: 40px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;">{{$form->salutation}}&nbsp;{{$form->full_name}}&nbsp;{{$form->last_name}}</span>
            <span>)</span>
        </div>
    </div>
    <div class="box_text" style="text-align: center; margin-top:1rem; position: relative;">
        <span>(ลงชื่อ)</span>
        <span class="dotted-line" style="width: 30%; text-align: center;"></span>
        <span style="margin-right: 15px;">ผู้รับคำร้อง</span>
        <div style="margin-right: 40px;">
            <span>(</span>
            <span class="dotted-line" style="width: 30%; text-align: center;"></span>
            <span>)</span>
        </div>
    </div>
    <div class="box_text">
        <span style="font-weight: bold; text-decoration:underline;">ความเห็นของเจ้าพนักงานท้องถิ่น</span><br>
        <input type="checkbox"><span  style="margin-top: 5px;">เห็นสมควรให้บริการฯ แก่ผู้ยื่นความจำนง โดยเก็บค่าธรรมเนียมอัตราตามข้อบัญญัติ องค์การบริหารส่วนตำบลเสม็ดใต้ เรื่อง การกำจัดสิ่งปฎิกูล</span>
        <span style="margin-top: -10px;">และมูลฝอยฯ ขององค์การบริหารส่วนตำบลเสม็ดใต้</span><br>
        <input type="checkbox"><span  style="margin-top: 5px;">อื่นๆ</span><span class="dotted-line" style="width: 92%; text-align: center;"></span>
    </div>
    <table style="width: 100%; margin-top: 4rem;">
        <tr>
            <!-- ฝั่งซ้าย -->
            <td style="text-align: center; width: 50%;">
                <span>(นายศุภวิชญ์ เสงี่ยมงาม)</span><br>
                <span>นักวิชาการสิ่งแวดล้อม รักษาราชการแทน</span><br>
                <span>ผู้อำนวยการกองสาธารณสุขและสิ่งแวดล้อม</span>
            </td>

            <!-- ฝั่งขวา -->
            <td style="text-align: center; width: 50%;">
                <div class="box_text">
                    <span>พ.จ.อ</span><span class="dotted-line" style="width: 50%; text-align: center;"></span><br>
                <span>(นางสาวศิริลักษณ์ โสธรเทวาพิทักษ์)</span><br>
                <span>รองปลัดองค์การบริหารส่วนตำบลเสม็ดใต้</span>
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; margin-top: 4rem;">
        <tr >
            <td style="text-align: center; width: 50%;">
                <span>(นางมยุรี นาคสุข)</span><br>
                <span>ปลัดองค์การบริหารส่วนตำบลเสม็ดใต้</span>
            </td>
            <td style="text-align: center; width: 50%;">
                <span>(นายกิตติพงศ์ สีเหลือง)</span><br>
                <span>นายกองค์การบริหารส่วนตำบลเสม็ดใต้</span>
            </td>
        </tr>
    </table>
</body>


</html>
