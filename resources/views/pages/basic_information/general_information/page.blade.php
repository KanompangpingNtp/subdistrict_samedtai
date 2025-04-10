@extends('layout.main.app')
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

</style>
<div class="bg py-5">
    <div class="container py-5 custom-gradient-shadow">
        <div class=" d-flex flex-column justify-content-center p-5">
            <div class="fs-1 fw-bold mb-4 text-center">ข้อมูลสภาพทั่วไป</div>
            @forelse ($basicInfoDetail as $detail)

            <p>{!! $detail->details !!}</p>

            {{-- แสดงไฟล์ PDF --}}
            @if ($detail->pdf->count() > 0)
            <h6>ไฟล์ PDF:</h6>
            <ul>
                @foreach ($detail->pdf as $pdf)
                <li>
                    <a href="{{ asset('storage/' . $pdf->pdf_file) }}" target="_blank">
                        ดาวน์โหลด PDF
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <p></p>
            @endif

            {{-- แสดงรูปภาพ --}}
            @if ($detail->images->count() > 0)
            <p class="text-center"><strong>ตราสัญญาลักษณ์</strong></p>
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($detail->images as $image)
                <div class="col-md-3 p-2 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $image->images_file) }}" class="img-fluid rounded" alt="รูปภาพ">
                </div>
                @endforeach
            </div>
            @else
            <p class="text-center"></p>
            @endif


            @empty
            <p class="text-center"></p>
            @endforelse

        </div>
    </div>
</div>


@endsection
