@extends('admin.layout.layout')
@section('pages_content')

<h3 class="text-center">แบบสอบถามความพึงพอใจ</h3><br>

<form method="GET" action="{{ route('AdminQuestions') }}">
    <div class="row mb-3 align-items-center">
        <div class="col-auto">
            <label for="year" class="col-form-label">แสดงข้อมูลตามปี:</label>
        </div>
        <div class="col-md-2">
            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
                <option value="" class="text-center">-- เลือกปี --</option>
                @for ($y = now()->year; $y >= 2020; $y--)
                    <option value="{{ $y }}"
                        {{ request('year') == $y ? 'selected' : '' }}
                        {{ in_array($y, $yearsWithData) ? '' : 'disabled' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>
    </div>
</form>

<br>
<h4 class="text-center">สรุปรวมคะแนนแต่ละหัวข้อ</h4>
<table class="table table-bordered" id="evaluation_questions_table">
    <thead class="text-center">
        <tr>
            <th class="text-center">ลำดับ</th>
            <th class="text-center">หัวข้อคำถาม</th>
            <th class="text-center">คะแนนรวม</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scoresByQuestion as $index => $score)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $score->question->questions_name ?? '-' }}</td>
                <td class="text-center">{{ $score->total_score }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<h4 class="text-center">ประวัติการประเมิน</h4>
<table class="table table-bordered" id="data_table">
    <thead>
        <tr>
            <th class="text-center">ลำดับ</th>
            <th class="text-center">ชื่อผู้ประเมิน</th>
            <th class="text-center">วันที่ประเมิน</th>
            <th class="text-center">คำถาม</th>
            <th class="text-center">คะแนน</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($responses as $index => $response)
        <tr>
            <td class="text-center">{{ $index + 1 }}</td>
            <td> <a href="{{ route('AdminShowEvaluator', $response->evaluator->id) }}">
                    {{ $response->evaluator->requester_name ?? '-' }}
                </a>
            </td>
            <td class="text-center">{{ $response->date ? \Carbon\Carbon::parse($response->date)->format('d/m/Y') : '-' }}</td>
            <td>{{ $response->question->questions_name ?? '-' }}</td>
            <td class="text-center">{{ $response->score }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{asset('js/evaluation_questions.js')}}"></script>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
