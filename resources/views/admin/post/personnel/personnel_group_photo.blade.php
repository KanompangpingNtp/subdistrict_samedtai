@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

{{-- <a href="{{route('PersonnelGroupPhotoPage')}}" class="btn btn-primary btn-sm">กลับ</a> --}}

<h2 class="text-center">จัดการรูปกลุ่ม <span class="text-primary">{{ $PersonnelRank->personnel_rank_name }}</span></h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    เพิ่มรูปกลุ่ม
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มรูปกลุ่ม</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('PersonnelGroupPhotoCreate',$PersonnelRank->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="file_post" class="form-label">แนบไฟล์ภาพ</label>
                        <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
                        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png (ขนาดไม่เกิน 10MB)</small>
                        <!-- แสดงรายการไฟล์ที่แนบ -->
                        <div id="file-list" class="mt-1">
                            <div class="d-flex flex-wrap gap-3"></div>
                        </div>
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
            <th>รูปภาพ</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($PersonnelGroupPhoto as $index => $photo)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <img src="{{ asset('storage/' . $photo->group_photo_file) }}" alt="รูปบุคลากร" width="100">
            </td>
            <td class="text-center">
                <form action="{{ route('PersonnelGroupPhotoDelete', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/datatable.js')}}"></script>
<script src="{{ asset('js/multipart_files.js') }}"></script>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
