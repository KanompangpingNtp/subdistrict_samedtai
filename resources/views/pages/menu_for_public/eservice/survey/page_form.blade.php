@extends('layout.main.app')
@section('content')
<style>
    .bg {
        background-image: url('{{ asset('images/base_data/bg-base-data.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 2rem 0px;
    }

    .custom-gradient-shadow {
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(255, 0, 102, 0.3),
            0 0 50px -10px rgba(255, 102, 178, 0.8),
            0 0 50px -10px rgba(255, 153, 204, 0.8);
        background-color: #ffffff;
    }

    /* ปรับแต่งการ์ด */
    .custom-card {
        border: none;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        cursor: pointer;
    }

    /* Hover Effect: ทำให้เด่นขึ้น */
    .custom-card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Hover Effect: ซูมรูปภาพเบาๆ */
    .custom-card:hover .image-container img {
        transform: scale(1.1);
    }

    /* ปรับแต่งเนื้อหาในการ์ด */
    .card-body {
        background: #fff;
        padding: 15px;
        border-top: 2px solid #46c700;
    }

    .card-title {
        font-size: 30px;
        font-weight: bold;
        color: #333;
        margin-bottom: 0;
        transition: color 0.3s ease;
    }

    /* Hover Effect: เปลี่ยนสีข้อความ */
    .custom-card:hover .card-title {
        color: #77b329;
    }

</style>
<div class="bg py-5">
    <div class="container py-5 custom-gradient-shadow">
        <div class=" d-flex flex-column justify-content-center p-5">
            <div class="fs-1 fw-bold mb-4 text-center">รับแจ้งร้องเรียนทุจริตประพฤติมิชอบ</div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: 'success'
                    , title: '{{ $message }}'
                , })

            </script>
            @endif

            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-10">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            {{-- <input type="hidden" name="form_type_id" value="{{ $formTypes->firstWhere('type_name', 'รับเรื่องราวร้องทุกข์')->id }}"> --}}

                            <label for="full_name" class="form-label"><strong>ชื่อ-สกุล ผู้ส่ง <span class="text-danger">*</span></strong></label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>เพศ</strong></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="ชาย">
                                <label class="form-check-label" for="male">
                                    ชาย
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="หญิง">
                                <label class="form-check-label" for="female">
                                    หญิง
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label"><strong>โทรศัพท์ <span class="text-danger">*</span></strong></label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="mail" class="form-label"><strong>อีเมล์</strong></label>
                            <input type="text" class="form-control" id="mail" name="mail">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label"><strong>ที่อยู่</strong></label>
                            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="complaints" class="form-label"><strong>รับเรื่องราวร้องทุกข์ <span class="text-danger">*</span></strong></label>
                            <input type="text" class="form-control" id="complaints" name="complaints" required>
                        </div>

                        <div class="mb-4">
                            <label for="files" class="form-label"><strong>รูปภาพ</strong></label>
                            <input type="file" class="form-control" id="files" name="files" accept="files/*">
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="รายละเอียด" id="details" name="details"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .ck-editor__editable {
        min-height: 300px !important;
        height: 300px !important;
        resize: none !important;
    }

</style>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector("#details"))
            .then(editor => {
                const editable = editor.ui.view.editable.element;
                editable.style.resize = "none";
                editable.style.overflow = "auto";
            })
            .catch(error => {
                console.error("CKEditor error:", error);
            });
    });

</script>

@endsection
