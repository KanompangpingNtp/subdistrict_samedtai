@extends('admin.layout.layout')
@section('pages_content')

<button onclick="window.history.back();" class="btn btn-secondary">กลับ</button>

<h2 class="text-center">รายงานงบการเงิน <br><span class="text-primary">{{$PerfResultsDetail->detail_name}}</span></h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างหัวข้อย่อย
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างหัวข้อย่อย <span class="text-primary">{{$PerfResultsDetail->detail_name}}</span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('PerformanceReportDertailsCreate', $PerfResultsDetail->id)}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_name" class="form-label">ชื่อหัวข้อย่อย</label>
                        <input type="text" class="form-control" id="detail_name" name="detail_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>
<br>

<table class="table table-bordered" id="data_table">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อหัวข้อย่อย</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($PerfResultsMinorDetail as $index => $detail)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <a href="{{ route('PerformanceReportShowDertailResults', $detail->id) }}">
                    {{ $detail->detail_name }}
                </a>
            </td>

            <td class="text-center">
                <div class="d-inline-block">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $detail->id }}">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>

                <div class="d-inline-block">
                    <form action="{{ route('PerformanceReportDertailsDelete', $detail->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@foreach($PerfResultsMinorDetail as $detail)
<div class="modal fade" id="editModal{{ $detail->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $detail->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel{{ $detail->id }}"> แก้ไขข้อมูลย่อย</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('PerformanceReportDertailsUpdate', $detail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_name{{ $detail->id }}" class="form-label">ชื่อรายละเอียดย่อย</label>
                        <input type="text" class="form-control" id="detail_name{{ $detail->id }}" name="detail_name" value="{{ $detail->detail_name }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<script src="{{asset('js/datatable.js')}}"></script>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
