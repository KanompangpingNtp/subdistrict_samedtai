@extends('eservice.users.layout.layout')
@section('pages_content')

<div class="container">
    <h2 class="text-center mb-4">แบบแสดงจำนงขอใช้บริการจัดเก็บขยะมูลฝอย</h2><br>

    <form action="{{route('TrashBinRequestFormCreate')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3 mb-3">

            <div class="col-md-6">
                <label for="written_at" class="form-label">เขียนที่</label>
                <input type="text" class="form-control" id="written_at" name="written_at">
            </div>

            <div class="col-md-6">
                <label for="date_written" class="form-label">วันที่เขียน</label>
                <input type="date" class="form-control" id="date_written" name="date_written">
            </div>

            <div>
                <label class="form-label">ข้าพเจ้า</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="position" id="individual" value="บุคคลธรรมดา">
                  <label class="form-check-label" for="individual">บุคคลธรรมดา</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="position" id="legal_entity" value="นิติบุคคล">
                  <label class="form-check-label" for="legal_entity">นิติบุคคล</label>
                </div>
              </div>

            <div class="col-md-3">
                <label for="salutation" class="form-label">คำนำหน้า</label>
                <select class="form-select" id="salutation" name="salutation">
                    <option value="" selected disabled>เลือกคำนำหน้า</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="full_name" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="col-md-3">
                <label for="last_name" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>

            <div class="col-md-3">
                <label for="age" class="form-label">อายุ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="age" name="age" required>
            </div>

            <div class="col-md-3">
                <label for="address" class="form-label">อยู่บ้านเลขที่<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <div class="col-md-3">
                <label for="village" class="form-label">หมู่ที่</label>
                <input type="text" class="form-control" id="village" name="village">
            </div>

            <div class="col-md-6">
                <label for="nearby_places" class="form-label">สถานที่ใกล้เคียง</label>
                <input type="text" class="form-control" id="nearby_places" name="nearby_places">
            </div>

            <div class="col-md-3">
                <label for="contact_number" class="form-label">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number">
            </div>
        </div>

        <div class="mb-3 col-md-12">
            <label class="form-label"><strong>อัตราตามข้อบัญญัติองค์การบริหารส่วนตำบลเสม็ดใต้ ดังนี้</strong></label><br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="option1" name="canon_options[]" value="option1" onchange="toggleCanonInputs(this)">
                <label class="form-check-label" for="option1">รายเดือน</label>
            </div>

            <div class="row g-3 mt-3" id="extraInputs1" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="option1_amount" class="form-label">เป็นจำนวนเงิน (บาท)</label>
                        <input type="text" class="form-control" name="option1_amount">
                    </div>
                    <div class="col-md-4">
                        <label for="option1_month" class="form-label">เริ่มตั้งแต่เดือน.....เป็นต้นไป</label>
                        <input type="text" class="form-control" name="option1_month">
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="option2" name="canon_options[]" value="option2" onchange="toggleCanonInputs(this)">
                <label class="form-check-label" for="option2">ราย 6 เดือน</label>
            </div>

            <div class="row g-3 mt-3" id="extraInputs2" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="option2_amount" class="form-label">เป็นจำนวนเงิน (บาท) ต่อ 6 เดือน</label>
                        <input type="text" class="form-control" name="option2_amount">
                    </div>
                    <div class="col-md-4">
                        <label for="option2_month" class="form-label">เริ่มตั้งแต่เดือน.....เป็นต้นไป</label>
                        <input type="text" class="form-control" name="option2_month">
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="option3" name="canon_options[]" value="option3" onchange="toggleCanonInputs(this)">
                <label class="form-check-label" for="option3">รายปี</label>
            </div>

            <div class="row g-3 mt-3" id="extraInputs3" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="option3_amount" class="form-label">เป็นจำนวนเงิน (บาท) ต่อ 1 เดือน</label>
                        <input type="text" class="form-control" name="option3_amount">
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">เริ่มตั้งแต่เดือน.....เป็นต้นไป</label>
                        <input type="text" class="form-control" name="option3_month">
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="option4" name="canon_options[]" value="option4" onchange="toggleCanonInputs(this)">
                <label class="form-check-label" for="option4">อื่นๆ</label>
            </div>

            <div class="row g-3 mt-3" id="extraInputs4" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="option4_detail" class="form-label">อื่นๆ</label>
                        <input type="text" class="form-control" name="option4_detail">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3 col-md-12">
            <label class="form-label"><strong>พร้อมคำขอนี้ข้าพเจ้าได้แนบเอกสารหลักฐานต่างๆ มาด้วยแล้ว ดังนี้</strong></label><br>

            <!-- Checkbox 1 -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="doc_option1" name="document_options[]" value="option1" onchange="toggleDocumentInputs(this)">
                <label class="form-check-label" for="doc_option1">สำเนาบัตรประจำตัวประชาชน/ข้าราชการ/พนักงานรัฐวิสาหกิจ/อื่นๆ</label>
            </div>
            <div class="row g-3 mt-3 mb-3" id="DocumentInputs1" style="display: none;">
                <div class="col-md-4">
                    <label for="document_options1" class="form-label">อื่นๆ ระบุ</label>
                    <input type="text" class="form-control" id="document_options1" name="document_options1_detail">
                </div>
            </div>

            <!-- Checkbox 2 -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="option2" name="document_options[]" value="option2">
                <label class="form-check-label" for="option2">สำเนาทะเบียนบ้าน</label>
            </div>

            <!-- Checkbox 3 -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="doc_option3" name="document_options[]" value="option3" onchange="toggleDocumentInputs(this)">
                <label class="form-check-label" for="doc_option3">เอกสารและหลักฐานอื่นๆ</label>
            </div>
            <div class="row g-3 mt-3 mb-3" id="DocumentInputs2" style="display: none;">
                <div class="col-md-4">
                    <label for="document_options3_detail" class="form-label">อื่นๆ ระบุ</label>
                    <input type="text" class="form-control" id="document_options3_detail" name="document_options3_detail">
                </div>
            </div>
        </div>

        <br>

        <div class="mb-3">
            <label for="attachments" class="form-label">แนบไฟล์ (รูปหรือเอกสารประกอบคำร้อง)</label>
            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 2MB)</small>
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
        </div>

        <div class="text-center w-full border">
            <button type="submit" class="btn btn-primary w-100 py-1"><i class="fa-solid fa-file-arrow-up me-2"></i></i>
                ส่งฟอร์มข้อมูล
            </button>
        </div>

    </form>

    <script>
        function toggleCanonInputs(checkbox) {
            const id = checkbox.id;
            const inputMap = {
                'option1': 'extraInputs1'
                , 'option2': 'extraInputs2'
                , 'option3': 'extraInputs3'
                , 'option4': 'extraInputs4'
            };

            const targetId = inputMap[id];
            if (targetId) {
                const target = document.getElementById(targetId);
                target.style.display = checkbox.checked ? 'block' : 'none';
            }
        }

        function toggleDocumentInputs(checkbox) {
            const inputMap = {
                'doc_option1': 'DocumentInputs1',
                'doc_option3': 'DocumentInputs2'
            };

            const targetId = inputMap[checkbox.id];
            if (targetId) {
                const target = document.getElementById(targetId);
                target.style.display = checkbox.checked ? 'block' : 'none';
            }
        }

    </script>



</div>

@endsection
