@extends('admin.layout.layout')
@section('pages_content')

<h2 class="text-center">แกลอรี่ภาพถ่ายภูมิทัศน์</h2><br>

<div class="card mt-3">
    <div class="card-body">
        @forelse ($basicInfoDetail as $detail)
        <form action="{{ route('LandscapeGalleryDelete', $detail->id) }}" method="POST" onsubmit="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
        </form><br>

        <p>{!! $detail->details !!}</p>

        {{-- แสดงไฟล์ PDF --}}
        @if ($detail->pdf->count() > 0)
        <h6>ไฟล์ PDF:</h6>
        <ul>
            @foreach ($detail->pdf as $pdf)
            <li>
                <a href="{{ asset('storage/' . $pdf->pdf_file) }}" target="_blank">
                    ดาวน์โหลด PDF
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <p>ไม่มีไฟล์ PDF</p>
        @endif

        {{-- แสดงรูปภาพ --}}
        @if ($detail->images->count() > 0)
        <h6>รูปภาพ:</h6>
        <div class="d-flex flex-wrap">
            @foreach ($detail->images as $image)
            <div class="col-md-3 p-2">
                <img src="{{ asset('storage/' . $image->images_file) }}" class="img-fluid rounded" alt="รูปภาพ">
            </div>
            @endforeach
        </div>
        @else
        <p>ไม่มีรูปภาพ</p>
        @endif

        <hr>
        @empty
        <p class="text-center">ยังไม่มีข้อมูล</p>
        @endforelse
    </div>
</div>
<br>

<form action="{{route('LandscapeGalleryCreate')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="hidden" name="basic_info_type" value="{{ $basicInfoType->firstWhere('type_name', 'แกลอรี่ภาพถ่ายภูมิทัศน์')->id }}">
    </div>

    <div class="mb-3">
        <div class="form-floating">
            <textarea class="form-control" placeholder="กรอกข้อมูล" id="details" name="details"></textarea>
        </div>
    </div>

    <div class="mb-3">
        <label for="file_post" class="form-label">แนบไฟล์ภาพและPDF</label>
        <input type="file" class="form-control" id="file_post" name="file_post[]" multiple>
        <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png, pdf</small>
        <!-- แสดงรายการไฟล์ที่แนบ -->
        <div id="file-list" class="mt-1">
            <div class="d-flex flex-wrap gap-3"></div>
        </div>
    </div>

    {{-- <div class="mb-3">

        <label for="images_file" class="form-label">รูปภาพ</label>
        <input type="file" class="form-control" id="images_file" name="images_file">
    </div> --}}

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

    @if ($basicInfoDetail->isEmpty())
        <button class="btn btn-primary mt-2" type="submit">บันทึก</button><br>
    @else
        <p><span class="text-danger"># </span>หากต้องการบันทึกข้อมูลใหม่ให้ลบข้อมูลเก่าออก</p>
        <button class="btn btn-primary" type="submit" disabled>สร้างข้อมูลแล้ว</button><br>
    @endif

</form>

<script src="{{asset('js/multipart_files.js')}}"></script>

@endsection
