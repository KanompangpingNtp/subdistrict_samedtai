@extends('admin.layout.layout')
@section('pages_content')

<h2>ข้อมูลบุคลากร</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>หน่วยงาน</th>
            <th>ระดับความสำคัญ (Status)</th>
            <th>ตำแหน่ง</th>
            <th>ชื่อบุคคล</th>
            <th>โทรศัพท์</th>
            <th>รูปภาพ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($agencies as $agency)
            <tr>
                <td rowspan="{{ $agency->ranks->sum(fn($rank) => $rank->details->count()) + $agency->ranks->count() }}">
                    {{ $agency->personnel_agency_name }}
                </td>
                @foreach ($agency->ranks as $rank)
                    <td rowspan="{{ $rank->details->count() + 1 }}">
                        {{ $rank->status }}
                    </td>
                    @foreach ($rank->details as $detail)
                        <td>{{ $rank->personnel_rank_name }}</td>
                        <td>{{ $detail->full_name }}</td>
                        <td>{{ $detail->phone }}</td>
                        <td>
                            @foreach ($detail->images as $image)
                                <img src="{{ asset('storage/' . $image->post_photo_file) }}" alt="Image" width="50">
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    @if ($rank->details->isEmpty())
                        <tr>
                            <td colspan="4">ไม่มีข้อมูลบุคคล</td>
                        </tr>
                    @endif
                @endforeach
                @if ($agency->ranks->isEmpty())
                    <tr>
                        <td colspan="5">ไม่มีข้อมูลตำแหน่ง</td>
                    </tr>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
