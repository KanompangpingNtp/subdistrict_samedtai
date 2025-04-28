@extends('eservice.users.layout.layout')
@section('pages_content')

<h3 class="text-center">คำขอรับรองสิ่งปลูกสร้างอาคาร</h3>

<div class="container">
    <form action="{{ route('CertificationFormCreate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            {{-- <div class="col-md-6">
                <label for="write_the_date" class="form-label">วันที่เขียน</label>
                <input type="date" name="write_the_date" id="write_the_date" class="form-control">
            </div> --}}
            <div class="col-md-6">
                <label for="subject" class="form-label">เรื่อง <span class="text-danger">*</span></label>
                <input type="text" name="subject" id="subject" class="form-control" maxlength="255" required>
            </div>
        </div>

        <div class="row mb-3">
            {{-- <div class="col-md-3">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <input type="text" name="salutation" id="salutation" class="form-control" maxlength="50">
            </div> --}}
            <div class="col-md-3">
                <label for="salutation" class="form-label">ชื่อนำหน้า </label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" selected disabled>เลือกคำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>
            <div class="col-md-9">
                <label for="full_name" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                <input type="text" name="full_name" id="full_name" class="form-control" maxlength="255" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="house_number" class="form-label">ตั้งบ้านเรือนอยู่เลขที่ <span class="text-danger">*</span></label>
                <input type="text" name="house_number" id="house_number" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-3">
                <label for="village" class="form-label">หมู่</label>
                <input type="text" name="village" id="village" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="alley" class="form-label">ซอย</label>
                <input type="text" name="alley" id="alley" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="road" class="form-label">ถนน</label>
                <input type="text" name="road" id="road" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="subdistrict" class="form-label">ตำบล <span class="text-danger">*</span></label>
                <input type="text" name="subdistrict" id="subdistrict" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-4">
                <label for="district" class="form-label">อำเภอ <span class="text-danger">*</span></label>
                <input type="text" name="district" id="district" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-4">
                <label for="province" class="form-label">จังหวัด <span class="text-danger">*</span></label>
                <input type="text" name="province" id="province" class="form-control" maxlength="50" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="have_intention" class="form-label">มีความประสงค์ <span class="text-danger">*</span></label>
                <input type="text" name="have_intention" id="have_intention" class="form-control" maxlength="255" required>
            </div>
            <div class="col-md-6">
                <label for="have_to" class="form-label">เพื่อ <span class="text-danger">*</span></label>
                <input type="text" name="have_to" id="have_to" class="form-control" maxlength="255" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="land_title_number" class="form-label">ในโฉนดที่ดิน เลขที่ <span class="text-danger">*</span></label>
                <input type="text" name="land_title_number" id="land_title_number" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-4">
                <label for="volume" class="form-label">เล่มที่ <span class="text-danger">*</span></label>
                <input type="text" name="volume" id="volume" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-4">
                <label for="page" class="form-label">หน้า <span class="text-danger">*</span></label>
                <input type="text" name="page" id="page" class="form-control" maxlength="50" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="village_area" class="form-label">อยู่ในเขตหมู่ที่ <span class="text-danger">*</span></label>
                <input type="text" name="village_area" id="village_area" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-3">
                <label for="subdistrict_area" class="form-label">แขวง/ตำบลพื้นที่ <span class="text-danger">*</span></label>
                <input type="text" name="subdistrict_area" id="subdistrict_area" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-3">
                <label for="district_area" class="form-label">เขต/อำเภอ <span class="text-danger">*</span></label>
                <input type="text" name="district_area" id="district_area" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-3">
                <label for="province_area" class="form-label">จังหวัด <span class="text-danger">*</span></label>
                <input type="text" name="province_area" id="province_area" class="form-control" maxlength="50" required>
            </div>
        </div>

        <br>
        <div>
            <h4><strong>ขั้นตอนการขอรับรองสิ่งปลูกสร้างอาคาร</strong></h4>
            <h4>(กรณีนอกเขตควบคุมอาคารตามพระราชบัญญัติควบคุมอาคาร พ.ศ. 2522)</h4>

            <span class="mt-2"><strong>1.เอกสาร/หลักฐานประกอบการขอรับรองสิ่งปลูกสร้างอาคาร</strong></span><br>
            <span>1.1 สำเนาบัตรประจำตัวประชาชนของผู้ขอรับรองฯ /เจ้าของที่ดิน <strong>จำนวน 1 ชุด</strong></span><br>
            <span>1.2 สำเนาทะเบียนบ้านของผู้ขอรับรองฯ /เจ้าของที่ดิน <strong>จำนวน 1 ชุด</strong></span><br>
            <span>1.3 สำเนาเอกสารหลักฐานสิทธิ์ที่ดินของผู้ขอรับรองฯ /เจ้าของที่ดิน <strong>จำนวน 1 ชุด</strong></span><br>
            <span>1.4 หนังสือยินยอมให้ปลูกสร้างในที่ดิน (กรณีเจ้าของที่ดินไม่ตรงกับผู้ขอรับรองฯ) <strong>จำนวน 1 ชุด</strong></span><br>
            <span>1.5 รูปถ่ายบ้าน 4 ด้าน <strong>จำนวน 1 ชุด</strong></span><br>
            <span>1.6 หนังสือรับรองจากผู้ใหญ่บ้าน พร้อมสำเนาบัตรประจำตัวประชาชน <strong>จำนวน 1 ชุด</strong></span>
        </div>
        <br>

        <div class="mb-3">
            <h3 class="form-label">แนบไฟล์ (สามารถเลือกแนบไฟล์เอกสารได้มากกว่า 1ไฟล์)</h3>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1">
                <i class="fa-solid fa-file-arrow-up me-2"></i>
                ส่งฟอร์มข้อมูล
            </button>
        </div>
    </form>
</div>

<script src="{{ asset('js/multipart_files.js') }}"></script>
@endsection
