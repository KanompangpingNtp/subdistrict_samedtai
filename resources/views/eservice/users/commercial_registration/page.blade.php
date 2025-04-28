@extends('eservice.users.layout.layout')
@section('pages_content')

<div class="container">
    <h3 class="text-center mb-4">คำร้องทะเบียนพาณิชย์</h3>

    <form action="{{ route('TradeRegistryFormCreate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3 class="form-label">ประเภทคำขอ</h3>

        <div class="mb-3">
            <label for="business_registration">
                <input type="checkbox" id="business_registration" name="business_registration" value="1" class="form-check-input">
                จดทะเบียนพาณิชย์ (ให้กรอก (1) - (8) ส่วน (9) - (12) ให้เลือกกรอกตามแต่กรณี)
            </label>
        </div>

        <div class="mb-3">
            <label for="register_change_items" style="margin-right: 10px;">
                <input type="checkbox" id="register_change_items" name="register_change_items" value="1" class="form-check-input">
                จดทะเบียนเปลี่ยนแปลงรายการ ตั้งแต่วันที่...................เป็นดังนี้ ( ให้กรอกเฉพาะรายการซึ่งประสงค์จะขอเปลี่ยนแปลง )
            </label>

            <div id="register_change_details" class="row" style="display: none;">
                <div class="d-flex">
                    <div class="col-md-3">
                        <input type="text" id="register_change_number" name="register_change_number" class="form-control" placeholder="กรุณากรอกเลข">
                    </div>
                    <div class="col-md-2" style="margin-left: 10px;">
                        <input type="date" id="register_change_date" name="register_change_date" class="form-control" placeholder="จดทะเบียนเปลี่ยนแปลงวันที่">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="business_termination" style="margin-right: 10px;">
                <input type="checkbox" id="business_termination" name="business_termination" value="1" class="form-check-input">
                จดทะเบียนเลิกประกอบพาณิชยกิจ ตั้งแต่วันที่...................เป็นดังนี้ ( ให้กรอกรายการเฉพาะใน (1) (2) และ (5) )
            </label>

            <div id="business_termination_details" class="row" style="display: none;">
                <div class="col-md-2">
                    <input type="date" id="business_termination_date" name="business_termination_date" class="form-control" placeholder="ตั้งแต่วันที่">
                </div>
            </div>
        </div>

        <script>
            // สำหรับ register_change_items
            document.getElementById('register_change_items').addEventListener('change', function() {
                var detailsDiv = document.getElementById('register_change_details');
                if (this.checked) {
                    detailsDiv.style.display = 'block'; // แสดงฟอร์มเมื่อเลือก checkbox
                } else {
                    detailsDiv.style.display = 'none'; // ซ่อนฟอร์มเมื่อไม่เลือก checkbox
                }
            });

            // สำหรับ business_termination
            document.getElementById('business_termination').addEventListener('change', function() {
                var detailsDiv = document.getElementById('business_termination_details');
                if (this.checked) {
                    detailsDiv.style.display = 'block'; // แสดงฟอร์มเมื่อเลือก checkbox
                } else {
                    detailsDiv.style.display = 'none'; // ซ่อนฟอร์มเมื่อไม่เลือก checkbox
                }
            });

        </script>

        <br>
        <h3 class="form-label">(1) ชื่อผู้ประกอบการ</h3>

        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" selected disabled>เลือกคำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="mb-3 col-md-4">
                <label for="trade_entrepreneur_name" class="form-label">ชื่อ-นามสกุล ผู้ประกอบกิจการ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_name" name="trade_entrepreneur_name" class="form-control" required>
            </div>

            <div class="mb-3 col-md-2">
                <label for="trade_entrepreneur_age" class="form-label">อายุ (ปี) <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_age" name="trade_entrepreneur_age" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_ethnicity" class="form-label">เชื้อชาติ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_ethnicity" name="trade_entrepreneur_ethnicity" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_nationality" class="form-label">สัญชาติ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_nationality" name="trade_entrepreneur_nationality" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_address_number" class="form-label">ที่อยู่ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_address_number" name="trade_entrepreneur_address_number" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_village" class="form-label">หมู่ที่ </label>
                <input type="text" id="trade_entrepreneur_village" name="trade_entrepreneur_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_alley" class="form-label">ตรอก/ซอย </label>
                <input type="text" id="trade_entrepreneur_alley" name="trade_entrepreneur_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_road" class="form-label">ถนน </label>
                <input type="text" id="trade_entrepreneur_road" name="trade_entrepreneur_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_subdistrict" class="form-label">ตำบล <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_subdistrict" name="trade_entrepreneur_subdistrict" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_district" class="form-label">อำเภอ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_district" name="trade_entrepreneur_district" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_province" class="form-label">จังหวัด <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_province" name="trade_entrepreneur_province" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_phone" class="form-label">โทรศัพท์ <span style="color: red;">*</span></label>
                <input type="text" id="trade_entrepreneur_phone" name="trade_entrepreneur_phone" class="form-control" required>
            </div>

            <div class="mb-3 col-md-3">
                <label for="trade_entrepreneur_fax" class="form-label">โทรสาร</label>
                <input type="text" id="trade_entrepreneur_fax" name="trade_entrepreneur_fax" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">(2) ชื่อที่ใช้ในการประกอบพาณิชยกิจ</h3>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="business_thai_language" class="form-label">ภาษาไทย <span style="color: red;">*</span></label>
                <input type="text" id="business_thai_language" name="business_thai_language" class="form-control" required>
            </div>

            <div class="mb-3 col-md-6">
                <label for="business_foreign_language" class="form-label">ภาษาต่างประเทศ <span style="color: red;">*</span></label>
                <input type="text" id="business_foreign_language" name="business_foreign_language" class="form-control" required>
            </div>
        </div>

        <br>
        <h3 class="form-label">(3) ชนิดแห่งพาณิชยกิจ</h3>

        <div class="mb-3 col-md-5 d-flex align-items-center">
            <label for="commercial_type1" class="form-label" style="margin-right: 10px;">1</label>
            <input type="text" id="commercial_type1" name="commercial_type1" class="form-control">
        </div>

        <div class="mb-3 col-md-5 d-flex align-items-center">
            <label for="commercial_type2" class="form-label" style="margin-right: 10px;">2</label>
            <input type="text" id="commercial_type2" name="commercial_type2" class="form-control">
        </div>

        <div class="mb-3 col-md-5 d-flex align-items-center">
            <label for="commercial_type3" class="form-label" style="margin-right: 10px;">3</label>
            <input type="text" id="commercial_type3" name="commercial_type3" class="form-control">
        </div>

        <div class="mb-3 col-md-5 d-flex align-items-center">
            <label for="commercial_type4" class="form-label" style="margin-right: 10px;">4</label>
            <input type="text" id="commercial_type4" name="commercial_type4" class="form-control">
        </div>


        <br>
        <h3 class="form-label">(4) จำนวนเงินทุนที่นำมาใช้ในการประกอบพาณิชยกิจเป็นประจำ</h3>

        <div class="row">
            {{-- <div class="mb-3 col-md-3">
            <label for="capital_amount" class="form-label">จำนวนเงินทุน <span style="color: red;">*</span></label>
            <input type="text" id="capital_amount" name="capital_amount" class="form-control"><span>บาท</span>
        </div> --}}
            <div class="mb-3 col-md-3">
                <label for="capital_amount" class="form-label">จำนวนเงินทุน <span style="color: red;">*</span></label>
                <div style="display: flex; align-items: center;">
                    <input type="text" id="capital_amount" name="capital_amount" class="form-control" style="flex: 1; margin-right: 5px;" required>
                    <span>บาท</span>
                </div>
            </div>

            <div class="mb-3 col-md-3" style="margin-top: 40px;">
                <label for="capital_amount_detaill" class="form-label"></label>
                <span>(</span>
                <input type="text" id="capital_amount_detaill" name="capital_amount_detaill" class="form-control" style="width: auto; display: inline;">
                <span>)</span>
            </div>
        </div>

        <br>
        <h3 class="form-label">(5) ที่ตั้งสำนักงานใหญ่</h3>
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="location_address_number">ที่อยู่ <span style="color: red;">*</span></label>
                <input type="text" name="location_address_number" id="location_address_number" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_village">หมู่ที่ <span style="color: red;">*</span></label>
                <input type="text" name="location_village" id="location_village" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_alley">ตรอก/ซอย</label>
                <input type="text" name="location_alley" id="location_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_road">ถนน</label>
                <input type="text" name="location_road" id="location_road" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_subdistrict">ตำบล <span style="color: red;">*</span></label>
                <input type="text" name="location_subdistrict" id="location_subdistrict" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_district">อำเภอ <span style="color: red;">*</span></label>
                <input type="text" name="location_district" id="location_district" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_province">จังหวัด <span style="color: red;">*</span></label>
                <input type="text" name="location_province" id="location_province" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_phone">โทรศัพท์ <span style="color: red;">*</span></label>
                <input type="text" name="location_phone" id="location_phone" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="location_fax">โทรสาร</label>
                <input type="text" name="location_fax" id="location_fax" class="form-control">
            </div>
        </div>

        <!-- ข้อมูลผู้จัดการ -->
        <br>
        <h3 class="form-label">(6) ข้อมูลผู้จัดการ</h3>
        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="manager_name">ชื่อ-สกุล <span class="text-danger">*</span></label>
                <input type="text" name="manager_name" id="manager_name" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_age">อายุ (ปี) <span class="text-danger">*</span></label>
                <input type="text" name="manager_age" id="manager_age" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_nationality">สัญชาติ <span class="text-danger">*</span></label>
                <input type="text" name="manager_nationality" id="manager_nationality" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_address_number">ที่อยู่ <span class="text-danger">*</span></label>
                <input type="text" name="manager_address_number" id="manager_address_number" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_village">หมู่ที่ <span class="text-danger">*</span></label>
                <input type="text" name="manager_village" id="manager_village" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_alley">ตรอก/ซอย</label>
                <input type="text" name="manager_alley" id="manager_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_road">ถนน</label>
                <input type="text" name="manager_road" id="manager_road" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_subdistrict">ตำบล <span class="text-danger">*</span></label>
                <input type="text" name="manager_subdistrict" id="manager_subdistrict" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_district">อำเภอ <span class="text-danger">*</span></label>
                <input type="text" name="manager_district" id="manager_district" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_province">จังหวัด <span class="text-danger">*</span></label>
                <input type="text" name="manager_province" id="manager_province" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_phone">โทรศัพท์ <span class="text-danger">*</span></label>
                <input type="text" name="manager_phone" id="manager_phone" class="form-control" required>
            </div>
            <div class="mb-3 col-md-4">
                <label for="manager_fax">โทรสาร</label>
                <input type="text" name="manager_fax" id="manager_fax" class="form-control">
            </div>
        </div>

        <!-- วันที่เริ่มต้นประกอบการ -->
        <br>
        <h3 class="form-label">(7) วันที่เริ่มต้นประกอบพาณิชยกิจในประเทศไทย</h3>
        <div class="mb-3 col-md-3">
            <label for="start_date">ตั้งแต่วันที่ <span class="text-danger">*</span></label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <br>
        <h3 class="form-label">(8) วันที่ขอจดทะเบียนพาณิชย์</h3>
        <div class="mb-3 col-md-3">
            <label for="date_registration">วันที่จดทะเบียน <span class="text-danger">*</span></label>
            <input type="date" name="date_registration" id="date_registration" class="form-control" required>
        </div>

        <!-- รับโอนเงินพาณิชย์ -->
        <br>
        <h3 class="form-label">(9) รับโอนพาณิชยกิจนี้จาก</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_name">รับโอนเงินจาก</label>
                <input type="text" name="accepting_commercial_name" id="accepting_commercial_name" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_nationality">สัญชาติ</label>
                <input type="text" name="accepting_commercial_nationality" id="accepting_commercial_nationality" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_address_number">ที่อยู่</label>
                <input type="text" name="accepting_commercial_address_number" id="accepting_commercial_address_number" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_village">หมู่ที่</label>
                <input type="text" name="accepting_commercial_village" id="accepting_commercial_village" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_alley">ตรอก/ซอย</label>
                <input type="text" name="accepting_commercial_alley" id="accepting_commercial_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_road">ถนน</label>
                <input type="text" name="accepting_commercial_road" id="accepting_commercial_road" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_subdistrict">ตำบล</label>
                <input type="text" name="accepting_commercial_subdistrict" id="accepting_commercial_subdistrict" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_district">อำเภอ</label>
                <input type="text" name="accepting_commercial_district" id="accepting_commercial_district" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_province">จังหวัด</label>
                <input type="text" name="accepting_commercial_province" id="accepting_commercial_province" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_phone">โทรศัพท์</label>
                <input type="text" name="accepting_commercial_phone" id="accepting_commercial_phone" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_fax">โทรสาร</label>
                <input type="text" name="accepting_commercial_fax" id="accepting_commercial_fax" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_name_used"> ชื่อที่ใช้ในการประกอบพาณิชยกิจ</label>
                <input type="text" name="accepting_commercial_name_used" id="accepting_commercial_name_used" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_transferred">โอนเมื่อวันที่</label>
                <input type="date" name="accepting_commercial_transferred" id="accepting_commercial_transferred" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="accepting_commercial_cause">สาเหตุที่โอน</label>
                <input type="text" name="accepting_commercial_cause" id="accepting_commercial_cause" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">(10) ที่ตั้งสำนักงานสาขา</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="copy_location_address_number">ที่อยู่สำนักงาน</label>
                <input type="text" name="copy_location_address_number" id="copy_location_address_number" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_village">หมู่ที่</label>
                <input type="text" name="copy_location_village" id="copy_location_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_alley">ตรอก/ซอย</label>
                <input type="text" name="copy_location_alley" id="copy_location_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_road">ถนน</label>
                <input type="text" name="copy_location_road" id="copy_location_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_subdistrict">ตำบล</label>
                <input type="text" name="copy_location_subdistrict" id="copy_location_subdistrict" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_district">อำเภอ</label>
                <input type="text" name="copy_location_district" id="copy_location_district" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_province">จังหวัด</label>
                <input type="text" name="copy_location_province" id="copy_location_province" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_phone">โทรศัพท์</label>
                <input type="text" name="copy_location_phone" id="copy_location_phone" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="copy_location_fax">โทรสาร</label>
                <input type="text" name="copy_location_fax" id="copy_location_fax" class="form-control">
            </div>
        </div>

        <!-- ที่ตั้งคลังสินค้า -->
        <br>
        <h3 class="form-label">ที่ตั้งโรงเก็บสินค้า</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="warehouse_location_address_number">ที่อยู่คลังสินค้า</label>
                <input type="text" name="warehouse_location_address_number" id="warehouse_location_address_number" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_village">หมู่ที่</label>
                <input type="text" name="warehouse_location_village" id="warehouse_location_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_alley">ตรอก/ซอย</label>
                <input type="text" name="warehouse_location_alley" id="warehouse_location_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_road">ถนน</label>
                <input type="text" name="warehouse_location_road" id="warehouse_location_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_subdistrict">ตำบล</label>
                <input type="text" name="warehouse_location_subdistrict" id="warehouse_location_subdistrict" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_district">อำเภอ</label>
                <input type="text" name="warehouse_location_district" id="warehouse_location_district" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_province">จังหวัด</label>
                <input type="text" name="warehouse_location_province" id="warehouse_location_province" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_phone">โทรศัพท์</label>
                <input type="text" name="warehouse_location_phone" id="warehouse_location_phone" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="warehouse_location_fax">โทรสาร</label>
                <input type="text" name="warehouse_location_fax" id="warehouse_location_fax" class="form-control">
            </div>
        </div>

        <!-- ตัวแทนค้าต่าง -->
        <br>
        <h3 class="form-label">ตัวแทนค้าต่าง</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="agent_name">ตัวแทนค้าต่าง คือ</label>
                <input type="text" name="agent_name" id="agent_name" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_nationality">สัญชาติ</label>
                <input type="text" name="agent_nationality" id="agent_nationality" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_address_number">ที่อยู่</label>
                <input type="text" name="agent_address_number" id="agent_address_number" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_village">หมู่ที่</label>
                <input type="text" name="agent_village" id="agent_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_alley">ตรอก/ซอย</label>
                <input type="text" name="agent_alley" id="agent_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_road">ถนน</label>
                <input type="text" name="agent_road" id="agent_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_subdistrict">ตำบล</label>
                <input type="text" name="agent_subdistrict" id="agent_subdistrict" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_district">อำเภอ</label>
                <input type="text" name="agent_district" id="agent_district" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_province">จังหวัด</label>
                <input type="text" name="agent_province" id="agent_province" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_phone">โทรศัพท์</label>
                <input type="text" name="agent_phone" id="agent_phone" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="agent_fax">โทรสาร</label>
                <input type="text" name="agent_fax" id="agent_fax" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">(11) ชื่อ อายุ เชื้อชาติ สัญชาติ ตำบลที่อยู่ และจำนวนทุนลงหุ้นของผู้เป็นหุ้นส่วนและจำนวนเงินทุนของห้างหุ้นส่วน</h3>

        <div class="mb-3 col-md-4">
            <label for="number_partners" class="form-label">ผู้เป็นหุ้นส่วนของห้างหุ้นส่วน/ผู้เป็นหุ้นส่วนเข้าใหม่ มีจำนวน (คน)</label>
            <div class="d-flex align-items-center">
                <input type="text" name="number_partners" id="number_partners" class="form-control me-2">
                <span class="ms-2" style="white-space: nowrap; width: 100%;">คนดังนี้</span>
            </div>
        </div>

        <h3>(1.)</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="share_capital1_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="share_capital1_name" id="share_capital1_name" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_age" class="form-label">อายุ (ปี)</label>
                <input type="text" name="share_capital1_age" id="share_capital1_age" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_ethnicity" class="form-label">เชื้อชาติ</label>
                <input type="text" name="share_capital1_ethnicity" id="share_capital1_ethnicity" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="share_capital1_nationality" id="share_capital1_nationality" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_address_number" class="form-label">เลขที่บ้าน</label>
                <input type="text" name="share_capital1_address_number" id="share_capital1_address_number" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_village" class="form-label">หมู่ที่</label>
                <input type="text" name="share_capital1_village" id="share_capital1_village" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" name="share_capital1_alley" id="share_capital1_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_road" class="form-label">ถนน</label>
                <input type="text" name="share_capital1_road" id="share_capital1_road" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="share_capital1_subdistrict" id="share_capital1_subdistrict" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_district" class="form-label">อำเภอ</label>
                <input type="text" name="share_capital1_district" id="share_capital1_district" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_province" class="form-label">จังหวัด</label>
                <input type="text" name="share_capital1_province" id="share_capital1_province" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_phone" class="form-label">โทรศัพท์</label>
                <input type="text" name="share_capital1_phone" id="share_capital1_phone" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_fax" class="form-label">โทรสาร</label>
                <input type="text" name="share_capital1_fax" id="share_capital1_fax" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_invest_with" class="form-label">ลงทุนด้วย</label>
                <input type="text" name="share_capital1_invest_with" id="share_capital1_invest_with" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital1_quantity" class="form-label">จำนวน(บาท)</label>
                <input type="text" name="share_capital1_quantity" id="share_capital1_quantity" class="form-control">
            </div>
        </div>

        <h3>(2.)</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="share_capital2_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="share_capital2_name" id="share_capital2_name" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_age" class="form-label">อายุ (ปี)</label>
                <input type="text" name="share_capital2_age" id="share_capital2_age" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_ethnicity" class="form-label">เชื้อชาติ</label>
                <input type="text" name="share_capital2_ethnicity" id="share_capital2_ethnicity" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="share_capital2_nationality" id="share_capital2_nationality" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_address_number" class="form-label">เลขที่บ้าน</label>
                <input type="text" name="share_capital2_address_number" id="share_capital2_address_number" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_village" class="form-label">หมู่ที่</label>
                <input type="text" name="share_capital2_village" id="share_capital2_village" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" name="share_capital2_alley" id="share_capital2_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_road" class="form-label">ถนน</label>
                <input type="text" name="share_capital2_road" id="share_capital2_road" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="share_capital2_subdistrict" id="share_capital2_subdistrict" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_district" class="form-label">อำเภอ</label>
                <input type="text" name="share_capital2_district" id="share_capital2_district" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_province" class="form-label">จังหวัด</label>
                <input type="text" name="share_capital2_province" id="share_capital2_province" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_phone" class="form-label">โทรศัพท์</label>
                <input type="text" name="share_capital2_phone" id="share_capital2_phone" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_fax" class="form-label">โทรสาร</label>
                <input type="text" name="share_capital2_fax" id="share_capital2_fax" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_invest_with" class="form-label">ลงทุนด้วย</label>
                <input type="text" name="share_capital2_invest_with" id="share_capital2_invest_with" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital2_quantity" class="form-label">จำนวน</label>
                <input type="text" name="share_capital2_quantity" id="share_capital2_quantity" class="form-control">
            </div>
        </div>

        <h3>(3.)</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="share_capital3_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="share_capital3_name" id="share_capital3_name" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_age" class="form-label">อายุ (ปี)</label>
                <input type="text" name="share_capital3_age" id="share_capital3_age" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_ethnicity" class="form-label">เชื้อชาติ</label>
                <input type="text" name="share_capital3_ethnicity" id="share_capital3_ethnicity" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="share_capital3_nationality" id="share_capital3_nationality" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_address_number" class="form-label">เลขที่บ้าน</label>
                <input type="text" name="share_capital3_address_number" id="share_capital3_address_number" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_village" class="form-label">หมู่ที่</label>
                <input type="text" name="share_capital3_village" id="share_capital3_village" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" name="share_capital3_alley" id="share_capital3_alley" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_road" class="form-label">ถนน</label>
                <input type="text" name="share_capital3_road" id="share_capital3_road" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="share_capital3_subdistrict" id="share_capital3_subdistrict" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_district" class="form-label">อำเภอ</label>
                <input type="text" name="share_capital3_district" id="share_capital3_district" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_province" class="form-label">จังหวัด</label>
                <input type="text" name="share_capital3_province" id="share_capital3_province" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_phone" class="form-label">โทรศัพท์</label>
                <input type="text" name="share_capital3_phone" id="share_capital3_phone" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_fax" class="form-label">โทรสาร</label>
                <input type="text" name="share_capital3_fax" id="share_capital3_fax" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_invest_with" class="form-label">ลงทุนด้วย</label>
                <input type="text" name="share_capital3_invest_with" id="share_capital3_invest_with" class="form-control">
            </div>
            <div class="mb-3 col-md-3">
                <label for="share_capital3_quantity" class="form-label">จำนวน</label>
                <input type="text" name="share_capital3_quantity" id="share_capital3_quantity" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">(12) จำนวนเงินทุน จำนวนหุ้น และมุลค่าหุ้นของบริษัทจำกัด จำนวนและมูลค่าหุ้นที่บุคคลแต่ละสัญชาติถืออยู่</h3>
        <div class="row">
            {{-- <div class="mb-3 col-md-3">
        <label for="registration_point" class="form-label">จุดจดทะเบียน (บาท)</label>
        <input type="text" name="registration_point" id="registration_point" class="form-control">
    </div> --}}
            <div class="mb-3 col-md-3">
                <label for="registration_point" class="form-label">ทุนจดทะเบียน</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="registration_point" id="registration_point" class="form-control">
                    <span class="ms-1">บาท</span>
                </div>
            </div>

            <!-- Divided into -->
            {{-- <div class="mb-3 col-md-3">
        <label for="divided_into" class="form-label">แบ่งออกเป็น (หุ้น)</label>
        <input type="text" name="divided_into" id="divided_into" class="form-control">
    </div> --}}
            <div class="mb-3 col-md-3">
                <label for="divided_into" class="form-label">แบ่งออกเป็น</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="divided_into" id="divided_into" class="form-control">
                    <span class="ms-1">หุ้น</span>
                </div>
            </div>

            <!-- Value per share -->
            {{-- <div class="mb-3 col-md-3">
        <label for="value_per_share" class="form-label">มูลค่าหุ้นละ (บาท)</label>
        <input type="text" name="value_per_share" id="value_per_share" class="form-control">
    </div> --}}
            <div class="mb-3 col-md-3">
                <label for="value_per_share" class="form-label">มูลค่าหุ้นละ</label>
                <div style="display: flex; align-items: center;">
                    <input type="text" name="value_per_share" id="value_per_share" class="form-control">
                    <span class="ms-1">หุ้น</span>
                </div>
            </div>

            <div class="mb-3 col-md-6">
                <label for="nationality1" class="form-label">สัญชาติ</label>
                <input type="text" name="nationality1" id="nationality1" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="holding_shares1" class="form-label">ถือหุ้น (หุ้น)</label>
                <input type="text" name="holding_shares1" id="holding_shares1" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="nationality2" class="form-label">สัญชาติ</label>
                <input type="text" name="nationality2" id="nationality2" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="holding_shares2" class="form-label">ถือหุ้น (หุ้น)</label>
                <input type="text" name="holding_shares2" id="holding_shares2" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="nationality3" class="form-label">สัญชาติ</label>
                <input type="text" name="nationality3" id="nationality3" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="holding_shares3" class="form-label">ถือหุ้น (หุ้น)</label>
                <input type="text" name="holding_shares3" id="holding_shares3" class="form-control">
            </div>

            <div class="mb-3 col-md-6">
                <label for="nationality4" class="form-label">สัญชาติ</label>
                <input type="text" name="nationality4" id="nationality4" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="holding_shares4" class="form-label">ถือหุ้น (หุ้น)</label>
                <input type="text" name="holding_shares4" id="holding_shares4" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">(13) ผู้เป็นหุ้นส่วนออกหรือตาย</h3>

        <!-- Many partners -->
        {{-- <div class="mb-3 col-md-3">
        <label for="many_partners" class="form-label">จำนวนคน (คน)</label>
        <input type="text" name="many_partners" id="many_partners" class="form-control">
    </div> --}}
        <div class="mb-3">
            <label for="value_per_share" class="form-label">จำนวนคน</label>
            <div style="display: flex; align-items: center;">
                <input type="text" name="value_per_share" id="value_per_share" class="form-control">
                <span class="ms-2" style="white-space: nowrap; width: 100%;">คน ดังนี้ (ใช้กรณีของจดทะเบียนเปลี่ยนแปลงรายการตามข้อ11)</span>
            </div>
        </div>

        <h3>(1)</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="partner1_name" class="form-label">ชื่อ-สกุล</label>
                <input type="text" name="partner1_name" id="partner1_name" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_age" class="form-label">อายุ (ปี)</label>
                <input type="text" name="partner1_age" id="partner1_age" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_ethnicity" class="form-label">เชื้อชาติ</label>
                <input type="text" name="partner1_ethnicity" id="partner1_ethnicity" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="partner1_nationality" id="partner1_nationality" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_address_number" class="form-label">ที่อยู่</label>
                <input type="text" name="partner1_address_number" id="partner1_address_number" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_village" class="form-label">หมู่ที่</label>
                <input type="text" name="partner1_village" id="partner1_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" name="partner1_alley" id="partner1_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_road" class="form-label">ถนน</label>
                <input type="text" name="partner1_road" id="partner1_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="partner1_subdistrict" id="partner1_subdistrict" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_district" class="form-label">อำเภอ</label>
                <input type="text" name="partner1_district" id="partner1_district" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_province" class="form-label">จังหวัด</label>
                <input type="text" name="partner1_province" id="partner1_province" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_phone" class="form-label">โทรศัพท์</label>
                <input type="text" name="partner1_phone" id="partner1_phone" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner1_fax" class="form-label">โทรสาร</label>
                <input type="text" name="partner1_fax" id="partner1_fax" class="form-control">
            </div>
        </div>


        <!-- Partner 2 Details -->
        <h3>(2)</h3>
        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="partner2_name" class="form-label">ชื่อ</label>
                <input type="text" name="partner2_name" id="partner2_name" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_age" class="form-label">อายุ (ปี)</label>
                <input type="text" name="partner2_age" id="partner2_age" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_ethnicity" class="form-label">เชื้อชาติ</label>
                <input type="text" name="partner2_ethnicity" id="partner2_ethnicity" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_nationality" class="form-label">สัญชาติ</label>
                <input type="text" name="partner2_nationality" id="partner2_nationality" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_address_number" class="form-label">ที่อยู่</label>
                <input type="text" name="partner2_address_number" id="partner2_address_number" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_village" class="form-label">หมู่ที่</label>
                <input type="text" name="partner2_village" id="partner2_village" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_alley" class="form-label">ตรอก/ซอย</label>
                <input type="text" name="partner2_alley" id="partner2_alley" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_road" class="form-label">ถนน</label>
                <input type="text" name="partner2_road" id="partner2_road" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_subdistrict" class="form-label">ตำบล</label>
                <input type="text" name="partner2_subdistrict" id="partner2_subdistrict" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_district" class="form-label">อำเภอ</label>
                <input type="text" name="partner2_district" id="partner2_district" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_province" class="form-label">จังหวัด</label>
                <input type="text" name="partner2_province" id="partner2_province" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_phone" class="form-label">โทรศัพท์</label>
                <input type="text" name="partner2_phone" id="partner2_phone" class="form-control">
            </div>

            <div class="mb-3 col-md-3">
                <label for="partner2_fax" class="form-label">โทรสาร</label>
                <input type="text" name="partner2_fax" id="partner2_fax" class="form-control">
            </div>
        </div>

        <br>
        <h3 class="form-label">อื่นๆ</h3>
        <div class="mb-3">
            <label for="other" class="form-label">รายละเอียดเพิ่มเติม</label>
            <textarea name="other" id="other" class="form-control" rows="3"></textarea>
        </div>

        <br>
        <span><strong>ข้าพเจ้าขอรับรองว่ารายการข้างต้นถูกต้องและเป็นจริงทุกประการ</strong></span>
        <br>
        <br>

        <div>
            <h3 for="attachments" class="form-label">แนบไฟล์</h3>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <!-- แสดงรายการไฟล์ที่แนบ -->
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <!-- ปุ่มส่ง -->
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100 py-2">
                <i class="fa-solid fa-file-arrow-up me-2"></i> ส่งฟอร์มข้อมูล
            </button>
        </div>
    </form>
</div>

@endsection
