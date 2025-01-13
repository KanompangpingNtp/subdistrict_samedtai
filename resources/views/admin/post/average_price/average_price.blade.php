@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<h2 class="text-center">ประกาศราคากลาง</h2>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างประกาศราคากลาง
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างประกาศราคากลาง</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('AveragePriceCreate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="post_type_id" value="{{ $postTypes->firstWhere('type_name', 'ประกาศราคากลาง')->id }}">
                        <label for="date" class="form-label">วันที่</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="mb-3">
                        <label for="title_name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="title_name" name="title_name">
                    </div>

                    <div class="mb-3">
                        <label for="file_post" class="form-label">แนบไฟล์ภาพและPDF</label>
                        <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
                        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf (ขนาดไม่เกิน 10MB)</small>
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
    <thead class="text-center">
        <tr>
            <th>#</th>
            <th>ประเภท</th>
            <th>วันที่</th>
            <th>ชื่อ</th>
            <th>ไฟล์ PDF</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($postDetails as $index => $postDetail)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $postDetail->postType->type_name ?? 'N/A' }}</td>
            <td>{{ $postDetail->date ?? 'N/A' }}</td>
            <td>{{ $postDetail->title_name ?? 'N/A' }}</td>
            <td>
                @foreach ($postDetail->pdfs as $pdf)
                <a href="{{ asset('storage/' . $pdf->post_pdf_file) }}" target="_blank">
                    {{ basename($pdf->post_pdf_file) }}
                </a><br>
                @endforeach
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $postDetail->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <form action="{{ route('AveragePriceDelete', $postDetail->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@foreach ($postDetails as $postDetail)
<div class="modal fade" id="editModal{{ $postDetail->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $postDetail->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top: 5%;">
        <div class="modal-content">
            <form action="{{ route('AveragePriceUpdate', $postDetail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $postDetail->id }}">แก้ไขประกาศ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- วันที่ -->
                    <div class="mb-3">
                        <label for="date{{ $postDetail->id }}" class="form-label">วันที่</label>
                        <input type="date" class="form-control" id="date{{ $postDetail->id }}" name="date" value="{{ $postDetail->date }}">
                    </div>

                    <!-- ชื่อเรื่อง -->
                    <div class="mb-3">
                        <label for="title{{ $postDetail->id }}" class="form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control" id="title{{ $postDetail->id }}" name="title_name" value="{{ $postDetail->title_name }}">
                    </div>

                    <!-- แสดงไฟล์ PDF ที่มีอยู่ -->
                    <div class="mb-3">
                        <label class="form-label">ไฟล์ PDF ที่มีอยู่ (หากต้องการเปลี่ยนไฟล์เดิมให้เลือกไฟล์ที่มีอยู่แล้วตรงนี้ และอัพโหลดไฟล์ใหม่)</label>
                        <div>
                            @foreach ($postDetail->pdfs as $pdf)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="delete_files[]" value="{{ $pdf->id }}" id="deleteFile{{ $pdf->id }}">
                                    <label class="form-check-label" for="deleteFile{{ $pdf->id }}">
                                        <a href="{{ asset('storage/' . $pdf->post_pdf_file) }}" target="_blank">
                                            {{ basename($pdf->post_pdf_file) }}
                                        </a>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- อัปโหลดไฟล์ PDF ใหม่ -->
                    <div class="mb-3">
                        <label for="file_post{{ $postDetail->id }}" class="form-label">อัปโหลดไฟล์ PDF ใหม่</label>
                        <input type="file" class="form-control" id="file_post{{ $postDetail->id }}" name="file_post[]" multiple>
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
