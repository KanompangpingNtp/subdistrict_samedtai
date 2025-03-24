@extends('admin.layout.layout')
@section('pages_content')

<button onclick="window.history.back();" class="btn btn-secondary">กลับ</button>

<br>

<h2 class="text-center">ข้อมูลผลิตภัณฑ์ <span class="text-primary">{{$listDetail->list_details_name}}</span> </h2><br>

<div class="card">
    <div class="card-body">

        @if($listDetail->details !== null)
        <form action="{{ route('CommunityProductDetailsDelete', $listDetail->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
        </form>
        @endif

        <br>

        @if(empty($listDetail->details))
        <p class="text-center">ไม่มีข้อมูล</p>
        @else
        <p>{!! $listDetail->details ?? 'ไม่มีข้อมูล' !!}</p>

        <div class="row">
            @foreach($listDetail->images->sortBy('status') as $image)
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $image->images_file) }}" class="img-fluid rounded">
            </div>
            @endforeach
        </div>
        @endif

    </div>
</div>

<br>

<form action="{{ route('CommunityProductDertailsCreate', $listDetail->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <div class="form-floating">
            <textarea class="form-control" placeholder="กรอกข้อมูล" id="details" name="details"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-md-6">
            <div class="mb-3">
                <label for="title_image" class="form-label">รูปหัวข้อ</label>
                <input type="file" class="form-control" id="title_image[]" name="title_image">
                <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png</small>
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="file_post" class="form-label">แนบไฟล์ภาพเพิ่มเติม</label>
            <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf</small>
            <!-- แสดงรายการไฟล์ที่แนบ -->
            <div id="file-list" class="mt-1">
                <div class="d-flex flex-wrap gap-3"></div>
            </div>
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

    <button class="btn btn-primary mt-2" type="submit" {{ $listDetail->details ? 'disabled' : '' }}>
        บันทึก
    </button>

</form>

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection
