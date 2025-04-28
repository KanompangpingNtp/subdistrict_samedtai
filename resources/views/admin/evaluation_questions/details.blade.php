@extends('admin.layout.layout')
@section('pages_content')

<div class="container">
    <h3 class="text-center">แบบสอบถามความพึงพอใจ <br> ประวัติการประเมิน</h3><br>

    <div class="mb-4">
        <p><strong>ชื่อผู้ขอรับบริการ (บุคคลหรือหน่วยงาน):</strong> {{ $evaluator->requester_name ?? '-' }}</p>
        <p><strong>ที่อยู่ผู้ขอรับบริการ:</strong> {{ $evaluator->address ?? '-' }}</p>
        <p><strong>โทรศัพท์ผู้ขอรับบริการ:</strong> {{ $evaluator->phone_number ?? '-' }}</p>
        <p><strong>ขอรับบริการจาก (ชื่อหน่วยงานผู้ให้บริการ):</strong> {{ $evaluator->service_provider ?? '-' }}</p>
        <p><strong>เรื่องที่ขอรับบริการ:</strong> {{ $evaluator->requesting_service ?? '-' }}</p>
        <p><strong>ข้อเสนอแนะ:</strong> {{ $evaluator->other_suggestions ?? '-' }}</p>
    </div>

    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th>ลำดับ</th>
                <th>คำถาม</th>
                <th>คะแนน</th>
                <th>วันที่ประเมิน</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluator->responses as $index => $response)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $response->question->questions_name ?? '-' }}</td>
                <td class="text-center">{{ $response->score }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($response->date)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
