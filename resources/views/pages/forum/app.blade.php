@extends('layout.main.app')
@section('content')
    <style>
        .bg {
            background-image: url('{{ asset('images/base_data/bg-base-data.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .custom-gradient-shadow {
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(255, 0, 102, 0.3),
                0 0 50px -10px rgba(255, 102, 178, 0.8),
                0 0 50px -10px rgba(255, 153, 204, 0.8);
            background-color: #ffffff;
        }

    .forum-card {
        /* กำหนดเส้นขอบที่ถูกต้อง */
        transition: transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
        /* ลบขีดเส้นใต้ */
        color: inherit;
        /* ให้สีตัวอักษรไม่เปลี่ยน */
        display: block;
        /* ทำให้คลิกได้เต็มพื้นที่ */
    }


    .forum-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .forum-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }

    .hidden-img {
        display: none;
    }

</style>

<div class="bg py-5">
    <div class="container p-5 custom-gradient-shadow">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
            <p class="fs-2 fw-bold text-center mb-0">กระดานกระทู้</p> <!-- แก้ไข mb-0 เพื่อไม่ให้มี margin ด้านล่าง -->
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createForumModal">สร้างกระทู้</a>
        </div>

        @foreach($forumDetail as $forum)
        <a href="{{route('ForumDeatils',$forum->id )}}" class="forum-card rounded mb-2 border border-primary">
            <div class="card p-3 shadow-sm">
                <div class="d-flex flex-column flex-lg-row align-items-center">
                    @forelse ($forum->files as $file)
                    @if (Str::startsWith($file->file_type, 'image/'))
                    <img src="{{ asset('storage/' . $file->file_path) }}" alt="Forum Image" class="forum-img rounded me-3 mb-2">
                    @endif
                    @empty
                    <img src="{{ asset('images/navbar/Logo.png') }}" alt="Default Forum Image" class="forum-img rounded me-3 mb-2">
                    @endforelse

                    <!-- ข้อมูลกระทู้ -->
                    <div class="flex-grow-1">
                        <h5 class="mb-1">{{ $forum->title }}</h5>
                        <p class="text-muted mb-1">{{ strip_tags($forum->description) }}</p>
                        <div class="text-muted small">
                            <span>โพสต์โดย: <strong>{{ $forum->user->name ?? 'ผู้ใช้งานทั่วไป' }}</strong></span>
                        </div>
                        <div class="d-flex flex-column flex-lg-row justify-content-between text-muted small">
                            <span>วันที่ตั้งกระทู้:
                                {{ \Carbon\Carbon::parse($forum->created_at)->format('d/m/Y H:i') }}</span>
                            <span><i class="bi bi-chat-dots"></i> {{ $forum->comments->count() }} ความคิดเห็น</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach

        @if ($forumDetail && $forumDetail->count() > 0)
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start mt-5">
                <!-- Previous button -->
                <li class="page-item {{ $forumDetail->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $forumDetail->previousPageUrl() }}">ก่อนหน้า</a>
                </li>

                <!-- Page number buttons -->
                @foreach ($forumDetail->getUrlRange(1, $forumDetail->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $forumDetail->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach

                <!-- Next button -->
                <li class="page-item {{ !$forumDetail->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $forumDetail->nextPageUrl() }}">ต่อไป</a>
                </li>
            </ul>
        </nav>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createForumModal" tabindex="-1" aria-labelledby="createForumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createForumModalLabel">สร้างกระทู้ใหม่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size: 16px;">

                    <form action="{{route('ForumFormCreate')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="forumTitle" class="form-label">หัวข้อกระทู้</label>
                            <input type="text" class="form-control" id="forumTitle" name="title" required>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="รายละเอียด" id="detail" name="description"></textarea>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="attachments" class="form-label">แนบไฟล์ </label>
                            <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
                            <small class="text-muted">ประเภทไฟล์ที่รองรับ: jpg, jpeg, png </small>
                            <div id="file-list" class="mt-1">
                                <div class="d-flex flex-wrap gap-3"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">สร้างกระทู้</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/multipart_files.js') }}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("#detail, #editdetail").forEach(textarea => {
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    const editable = editor.ui.view.editable.element;
                    editable.style.resize = "none";
                    editable.style.overflow = "auto";
                })
                .catch(error => {
                    console.error("CKEditor error:", error);
                });
        });
    });

</script>

<style>
    .ck-editor__editable {
        min-height: 150px !important;
    }

</style>

@endsection
