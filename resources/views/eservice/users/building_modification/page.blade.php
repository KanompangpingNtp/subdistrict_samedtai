@extends('eservice.users.layout.layout')
@section('pages_content')

<h3 class="text-center"> คำขออนุญาตก่อสร้างอาคารดัดแปลงอาคารหรือรื้อถอนอาคาร </h3>

<div class="container">

    <form action="{{ route('BuildingChangeFormCreate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="written_at"> เขียนที่ <span class="text-danger">*</span></label>
            <input type="text" name="written_at" id="written_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="full_name"> ชื่อ-นามสกุล <span class="text-danger">*</span></label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-2 mt-3">
                <input type="checkbox" name="is_an_individual" id="is_an_individual" value="yes" onchange="toggleCheckboxes('is_an_individual', 'option_detail'); toggleAddressInputs()">
                <label for="is_an_individual">เป็นบุคคลธรรมดา</label>
            </div>

            <div class="col-md-3 mb-3">
                <label for="house_number">อยู่ที่เลขที่</label>
                <input type="text" name="house_number" id="house_number" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="village">หมู่ที่</label>
                <input type="text" name="village" id="village" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="alley">ตรอก/ซอย:</label>
                <input type="text" name="alley" id="alley" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="road">ถนน:</label>
                <input type="text" name="road" id="road" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="subdistrict">แขวง/ตำาบล:</label>
                <input type="text" name="subdistrict" id="subdistrict" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="district">เขต/อำเภอ:</label>
                <input type="text" name="district" id="district" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="province">จังหวัด:</label>
                <input type="text" name="province" id="province" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="individual_call">เบอร์โทร:</label>
                <input type="text" name="individual_call" id="individual_call" class="form-control" disabled>
            </div>
        </div>

        <script>
            function toggleAddressInputs() {
                const checkbox = document.getElementById('is_an_individual');
                const inputs = document.querySelectorAll('#house_number, #village, #alley, #road, #subdistrict, #district, #province , #individual_call');

                // Enable or disable inputs based on the checkbox status
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
            }

        </script>

        <div class="row">
            <div class="col-md-2 mb-3">
                <input type="checkbox" name="option_detail" id="option_detail" value="yes" onchange="toggleCheckboxes('option_detail', 'is_an_individual'); toggleLegalEntityInputs()">
                <label for="option_detail">เป็นนิติบุคคล</label>
            </div>

            <div class="col-md-3 mb-3">
                <label for="legal_name">ชื่อนิติบุคคล:</label>
                <input type="text" name="legal_name" id="legal_name" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="registered">จดทะเบียนเมื่อ:</label>
                <input type="date" name="registered" id="registered" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="registration_number">เลขทะเบียน:</label>
                <input type="text" name="registration_number" id="registration_number" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_located">สำนักงานตั้งอยู่เลขที่:</label>
                <input type="text" name="office_located" id="office_located" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_village">หมู่ที่:</label>
                <input type="text" name="office_village" id="office_village" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_alley">ตรอก/ซอย:</label>
                <input type="text" name="office_alley" id="office_alley" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_road">ถนน:</label>
                <input type="text" name="office_road" id="office_road" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_subdistrict">แขวง/ตำบล:</label>
                <input type="text" name="office_subdistrict" id="office_subdistrict" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_district">เขต/อำเภอ:</label>
                <input type="text" name="office_district" id="office_district" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="office_province">จังหวัด:</label>
                <input type="text" name="office_province" id="office_province" class="form-control" disabled>
            </div>

        </div>

        <script>
            function toggleLegalEntityInputs() {
                const checkbox = document.getElementById('option_detail');
                const inputs = document.querySelectorAll('#legal_name, #registered, #registration_number, #office_located, #office_village, #office_alley, #office_road, #office_subdistrict, #office_district, #office_province , #entity_calling');

                // Enable or disable inputs based on the checkbox status
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
            }

        </script>

        <script>
            function toggleCheckboxes(activeId, inactiveId) {
                const activeCheckbox = document.getElementById(activeId);
                const inactiveCheckbox = document.getElementById(inactiveId);

                // Disable the other checkbox if the current one is checked
                if (activeCheckbox.checked) {
                    inactiveCheckbox.disabled = true;
                    inactiveCheckbox.checked = false;
                } else {
                    inactiveCheckbox.disabled = false;
                }
            }

            function toggleAddressInputs() {
                const checkbox = document.getElementById('is_an_individual');
                const inputs = document.querySelectorAll('#house_number, #village, #alley, #road, #subdistrict, #district, #province, #individual_call');

                // Enable or disable inputs based on the checkbox status
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
            }

            function toggleLegalEntityInputs() {
                const checkbox = document.getElementById('option_detail');
                const inputs = document.querySelectorAll('#legal_name, #registered, #registration_number, #office_located, #office_village, #office_alley, #office_road, #office_subdistrict, #office_district, #office_province, #by_name, #by_house_number, #by_village, #by_alley, #by_road, #by_subdistrict, #by_district, #by_province  , #entity_calling');

                // Enable or disable inputs based on the checkbox status
                inputs.forEach(input => {
                    input.disabled = !checkbox.checked;
                });
            }

        </script>


        <div class="row">
            <div class="mb-3 col-md-5">
                <label for="by_name">โดย:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="by_name" id="by_name" class="form-control" style="flex: 1; margin-right: 5px;" disabled>
                    <span>ผู้มีอำนาจลงชื่อแทนนิติบุคคลของผู้อนุญาต</span>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="by_house_number"> อยู่บ้านเลขที่:</label>
                <input type="text" name="by_house_number" id="by_house_number" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_village">หมู่ที่:</label>
                <input type="text" name="by_village" id="by_village" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_alley">ตรอก/ซอย:</label>
                <input type="text" name="by_alley" id="by_alley" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_road">ถนน:</label>
                <input type="text" name="by_road" id="by_road" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_subdistrict">แขวง/ตำบล:</label>
                <input type="text" name="by_subdistrict" id="by_subdistrict" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_district">เขต/อำเภอ:</label>
                <input type="text" name="by_district" id="by_district" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="by_province">จังหวัด</label>
                <input type="text" name="by_province" id="by_province" class="form-control" disabled>
            </div>

            <div class="col-md-3 mb-3">
                <label for="entity_calling">เบอร์โทร:</label>
                <input type="text" name="entity_calling" id="entity_calling" class="form-control" disabled>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="apply_for_license">ขอยื่นคำขอรับใบอนุญาต:</label>
            <input type="text" name="apply_for_license" id="apply_for_license" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>ประเภทการทำการก่อสร้าง</label><br>
            <div class="d-flex align-items-center">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="building" name="building_type_new" value="1">
                    <label class="form-check-label" for="building_type_new1">ทำการก่อสร้างอาคาร</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="modification" name="building_type_new" value="2">
                    <label class="form-check-label" for="building_type_new2">ดัดแปลงอาคาร</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="demolition" name="building_type_new" value="3">
                    <label class="form-check-label" for="building_type_new3">รื้อถอนอาคาร</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="apply_house_number">ข้อที่ 1 ที่บ้านเลขที่</label>
                <input type="text" name="apply_house_number" id="apply_house_number" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_village">หมู่ที่</label>
                <input type="text" name="apply_village" id="apply_village" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_alley">ตรอก/ซอย:</label>
                <input type="text" name="apply_alley" id="apply_alley" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_road">ถนน:</label>
                <input type="text" name="apply_road" id="apply_road" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_subdistrict">แขวง/ตำบล:</label>
                <input type="text" name="apply_subdistrict" id="apply_subdistrict" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_district">เขต/อำเภอ:</label>
                <input type="text" name="apply_district" id="apply_district" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="apply_province">จังหวัด:</label>
                <input type="text" name="apply_province" id="apply_province" class="form-control">
            </div>

            {{-- <div class="col-md-3 mb-3">
            <label for="apply_by">โดย:</label>
            <input type="text" name="apply_by" id="apply_by" class="form-control">
        </div> --}}
            <div class="mb-3 col-md-5">
                <label for="apply_by">โดย:</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="apply_by" id="apply_by" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>เป็นเจ้าของอาคาร ในโฉนดเลขที่</span>
                </div>
            </div>

            {{-- <div class="">
            <div class="d-flex align-items-center">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_owner_name1" name="title_deed_owner_name" value="1">
                    <label class="form-check-label" for="title_deed_owner_name1">โฉนดที่ดิน</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_owner_name2" name="title_deed_owner_name" value="2">
                    <label class="form-check-label" for="title_deed_owner_name2">น.ส.3</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_owner_name3" name="title_deed_owner_name" value="3">
                    <label class="form-check-label" for="title_deed_owner_name3">ส.ค.1</label>
                </div>
            </div>
        </div> --}}

            <div class="col-md-3 mb-3">
                <label for="apply_number">เลขที่:</label>
                <input type="text" name="apply_number" id="apply_number" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label for="it_the_land_of">เป็นที่ดินของ:</label>
                <input type="text" name="it_the_land_of" id="it_the_land_of" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="according_document">ตามเอกสาร:</label>
                <input type="text" name="according_document" id="according_document" class="form-control">
            </div>

            {{-- <div class="col-md-3 mb-3">
            <label for="apply_number">เลขที่:</label>
            <input type="text" name="apply_number" id="apply_number" class="form-control">
        </div> --}}
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label>ข้อ 2 เป็นอาคาร</label>
                <label for="building_type_1">(1) ชนิด</label>
                <input type="text" name="building_type_1" id="building_type_1" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_num_1">จำนวน</label>
                <input type="text" name="building_num_1" id="building_num_1" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_to_1">เพื่อใช้เป็น</label>
                <input type="text" name="building_to_1" id="building_to_1" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_Number_vehicles_1">โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน</label>
                <input type="text" name="building_Number_vehicles_1" id="building_Number_vehicles_1" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_type_2">(2) ชนิด</label>
                <input type="text" name="building_type_2" id="building_type_2" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_num_2">จำนวน</label>
                <input type="text" name="building_num_2" id="building_num_2" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_to_2">เพื่อใช้เป็น</label>
                <input type="text" name="building_to_2" id="building_to_2" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_Number_vehicles_2">โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน</label>
                <input type="text" name="building_Number_vehicles_2" id="building_Number_vehicles_2" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_type_3"> (3) ชนิด</label>
                <input type="text" name="building_type_3" id="building_type_3" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_num_3">จำนวน</label>
                <input type="text" name="building_num_3" id="building_num_3" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_to_3">เพื่อใช้เป็น</label>
                <input type="text" name="building_to_3" id="building_to_3" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="building_Number_vehicles_3">โดยมีที่จอดรถ ที่กลับรถ และทางเข้าออกของรถ จำนวน</label>
                <input type="text" name="building_Number_vehicles_3" id="building_Number_vehicles_3" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="">ข้อ 3 มี</label>
                <label for="project_supervisor">เป็นผู้ควบคุมงาน</label>
                <input type="text" name="project_supervisor" id="project_supervisor" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="designer_and_calculator">เป็นผู้ออกแบบและคำนวณ</label>
                <input type="text" name="designer_and_calculator" id="designer_and_calculator" class="form-control">
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="">ข้อ 4 มี</label>
            <label for="scheduled_for_completion">กำหนดแล้วเสร็จ</label>
            <input type="text" name="scheduled_for_completion" id="scheduled_for_completion" class="form-control">
        </div>

        <label for="">ข้อ 5 พร้อมคำขอนี้ข้าพเจ้าได้แนบเอกสารหลักฐานต่างๆ มาด้วยแล้วคือ</label><br>
        <div class="row">
            {{-- <div class="col-md-4 mb-3">
            <label for="number_of_blueprints">(1) แผนผังบริเวณ แบบแปลน รายการประกอบแบบแปลน จำนวน</label>
            <input type="text" name="number_of_blueprints" id="number_of_blueprints" class="form-control">
        </div> --}}
            <div class="col-md-4 mb-3">
                <label for="number_of_blueprints">(1) แผนผังบริเวณ แบบแปลน รายการประกอบแบบแปลน จำนวน</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="number_of_blueprints" id="number_of_blueprints" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>ชุด</span>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="blueprint_set">ชุดละ</label>
                <input type="text" name="blueprint_set" id="blueprint_set" class="form-control">
            </div>
        </div>

        {{-- <div class="col-md-3 mb-3" >
        <label for="one_set_quantity"> (2) รายการคำนวณหนึ่งชุด จำนวน</label>
        <input type="text" name="one_set_quantity" id="one_set_quantity" class="form-control">
    </div> --}}
        <div class="col-md-3 mb-3">
            <label for="one_set_quantity"> (2) รายการคำนวณหนึ่งชุด จำนวน</label>
            <div style="display: flex; align-items: center;">
                <input type="text" name="one_set_quantity" id="one_set_quantity" class="form-control" style="flex: 1; margin-right: 5px;">
                <span>ชุด</span>
            </div>
        </div>

        <span>(3) หนังสือแสดงความเป็นตัวแทนของอาคาร (กรณีตัวแทนเจ้าของอาคารเป็นผู้ขออนุญาต)</span><br>
        <span>(4) สำเนาหนังสือรับรองการจดทะเบียน วัตถุประสงค์ และผู้มีอำนาจลงชื่อแทนบริษัทผู้ขออนุญาตออกให้ไม่เกินหกเดือน (กรณีที่มีบุคคลเป็นผู้ขออนุญาต)</span><br>
        <span>(5) หนังสือแสดงว่าเป็นผู้จัดการหรือผู้แทนซึ่งเป็นผู้ดำเนินการของนิติบุคคล (กรณีที่นิติบุคคลเป็นผู้ขออนุญาต)</span><br>

        <div class="row" style="margin-top: 30px;">
            {{-- <div class="col-md-4 mb-3">
            <label for="designer_calculates"> (6) หนังสือแสดงความยินยอมและรับรองของผู้ออกแบบและคำนวณ จำนวน</label>
            <input type="text" name="designer_calculates" id="designer_calculates" class="form-control">
        </div> --}}
            <div class="col-md-4 mb-3">
                <label for="designer_calculates"> (6) หนังสือแสดงความยินยอมและรับรองของผู้ออกแบบและคำนวณ จำนวน</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="designer_calculates" id="designer_calculates" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>ฉบับ</span>
                </div>
            </div>

            {{-- <div class="col-md-5 mb-3">
            <label for="control_architecture">พร้อมทั้งสำาเนาใบอนุญาตเป็นผู้ประกอบวิชาชีพวิศวกรรมควบคุมหรือสถาปัตยกรรมควบคุม จำนวน</label>
            <input type="text" name="control_architecture" id="control_architecture" class="form-control">
        </div> --}}
            <div class="col-md-5 mb-3">
                <label for="control_architecture">พร้อมทั้งสำเนาใบอนุญาตเป็นผู้ประกอบวิชาชีพวิศวกรรมควบคุมหรือสถาปัตยกรรมควบคุม จำนวน</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="control_architecture" id="control_architecture" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>ฉบับ</span>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label>(7) ประเภทเอกสาร</label><br>
            <div class="d-flex align-items-center">
                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_type1" name="title_deed_type" value="1">
                    <label class="form-check-label" for="title_deed_type1">โฉนดที่ดิน</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_type2" name="title_deed_type" value="2">
                    <label class="form-check-label" for="title_deed_type2">น.ส.3</label>
                </div>

                <div class="form-check me-3">
                    <input type="radio" class="form-check-input" id="title_deed_type3" name="title_deed_type" value="3">
                    <label class="form-check-label" for="title_deed_type3">ส.ค.1</label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="number">เลขที่ </label>
                    <input type="text" name="number" id="number" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-md-2 mb-3">
            <label for="quantity">จำนวน</label>
            <input type="text" name="quantity" id="quantity" class="form-control">
        </div> --}}
            <div class="col-md-2 mb-3">
                <label for="quantity">จำนวน</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="quantity" id="quantity" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>ฉบับ</span>
                </div>
            </div>

            {{-- <div class="col-md-3 mb-3">
            <label for="number_of_land_owners">หรือเป็นหนังสือยินยอมของเจ้าของที่ดิน จำนวน</label>
            <input type="text" name="number_of_land_owners" id="number_of_land_owners" class="form-control">
        </div> --}}

            <div class="col-md-3 mb-3">
                <span>หรือเป็นหนังสือยินยอมของเจ้าของที่ดิน จำนวน</span>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="number_of_land_owners" id="number_of_land_owners" class="form-control" style="flex: 1; margin-right: 5px;">
                    <span>ฉบับ</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <label for="controller"> (8) หนังสือแสดงความยินยอมของผู้ควบคุมงานตามข้อ 3 จำนวน </label>
            <input type="text" name="controller" id="controller" class="form-control">
        </div>

        <span> (9) สำเนาหรือภาพถ่ายใบอนุญาตเป็นผู้ประกอบวิชาชีพวิศวกรรมควบคุมหรือวิชาชีพสถาปัตยกรรมควบคุม
            ของผู้ควบคุม <br>(เฉพาะกรณีที่เป็นอาคารมีลักษณะและขนาดอยู่ในประเภทเป็นวิชาชีพวิศวกรรมควบคุม หรือวิชาชีพสถาปัตยกรรมควบคุม) แล้วแต่กรณี</span>
        <div class="col-md-2 mb-3">
            <div style="display: flex; align-items: center;">
                <input type="text" name="controller_2" id="controller_2" class="form-control" style="flex: 1; margin-right: 5px;">
                <span>จำนวน</span>
            </div>
        </div>

        <div class="col-md-5 mb-3">
            <label for="other_documents"> (10) เอกสาร อื่นๆ (ถ้ามี)</label>
            <input type="text" name="other_documents" id="other_documents" class="form-control">
        </div>

        <br>

        <div>
            <h3 for="attachments" class="form-label">แนบไฟล์ เอกสาร (สามารถกดเลือกไฟล์เอกสารพร้อมกันได้มากกว่า 1ไฟล์)</h3>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <!-- แสดงรายการไฟล์ที่แนบ -->
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล</button>
        </div>
    </form>
</div>


<script src="{{ asset('js/multipart_files.js') }}"></script>

@endsection
