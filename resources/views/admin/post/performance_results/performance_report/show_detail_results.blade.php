@extends('admin.layout.layout')
@section('pages_content')

<button onclick="window.history.back();" class="btn btn-secondary">กลับ</button>

<h2 class="text-center">สร้างรายละเอียด <br><span class="text-primary">{{$PerfResultsMinorDetail->detail_name}}</span></h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    เพิ่มไฟล์เอกสาร
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> เพิ่มไฟล์เอกสาร</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('PerformanceReportDertailsCreateResults', $PerfResultsMinorDetail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_post" class="form-label">แนบไฟล์ภาพเพิ่มเติม</label>
                        <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
                        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf</small>

                        <div id="file-list" class="mt-1">
                            <div class="d-flex flex-wrap gap-3"></div>
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

@if($PerfResultsMinorDetail->files->isNotEmpty())
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อไฟล์</th>
            <th>ประเภทไฟล์</th>
            <th>Ation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($PerfResultsMinorDetail->files as $index => $file)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ basename($file->file_path) }}</td>
            <td>{{ strtoupper($file->file_type) }}</td>
            <td class="text-center align-middle">
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="btn btn-primary btn-sm">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </a>
                    <form action="{{ route('PerformanceReportDertailsDeleteResults', $file->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบไฟล์นี้หรือไม่?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-center">ไม่มีข้อมูล</p>
@endif

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection
