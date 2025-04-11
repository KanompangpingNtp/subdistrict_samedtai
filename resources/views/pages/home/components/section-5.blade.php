<style>
    .bg-page5 {
        background-image: url('{{ asset('images/section-5/bg-5.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-5 {
        font-size: 60px;
        color: rgb(0, 0, 0);
        text-shadow: 4px 2px 3px rgba(255, 255, 255, 0.9);
        font-weight: bold;
    }

    .bg-details-section-5 {
        background: linear-gradient(to bottom, rgba(148, 148, 148, 0.521), rgba(146, 146, 146, 0.514));
        border-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .button-viewall-section-5 {
        background: linear-gradient(to right, rgb(138, 241, 255), rgb(138, 241, 255));
        border-radius: 15px;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 25px;
        font-weight: bold;
        color: black;
        padding: 10px 20px;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงแบบ Smooth */
    }

    .button-viewall-section-5:hover {
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(255, 157, 211));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .bg-pink-card-section-5 {
        background-color: rgb(255, 157, 211);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        color: #000;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-pink-card-section-5:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .bg-blue-card-section-5 {
        background-color: rgb(191, 248, 255);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        color: #000;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-blue-card-section-5:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(191, 248, 255, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .card-img-wrapper {
        height: 200px;
        /* กำหนดความสูงคงที่ของภาพ */
        overflow: hidden;
        /* ซ่อนส่วนเกิน */
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-img-top {
        width: 100%;
        /* ทำให้ภาพครอบคลุมความกว้างของการ์ด */
        height: 100%;
        /* ทำให้ภาพครอบคลุมความสูงที่กำหนด */
        object-fit: cover;
        /* รักษาสัดส่วนภาพและครอบคลุมพื้นที่ */
    }

    .bg-text-card-section-5 {
        background-color: white;
    }

    .section5-image-wrapper {
        position: relative;
        width: 100%;
        max-width: 300px;
        /* ปรับขนาดรูป */
        cursor: pointer;
        overflow: hidden;
        border-radius: 10px;
    }

    /* เอฟเฟกต์สำหรับการขยายรูปภาพเมื่อ hover */
    .section5-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .section5-image-wrapper:hover img {
        transform: scale(1.1);
        /* ขยายรูปเมื่อ hover */
    }

    /* รูปแบบข้อความที่แสดงบนภาพ */
    .section5-overlay-text {
        position: absolute;
        width: 100%;
        top: 50%;
        left: 55%;
        transform: translate(-50%, -50%);
        color: rgb(0, 0, 0);
        font-size: 22px;
        font-weight: bold;
        padding: 10px 15px;
        opacity: 1;
        /* ทำให้ข้อความไม่แสดงในเริ่มต้น */
        line-height: 1;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    /* เมื่อ hover จะทำให้ข้อความแสดงและเคลื่อนไหว */
    .section5-image-wrapper:hover .section5-overlay-text {
        transform: translate(-50%, -50%) scale(1.1);
        /* ขยายข้อความเล็กน้อย */
        background-color: rgba(0, 0, 0, 0.7);
        /* เปลี่ยนพื้นหลังเป็นสีดำเบา ๆ เมื่อ hover */
        color: white;
        /* เปลี่ยนสีข้อความให้เป็นขาวเมื่อ hover */
    }

</style>
<!-- Content Section -->
<main class="bg-page5 d-flex">
    <div class="container">
        <div class=" row justify-content-center align-items-center">

            <div class=" col-xl-9 d-flex flex-column justify-content-center align-items-center ">
                <div class="title-section-5 lh-1 text-center mb-3">
                    งานกิจกรรม
                </div>
                <div class="bg-details-section-5 d-flex d-md-none flex-column justify-content-center py-3 px-3 ">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        @foreach ($activity->take(1) as $index => $post)
                        @php
                        // กำหนดคลาสพื้นหลังสลับสี
                        $cardBackgroundClass =
                        $index % 2 == 0 ? 'bg-blue-card-section-5' : 'bg-pink-card-section-5';
                        @endphp
                        <a href="{{ route('ActivityShowDetails', $post->id) }}" class="card {{ $cardBackgroundClass }} p-2 gap-1" style="width: 18rem; border-radius: 10px;">
                            <div class="card-img-wrapper rounded" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}" class="card-img-top img-fluid" alt="Card Image {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover;">

                            </div>
                            <div class="card-body bg-text-card-section-5 rounded lh-1 px-2 py-2">
                                <div class="card-text">
                                    {{ Str::limit($post->title_name ?? 'No Title', 70, '...') }}
                                </div>
                                <hr class="m-2">
                                <div class="d-flex justify-content-end align-items-center lh-1 px-2">
                                    <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                    <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end align-items-center w-100 mt-2 me-5">
                        <a href="{{ route('ActivityShowData') }}" class="button-viewall-section-5 py-1 px-3">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>
                <div class="bg-details-section-5 d-none d-md-flex d-lg-none flex-column justify-content-center py-3 px-3 ">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        @foreach ($activity->take(2) as $index => $post)
                        @php
                        // กำหนดคลาสพื้นหลังสลับสี
                        $cardBackgroundClass =
                        $index % 2 == 0 ? 'bg-blue-card-section-5' : 'bg-pink-card-section-5';
                        @endphp
                        <a href="{{ route('ActivityShowDetails', $post->id) }}" class="card {{ $cardBackgroundClass }} p-2 gap-1" style="width: 18rem; border-radius: 10px;">
                            <div class="card-img-wrapper rounded" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}" class="card-img-top img-fluid" alt="Card Image {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover;">

                            </div>
                            <div class="card-body bg-text-card-section-5 rounded lh-1 px-2 py-2">
                                <div class="card-text">
                                    {{ Str::limit($post->title_name ?? 'No Title', 70, '...') }}
                                </div>
                                <hr class="m-2">
                                <div class="d-flex justify-content-end align-items-center lh-1 px-2">
                                    <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                    <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end align-items-center w-100 mt-2 me-5">
                        <a href="{{ route('ActivityShowData') }}" class="button-viewall-section-5 py-1 px-3">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>

                <div class="bg-details-section-5 d-none d-lg-flex d-xl-none flex-column justify-content-center py-3 px-3 ">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        @foreach ($activity->take(3) as $index => $post)
                        @php
                        // กำหนดคลาสพื้นหลังสลับสี
                        $cardBackgroundClass =
                        $index % 2 == 0 ? 'bg-blue-card-section-5' : 'bg-pink-card-section-5';
                        @endphp
                        <a href="{{ route('ActivityShowDetails', $post->id) }}" class="card {{ $cardBackgroundClass }} p-2 gap-1" style="width: 18rem; border-radius: 10px;">
                            <div class="card-img-wrapper rounded" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}" class="card-img-top img-fluid" alt="Card Image {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover;">

                            </div>
                            <div class="card-body bg-text-card-section-5 rounded lh-1 px-2 py-2">
                                <div class="card-text">
                                    {{ Str::limit($post->title_name ?? 'No Title', 70, '...') }}
                                </div>
                                <hr class="m-2">
                                <div class="d-flex justify-content-end align-items-center lh-1 px-2">
                                    <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                    <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end align-items-center w-100 mt-2 me-5">
                        <a href="{{ route('ActivityShowData') }}" class="button-viewall-section-5 py-1 px-3">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>
                <div class="bg-details-section-5 d-none d-xl-flex flex-column justify-content-center py-3 px-3 ">
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        @foreach ($activity->take(3) as $index => $post)
                        @php
                        // กำหนดคลาสพื้นหลังสลับสี
                        $cardBackgroundClass =
                        $index % 2 == 0 ? 'bg-blue-card-section-5' : 'bg-pink-card-section-5';
                        @endphp
                        <a href="{{ route('ActivityShowDetails', $post->id) }}" class="card {{ $cardBackgroundClass }} p-2 gap-1" style="width: 18rem; border-radius: 10px;">
                            <div class="card-img-wrapper rounded" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}" class="card-img-top img-fluid" alt="Card Image {{ $index + 1 }}" style="width: 100%; height: 100%; object-fit: cover;">

                            </div>
                            <div class="card-body bg-text-card-section-5 rounded lh-1 px-2 py-2">
                                <div class="card-text">
                                    {{ Str::limit($post->title_name ?? 'No Title', 70, '...') }}
                                </div>
                                <hr class="m-2">
                                <div class="d-flex justify-content-end align-items-center lh-1 px-2">
                                    <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                    <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end align-items-center w-100 mt-2 me-5">
                        <a href="{{ route('ActivityShowData') }}" class="button-viewall-section-5 py-1 px-3">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>

                <div class="bg-details-section-5 d-flex justify-content-center mt-3 px-3 py-2 w-100">
                    <div class=" mb-3 mb-lg-0 w-100">
                        <iframe src="https://www.tmd.go.th/weatherForecast7DaysWidget?province=ฉะเชิงเทรา" height="340" width="100%" scrolling="no" frameborder="0" style="border-radius: 20px; box-shadow:0 2px 10px rgba(0, 0, 0, 0.7)"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 row justify-content-center align-items-center gap-3 mt-3 mt-xl-0">
                <a href="{{route('page_data')}}" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/0.png') }}" alt="banner-0">
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/1.png') }}" alt="banner-1">
                    <div class="section5-overlay-text">กระดานกระทู้</div>
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/2.png') }}" alt="banner-2">
                    <div class="section5-overlay-text">คู่มือการปฎิบัติงาน</div>
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/3.png') }}" alt="banner-3">
                    <div class="section5-overlay-text">การให้บริการ</div>
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/4.png') }}" alt="banner-4">
                    <div class="section5-overlay-text">สงเสริมความโปร่งใส<br>และแผนป้องกันการทุจริต</div>
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/5.png') }}" alt="banner-5">
                    <div class="section5-overlay-text">การเสริมสร้าง<br>วัฒนธรรมองค์กร</div>
                </a>

                <a href="#" class="col-xl-12 col-md-6 section5-image-wrapper">
                    <img src="{{ asset('images/section-5/6.png') }}" alt="banner-6">
                    <div class="section5-overlay-text">ดาวน์โหลดแบบฟอร์ม</div>
                </a>
            </div>
        </div>
    </div>

</main>
