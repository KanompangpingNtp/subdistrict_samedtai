@extends('admin.layout.layout')
@section('pages_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<a href="{{route('ManagePersonnel')}}" class="btn btn-primary btn-sm">กลับ</a>

<h2 class="text-center">จัดการข้อมูลหน่วยงานย่อย <span class="text-primary">{{ $PersonnelRank->personnel_rank_name }}</span></h2><br>

<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    สร้างข้อมูลบุคลากร
</button>

<a href="{{route('PersonnelGroupPhotoPage',$PersonnelRank->id )}}" class="btn btn-primary btn-sm">เพิ่มรูปกลุ่ม</a>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">สร้างข้อมูลบุคลากร</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('PersonnelDetailsCreate', $PersonnelRank->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">ชื่อบุคลากร</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" >
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">แผนก</label>
                        <input type="text" class="form-control" id="department" name="department" >
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

                    <div class="mb-3">
                        <label for="post_photo_file" class="form-label">อัปโหลดรูปภาพ</label>
                        <input type="file" class="form-control" id="post_photo_file" name="post_photo_file" accept=".jpg,.jpeg,.png">
                        <small class="form-text text-muted">รองรับไฟล์ประเภท JPG, JPEG, PNG</small>
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
            <th>ชื่อบุคลากร</th>
            <th>เบอร์ติดต่อ</th>
            <th>แผนก</th>
            <th>ระดับความสำคัญ</th>
            <th>รูปภาพ</th>
            <th>การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($PersonnelDetail as $key => $detail)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $detail->full_name }}</td>
            <td>{{ $detail->phone }}</td>
            <td>{{ $detail->department }}</td>
            <td>{{ $detail->status }}</td>
            <td>
                @if ($detail->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $detail->images->first()->post_photo_file) }}" alt="รูปภาพ" style="width: 100px; height: auto;">
                @else
                    <span class="text-muted">ไม่มีรูปภาพ</span>
                @endif
            </td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $detail->id }}">
                    <i class="bi bi-pencil-square"></i>
                </button>

                <form action="{{ route('PersonnelDetailsDelete', $detail->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@foreach ($PersonnelDetail as $detail)
<div class="modal fade" id="editModal{{ $detail->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $detail->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('PersonnelDetailsUpdate', $detail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{ $detail->id }}">แก้ไขข้อมูลบุคลากร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">ชื่อบุคลากร</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $detail->full_name }}" >
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $detail->phone }}" >
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">แผนก</label>
                        <input type="text" class="form-control" id="department" name="department" value="{{ $detail->department }}" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ระดับความสำคัญ</label>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status{{ $i }}" value="{{ $i }}"
                                        @if ($detail->status == $i) checked @endif required>
                                    <label class="form-check-label" for="status{{ $i }}">{{ $i }}</label>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="post_photo_file" class="form-label">อัปโหลดรูปภาพ</label>
                        @if ($detail->images->isNotEmpty())
                            <!-- แสดงตัวอย่างรูปภาพที่มีอยู่ -->
                            <div>
                                <img src="{{ asset('storage/' . $detail->images->first()->post_photo_file) }}" alt="รูปภาพ" style="width: 100px; height: auto;">
                                <br>
                                <small class="text-muted">รูปภาพที่อัปโหลดแล้ว</small>
                                <input type="checkbox" name="remove_image" id="remove_image" value="1">
                                <label for="remove_image">ลบ</label>
                            </div>
                        @endif

                        <br>

                        <!-- ฟอร์มอัปโหลดไฟล์ใหม่ -->
                        <input type="file" class="form-control" id="post_photo_file" name="post_photo_file" accept=".jpg,.jpeg,.png">
                        <small class="form-text text-muted">รองรับไฟล์ประเภท JPG, JPEG, PNG</small>
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
