@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<button onclick="window.history.back();" class="btn btn-secondary">กลับ</button>

<br>

<h2 class="text-center">อำนาจหน้าที่ <span class="text-primary">{{$AuthorityType->type_name}}</span> </h2><br>

<div class="card">
    <div class="card-body">
        @foreach ($AuthorityDetails as $detail)
        <p>{!! $detail->details ?? 'ไม่มีข้อมูล' !!}</p>

        <br>

        @if($AuthorityDetails->isNotEmpty() && $AuthorityDetails->first()->files->where('files_type', 'pdf')->isNotEmpty())
        <div class="row justify-content-center">
            @foreach($AuthorityDetails->first()->files->where('files_type', 'pdf') as $file)
            <div class="col-md-5">
                <embed src="{{ asset('storage/' . $file->files_path) }}" type="application/pdf" width="100%" height="500px">
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center">ไม่มีไฟล์ PDF</p>
        @endif

        <br>

        @if($AuthorityDetails->isNotEmpty() && $AuthorityDetails->first()->files->whereIn('files_type', ['jpg', 'jpeg', 'png'])->isNotEmpty())
        <div class="row justify-content-center">
            @foreach($AuthorityDetails->first()->files->whereIn('files_type', ['jpg', 'jpeg', 'png']) as $file)
            <div style="width: 15%; height: auto; text-align: center;">
                <img src="{{ asset('storage/' . $file->files_path) }}" class="img-fluid rounded mx-auto d-block">
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center">ไม่มีรูปภาพ</p>
        @endif

        <br>

        @endforeach
    </div>

</div>

<br>

<form action="{{ route('AuthorityDetailCreate', $AuthorityType->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <div class="form-floating">
            <textarea class="form-control" placeholder="กรอกข้อมูล" id="details" name="details"></textarea>
        </div>
    </div>

    <div class="mb-3">
        <label for="file_post" class="form-label">แนบไฟล์ภาพเพิ่มเติม</label>
        <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf</small>
        <!-- แสดงรายการไฟล์ที่แนบ -->
        <div id="file-list" class="mt-1">
            <div class="d-flex flex-wrap gap-3"></div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector("#details"))
                .then(editor => {
                    editor.ui.view.editable.element.style.minHeight = "400px";
                    editor.ui.view.editable.element.style.height = "400px";
                })
                .catch(error => {
                    console.error("CKEditor error:", error);
                });
        });

    </script>

    <style>
        /* ใช้ CSS เพื่อบังคับให้ CKEditor มีความสูงที่แน่นอน */
        .ck-editor__editable {
            min-height: 400px !important;
            /* ป้องกันขนาดเปลี่ยนแปลงเมื่อกด */
        }

    </style>

    <button class="btn btn-primary mt-2" type="submit" @if($AuthorityDetails->isNotEmpty()) disabled @endif>
        บันทึก
    </button>

    {{-- @if($listDetail->details !== null)
        <form action="{{ route('AuthorityDetailsDelete', $listDetail->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
        </form>
        @endif --}}

    <br>
    <br>

</form>

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection
