@extends('layout.app')
@section('content')
<style>
    .bg {
        background-image: url('{{ asset('images/base_data/bg-base-data.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }

    .custom-gradient-shadow {
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3),
            /* เงาพื้นฐาน */
            0 0 50px -10px rgba(158, 255, 3, 0.8),
            /* เงาสีฟ้าเข้ม */
            0 0 50px -10px rgba(72, 255, 0, 0.8);
        /* เงาสีฟ้าอ่อน */
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
        /* เส้นสีฟ้าที่ด้านบน */
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
            <div class="fs-1 fw-bold mb-4 text-center" style="color: #77b329;">ป้ายประกาศ <br><span class="fs-3">{{$noticeBoard->topic_name}}</span></div>

            <p class="text-muted">วันที่เผยแพร่: {{ \Carbon\Carbon::parse($noticeBoard->created_at)->format('d-m-Y') }}</p>


            @if ($noticeBoard->photos->whereIn('post_photo_status', ['1', '2'])->count() > 0)
            <h5 class="text-secondary">รูปภาพ</h5>

            <div class="row">
                @foreach ($noticeBoard->photos->whereIn('post_photo_status', ['1', '2']) as $index => $photo)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 text-center">
                    <!-- แสดงภาพขนาดเท่าต้นฉบับ -->
                    <img src="{{ asset('storage/' . $photo->post_photo_file) }}" alt="รูปแนบ" style="width: auto; height: auto; max-width: 100%; max-height: 500px;" data-bs-toggle="modal" data-bs-target="#photoModal{{ $index }}">
                </div>

                <!-- Modal สำหรับแต่ละรูป -->
                <div class="modal fade" id="photoModal{{ $index }}" tabindex="-1" aria-labelledby="photoModalLabel{{ $index }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/' . $photo->post_photo_file) }}" class="img-fluid" style="max-height: 80vh; width: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
