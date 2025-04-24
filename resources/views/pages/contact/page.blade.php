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

    /* กำหนดขนาดรูปภาพให้เท่ากัน */
    .image-container {
        width: 100%;
        height: 220px;
        /* ปรับความสูงที่ต้องการ */
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ให้รูปภาพเต็มพื้นที่และตัดส่วนที่เกิน */
    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
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
            <div class="fs-1 fw-bold mb-4 text-center"></div>
            <div class=" d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('images/navbar/Logo.png') }}" alt="icon" class="mb-3">
                <div class="d-flex flex-column justify-content-center align-items-center text-center lh-1">
                        <span class="fw-bold fs-2">องค์การบริหารส่วนตำบลเสม็ดใต้</span> <br>
                        <span class="fw-bold fs-4">Samedtai Subditrict Administrative Organization</span><br>
                        <span class="text-muted fs-4">
                            ลขที่ 111 หมู่ที่ 4 ตำบลเสม็ดใต้<br>
                            ภอบางคล้า จังหวัดฉะเชิงเทรา<br>
                            รหัสไปรษณีย์ : 24110
                        </span>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center lh-1 my-3">
                    <div class="d-flex justify-content-center align-items-start gap-2 mb-1">
                        <div>โทรศัพท์ : 0-3858-4130</div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start gap-2 mb-1">
                        <div>เบอร์แฟกซ์ : 0-3858-4383</div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start gap-2 mb-1">
                        <div>Email : saraban@samedtai.go.th </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start gap-2 mb-1">
                        <div>Facebook : องค์การบริหารส่วนตำบลเสม็ดใต้ </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start gap-2 mb-1">
                        <div>Line : @samedtaisao </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <div class="text-center">
                            <strong>ช่องทางการชำระค่าธรรมเนียมต่าง ๆ </strong><br>
                            (ภาษีบำรุงท้องที่, ค่าเก็บขนขยะ, ค่าธรรมเนียมต่างๆ)
                        </div>
                        {{-- <img src="{{ asset('images/contect/qr_code_01.png') }}" alt="qr-code"> --}}
                        -
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <strong>ช่องทางการติดต่อสอบถาม
                                อบต.เสม็ดใต้</strong>
                        </div>
                        {{-- <img src="{{ asset('images/contect/qr_code_03.png') }}" alt="qr-code"> --}}
                        -
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <strong>ช่องทางการติดต่อสอบถาม
                                กองคลัง</strong>
                        </div>
                        {{-- <img src="{{ asset('images/contect/qr_code_02.png') }}" alt="qr-code"> --}}
                        -
                    </div>
                </div>
                <br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.9494275034253!2d101.15822557329295!3d13.660839086721618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d3d555bd8730b%3A0x2b069fd03c990551!2z4Lit4LiH4LiE4LmM4LiB4Liy4Lij4Lia4Lij4Li04Lir4Liy4Lij4Liq4LmI4Lin4LiZ4LiV4Liz4Lia4Lil4LmA4Liq4Lih4LmH4LiU4LmD4LiV4LmJ!5e0!3m2!1sth!2sth!4v1743130921873!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
</div>
</div>

@endsection
