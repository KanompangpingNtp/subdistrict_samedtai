@extends('admin.layout.layout')
@section('pages_content')

<style>
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

<div class="container">
    <h3 class="text-center">ข้อมูลกระดานกระทู้ <br></h3><br>

    @foreach($forumDetail as $forum)
    <a href="{{route('ForumAdminDeatils',$forum->id )}}" class="forum-card rounded mb-2 border border-primary">
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
                <div class="flex-grow-1" style="font-size: 16px;">
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

                    <br>

                    <div class="text-end">
                        <form action="{{ route('ForumAdminDetailsDelete', $forum->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('คุณต้องการลบคอมเมนต์นี้ใช่หรือไม่?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">ลบกระทู้</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @endforeach

    @if ($forumDetail && $forumDetail->count() > 0)
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
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

@endsection
