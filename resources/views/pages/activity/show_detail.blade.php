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
            <div class="fs-1 fw-bold mb-4 text-center" style="color: #FF66B2;">ข่าวประชาสัมพันธ์ <br><span class="fs-3">{{$activity->title_name}}</span></div>

            <p class="text-muted">วันที่เผยแพร่: {{ \Carbon\Carbon::parse($activity->date)->format('d-m-Y') }}</p>

            <div class="mb-4">
                <h5 class="text-secondary">รายละเอียด</h5>
                <p>{{ $activity->details ?? 'ไม่มีรายละเอียด' }}</p>
            </div>

            @if ($activity->photos->whereIn('post_photo_status', ['1', '2'])->count() > 0)
            <h5 class="text-secondary">รูปภาพ</h5>
            <div class="row">
                @foreach ($activity->photos->whereIn('post_photo_status', ['1', '2']) as $index => $photo)
                <div class="col-lg-1 col-md-2 col-sm-3 col-4 mb-3 text-center">
                    <img src="{{ asset('storage/' . $photo->post_photo_file) }}" class="img-thumbnail rounded shadow-sm" alt="รูปแนบ" style="max-width: 100px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#photoModal{{ $index }}">
                </div>

                <!-- Modal สำหรับแต่ละรูป -->
                <div class="modal fade" id="photoModal{{ $index }}" tabindex="-1" aria-labelledby="photoModalLabel{{ $index }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/' . $photo->post_photo_file) }}" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- ไฟล์แนบ: PDF -->
            @if ($activity->pdfs->count() > 0)
            <h5 class="text-secondary mt-4">ไฟล์เอกสาร</h5>
            @foreach ($activity->pdfs as $pdf)
            <div class="mb-3">
                <iframe src="{{ asset('storage/' . $pdf->post_pdf_file) }}" width="100%" height="700px"></iframe>
            </div>
            @endforeach
            @endif

            <!-- วิดีโอแนบ -->
            @if ($activity->videos->count() > 0)
            <h5 class="text-secondary mt-4">วิดีโอ</h5>
            @foreach ($activity->videos as $video)
            <div class="mb-4">
                <video width="500" height="300" controls>
                    <source src="{{ asset('storage/' . $video->post_video_file) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>
@endsection
