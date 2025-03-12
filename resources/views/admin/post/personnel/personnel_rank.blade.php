@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<h2 class="text-center">จัดการข้อมูลหน่วยงานย่อย <span class="text-primary">{{ $PersonnelAgency->personnel_agency_name }}</span></h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างหน่วยงานย่อย
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างหน่วยงานย่อย</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('PersonnelRankCreate', $PersonnelAgency->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="personnel_rank_name" class="form-label">ชื่อหน่วยงานย่อย</label>
                        <input type="text" class="form-control" id="personnel_rank_name" name="personnel_rank_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ระดับความสำคัญ</label>
                        <div>
                            @for ($i = 1; $i <= 5; $i++) <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status{{ $i }}" value="{{ $i }}" required>
                                <label class="form-check-label" for="status{{ $i }}">{{ $i }}</label>
                        </div>
                        @endfor
                    </div>
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

<table class="table table-bordered text-center" id="data_table">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อหน่วยงานย่อย</th>
            <th>ระดับความสำคัญ</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($PersonnelRank as $index => $rank)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td><a href="{{ route('PersonnelDetails', $rank->id) }}">
                    {{ $rank->personnel_rank_name }}
                </a></td>
            <td>{{ $rank->status }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $rank->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>

                <form action="{{ route('PersonnelRankDelete', $rank->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($PersonnelRank as $rank)
<div class="modal fade" id="editModal{{ $rank->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $rank->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('PersonnelRankUpdate', $rank->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $rank->id }}">แก้ไขหน่วยงานย่อย</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="personnel_rank_name" class="form-label">ชื่อหน่วยงานย่อย</label>
                        <input type="text" class="form-control" id="personnel_rank_name" name="personnel_rank_name" value="{{ $rank->personnel_rank_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ระดับความสำคัญ</label>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status{{ $i }}" value="{{ $i }}"
                                        @if ($rank->status == $i) checked @endif required>
                                    <label class="form-check-label" for="status{{ $i }}">{{ $i }}</label>
                                </div>
                            @endfor
                        </div>
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
