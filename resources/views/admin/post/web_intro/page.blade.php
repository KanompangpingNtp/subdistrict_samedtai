@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<h2 class="text-center">Intro หน้าเว็บไซต์</h2><br>

@if(isset($Image) && $Image->isNotEmpty())
@foreach($Image as $item)
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" @if($item && $item->id) disabled @endif>
    ใส่รูปภาพ
</button>
@endforeach
@else
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ใส่รูปภาพ
</button>
@endif




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> ใส่รูปภาพ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('WebIntroCreate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="files_path" class="form-label">แนบไฟล์ภาพพื้นหลัง</label>
                        <input type="file" class="form-control" id="files_path" name="files_path">
                        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png</small>
                    </div>

                    <button type="button" id="addButton" class="btn btn-primary btn-sm">เพิ่มปุ่ม</button>

                    <div id="buttonContainer" style="display: none;">
                        <div class="mb-3 mt-3">
                            <label for="button_name" class="form-label">ชื่อปุ่ม</label>
                            <input type="text" class="form-control" id="button_name" name="button_name">
                        </div>

                        <div class="mb-3">
                            <label for="button_link" class="form-label">แนบลิงค์</label>
                            <input type="url" class="form-control" id="button_link" name="button_link" placeholder="https://example.com">
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

@foreach($Image as $item)
<div class="image-container">
    <img src="{{ asset('storage/' . $item->files_path) }}" alt="Image" style="max-width: 100%; height: auto;">
    <p>ประเภทไฟล์: {{ $item->files_type }}</p>
</div>

<form action="{{ route('WebIntroDelete', $item->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
</form>

@endforeach

<script src="{{asset('js/datatable.js')}}"></script>

<script>
    document.getElementById("addButton").addEventListener("click", function() {
        var container = document.getElementById("buttonContainer");
        container.style.display = (container.style.display === "none") ? "block" : "none";
    });
    </script>


@endsection
