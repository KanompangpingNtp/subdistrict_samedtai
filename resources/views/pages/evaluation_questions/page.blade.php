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
@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: '{{ $message }}'
    , })

</script>
@endif

<div class="bg py-5">
    <div class="container py-5 custom-gradient-shadow">
        <div class=" d-flex flex-column p-5 ">
            <div class="fs-1 fw-bold mb-4 text-center">แบบสอบถามความพึงพอใจ</div><br>

            <form action="{{route('EvaluationQuestionsCreate')}}" method="POST" style="font-size: 17px;">
                @csrf

                <div class="mb-3 row align-items-center">
                    <label for="requester_name" class="col-md-3 col-form-label">ชื่อผู้ขอรับบริการ (บุคคลหรือหน่วยงาน)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="requester_name" name="requester_name">
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="address" class="col-md-3 col-form-label">ที่อยู่ผู้ขอรับบริการ</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="phone_number" class="col-md-3 col-form-label">โทรศัพท์ผู้ขอรับบริการ</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="service_provider" class="col-md-3 col-form-label">ขอรับบริการจาก (ชื่อหน่วยงานผู้ให้บริการ)</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="service_provider" name="service_provider">
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="requesting_service" class="col-md-3 col-form-label">เรื่องที่ขอรับบริการ</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="requesting_service" name="requesting_service">
                    </div>
                </div>

                <br>

                @foreach ($questionGroups as $group)
                <h5 class="mt-4"><strong>{{ $group->id }}. {{ $group->type_name }}</strong></h5>

                <table class="table table-bordered">
                    <thead class="bg-primary"
                        <tr>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">ลำดับ</th>
                            <th rowspan="2" class="text-center align-middle">คำถาม</th>
                            <th colspan="5" class="text-center">ระดับความพึงพอใจ</th>
                        </tr>
                        <tr>
                            <th class="text-center">มากที่สุด</th>
                            <th class="text-center">มาก</th>
                            <th class="text-center">ปานกลาง</th>
                            <th class="text-center">น้อย</th>
                            <th class="text-center">ควรปรับปรุง</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->evaluationQuestions as $index => $question)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $question->questions_name }}</td>
                            @for ($i = 5; $i >= 1; $i--)
                            <td class="text-center">
                                <input type="radio" name="responses[{{ $question->id }}]" value="{{ $i }}" id="question_{{ $question->id }}_{{ $i }}" required>
                            </td>
                            @endfor

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach

                <div class="mb-3 row align-items-center">
                    <label for="other_suggestions" class="col-form-label">ข้อเสนอแนะ</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="other_suggestions" name="other_suggestions" rows="3"></textarea>
                    </div>
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">ส่งแบบประเมิน</button>
                </div>

            </form>
        </div>

    </div>
</div>
</div>
@endsection
