@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<h3 class="text-center">สร้างหัวข้อแผนงานพัฒนาท้องถิ่น</h3><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างหัวข้อ
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างหัวข้อ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('OperationalPlanTypeCreate') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type_name" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="type_name" name="type_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>
<br>

<table class="table table-bordered text-center" id="data_table">
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>หัวข้อ</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($OperationalPlanType as $index => $details)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <a href="{{ route('OperationalPlanShowSection', $details->id) }}">
                    {{ $details->type_name }}
                </a>
            </td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $details->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>

                <form action="{{ route('OperationalPlanDelete', $details->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($OperationalPlanType as $details)
<div class="modal fade" id="editModal-{{ $details->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $details->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel-{{ $details->id }}">แก้ไขหัวข้อ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('OperationalPlanUpdate', $details->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type_name-{{ $details->id }}" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="type_name-{{ $details->id }}" name="type_name" value="{{ $details->type_name }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
