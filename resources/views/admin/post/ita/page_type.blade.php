@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

@php
use Carbon\Carbon;
@endphp

<h3 class="text-center">สร้างหัวข้อ การประเมินคุณธรรม และความโปร่งใส (ITA) พ.ศ.{{ Carbon::now()->year + 543 }} </h3><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างชื่อหัวข้อ
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างชื่อหัวข้อ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('ITATypeCreate')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="type_name" class="form-label">ชื่อหัวข้อ</label>
                        <input type="text" class="form-control" id="type_name" name="type_name" required>
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

<table class="table table-bordered" id="data_table">
    <thead>
        <tr>
            <th>#</th>
            <th class="text-center">หัวข้อ</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($showITAType as $index => $detail)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td><a href="{{route('AdminITA',$detail->id)}}">{{ $detail->type_name ?? 'N/A' }}</a></td>
            <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $detail->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('ITATypeDelete', $detail->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($showITAType as $postDetail)
<div class="modal fade" id="editModal{{ $postDetail->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $postDetail->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <form action="{{ route('ITATypeUpdate', $postDetail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $postDetail->id }}">แก้หัวข้อ ITA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="type_name" class="form-label">ชื่อหัวข้อ</label>
                        <input type="text" class="form-control" id="type_name" name="type_name" value="{{ $postDetail->type_name }}" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
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
