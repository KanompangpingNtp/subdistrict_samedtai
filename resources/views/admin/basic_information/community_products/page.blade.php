@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<h2 class="text-center">ผลิตภัณฑ์ชุมชน</h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างชื่อ ผลิตภัณฑ์
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> สร้างชื่อ ผลิตภัณฑ์</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('CommunityProductsNameCreate') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="basic_info_type" value="{{ $basicInfoType->firstWhere('type_name', 'ผลิตภัณฑ์ชุมชน')->id }}">
                        <label for="list_details_name" class="form-label">ชื่อผลิตภัณฑ์</label>
                        <input type="text" class="form-control" id="list_details_name" name="list_details_name" required>
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
            <th>ชื่อผลิตภัณฑ์</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDetail as $index => $detail)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <a href="{{ route('CommunityProductShowDertails', $detail->id) }}">
                    {{ $detail->list_details_name }}
                </a>
            </td>

            <td class="text-center">
                <div class="d-inline-block">
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>

                <div class="d-inline-block">
                    <form action="{{ route('CommunityProductDelete', $detail->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้?');">
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

@foreach($listDetail as $detail)
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel"> แก้ไขชื่อ ผลิตภัณฑ์</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('CommunityProductsNameUpdate', $detail->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="basic_info_type" value="{{ $basicInfoType->firstWhere('type_name', 'ผลิตภัณฑ์ชุมชน')->id }}">
                    <div class="mb-3">
                        <label for="list_details_name" class="form-label">ชื่อผลิตภัณฑ์</label>
                        <input type="text" class="form-control" id="list_details_name" name="list_details_name" value="{{ old('list_details_name', $detail->list_details_name) }}" required>
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
