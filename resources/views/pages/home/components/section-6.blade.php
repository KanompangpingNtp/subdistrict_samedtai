<style>
    .bg-page6 {
        background-image: url('{{ asset('images/section-6/ช่วยกันตัด.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-6 {
        font-size: 50px;
        color: rgb(0, 0, 0);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 30px;
        position: relative;
        /* ทำให้ตำแหน่งของลูกเป็นอิงกับ div นี้ */
        display: inline-block;
        /* ป้องกันไม่ให้พื้นที่ยืด */
    }

    .image-right {
        position: absolute;
        /* ปรับตำแหน่งโดยสัมพันธ์กับ .title-section-6 */
        top: 50%;
        /* กึ่งกลางแนวตั้ง */
        transform: translateY(-50%);
        /* ปรับให้อยู่กึ่งกลางจริง */
        right: -30px;
        /* ขยับรูปออกไปทางขวาครึ่งหนึ่ง */
    }

    .bg-details-section-6 {
        background: linear-gradient(to bottom, rgba(148, 148, 148, 0.521), rgba(146, 146, 146, 0.514));
        border-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .button-viewall-section-6 {
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

    .button-viewall-section-6:hover {
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(255, 157, 211));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .bg-pink-card-section-6 {
        background-color: rgb(255, 157, 211);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-pink-card-section-6:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .bg-blue-card-section-6 {
        background-color: rgb(191, 248, 255);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-blue-card-section-6:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(191, 248, 255, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .bg-details-right-section-6 {
        background: linear-gradient(to bottom, rgb(191, 248, 255), rgb(255, 157, 211));
        border-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .card-date {
        position: absolute;
        bottom: 10px;
        /* ระยะห่างจากด้านล่าง */
        right: 10px;
        /* ระยะห่างจากด้านขวา */
        display: flex;
        align-items: center;
        gap: 5px;
        /* ระยะห่างระหว่างไอคอนและข้อความ */
    }

    /* ปรับขนาดปุ่มให้ใหญ่ขึ้น */
.swiper-button-next,
.swiper-button-prev {
    width: 30px;  /* กำหนดขนาดปุ่ม */
    height: 30px;
    background-color: rgb(255, 157, 211);  /* สีพื้นหลัง */
    color: white; /* สีของลูกศร */
    border-radius: 50%; /* ทำให้เป็นวงกลม */
    padding: 30px;
   
    transition: all 0.3s ease-in-out; /* ทำให้มีเอฟเฟกต์เวลา hover */
}

/* ทำให้ไอคอนข้างในใหญ่ขึ้น */
.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 20px; /* ขยายขนาดไอคอนลูกศร */
    font-weight: bold;
    text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* เพิ่มเงา */
    color: white; /* สีของลูกศร */
}

/* ทำให้ปุ่มดูเด่นขึ้นเมื่อ hover */
.swiper-button-next:hover,
.swiper-button-prev:hover {
    background-color: rgb(191, 248, 255);  /* เปลี่ยนสีพื้นหลัง */
    transform: scale(1.2); /* ขยายปุ่ม */
}

/* จัดตำแหน่งให้ปุ่มไม่ชิดเกินไป */
.swiper-button-next {
    right: -20px; /* ขยับให้ปุ่มถัดไปออกไปข้างขวา */
}

.swiper-button-prev {
    left: -20px; /* ขยับให้ปุ่มย้อนกลับออกไปข้างซ้าย */
}

.slide-container {
    position: relative;
    display: inline-block;
}

.slide-image-6 {
    display: block;
    width: 100%;
    height: auto;
    transition: all 0.3s ease;
}

.slide-text {
    position: absolute;
    top: 75%;
    left: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    padding: 5px 10px;
    border-radius: 5px;
    line-height: 1;
    transition: opacity 0.3s ease, transform 0.3s ease;
}
/* 🔥 เอฟเฟกต์ Hover */
.slide-container:hover .slide-image-6 {
    transform: scale(1.05); /* ขยายรูปเล็กน้อย */
    filter: drop-shadow(0 4px 10px rgba(255, 255, 255, 0.8));
}

.slide-container:hover .slide-text {
    opacity: 1; /* ทำให้ข้อความชัดขึ้น */
    transform: translate(-50%, -50%) scale(1.1); /* ขยายข้อความ */

}
</style>
<!-- Content Section -->
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<main class="bg-page6 d-flex flex-column justify-content-between gap-5">
    <div class="container d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
        <div class="col-lg-8 d-flex flex-column justify-content-center align-items-center">
            <div class="title-section-6 lh-1 text-center mb-3 py-1 px-4 position-relative">
                ข่าวประชาสัมพันธ์
                <img src="{{ asset('images/section-6/marketing.png') }}" alt="logo" width="50" height="40"
                    class="image-right">
            </div>
            <div class="bg-details-section-6 px-3 py-4" style="width: 100%; margin: auto; position: relative;">
                <div class="row">
                    @foreach ($pressRelease->take(6) as $index => $post)
                        @php
                            // กำหนดคลาสพื้นหลังสลับสี
                            $cardBackgroundClass =
                                $index % 2 == 0 ? 'bg-blue-card-section-6' : 'bg-pink-card-section-6';
                        @endphp
                        <div class="col-lg-6 p-2">
                            <a href="{{ route('PressReleaseShowDetails', $post->id) }}" class="text-decoration-none">
                                <div class="d-flex align-items-center p-3 {{ $cardBackgroundClass }}"
                                    style="height: 150px; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); display: block;">

                                    <!-- รูปภาพด้านซ้าย -->
                                    <div style="flex: 0 0 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}"
                                            alt="Image {{ $index + 1 }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>

                                    <!-- ข้อความด้านขวา -->
                                    <div class="ms-3 bg-white h-100 rounded p-1"
                                        style="flex: 1; position: relative; height: 100%;">
                                        <div class="card-text text-dark">
                                            {{ Str::limit($post->title_name ?? 'No Title', 60, '...') }}
                                        </div>
                                        <div class="card-date d-flex align-items-center">
                                            <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon"
                                                width="15" height="20" class="me-2">
                                            <div class="card-text text-dark">
                                                {{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('PressReleaseShowData') }}" class="button-viewall-section-6 py-2 px-4"
                    style="position: absolute; bottom: -26px; right: 20px; background-color: lightgray; border-radius: 10px; text-decoration: none; font-weight: bold;">
                    ดูทั้งหมด
                </a>
            </div>

        </div>
        <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center px-2 mt-5 mt-lg-0">
            <div class="title-section-6 lh-1 text-center mb-3 py-2 px-4 position-relative" style="font-size: 40px;">
                แนะนำจุดเช็คอินกินเที่ยว
                <img src="{{ asset('images/section-6/point.png') }}" alt="logo" width="40" height="50"
                    class="image-right">
            </div>
            <div class="bg-details-right-section-6 px-3 py-2" style="width: 100%; margin: auto; position: relative;">
                <div class="row">
                    @foreach ($checkinspot->take(3) as $index => $post)
                        @php
                            // กำหนดคลาสพื้นหลังสลับสี
                            $cardBackgroundClass =
                                $index % 2 == 0 ? 'bg-blue-card-section-6' : 'bg-pink-card-section-6';
                        @endphp
                        <div class="col-lg-12 mb-1 p-2">
                            <!-- แท็ก a ครอบรอบทั้งการ์ดเพื่อให้คลิกได้ -->
                            <a href="{{ route('CheckinSpotShowDetails', $post->id) }}" class="text-decoration-none"
                                style="color: black;">
                                <div class="d-flex align-items-center p-3 {{ $cardBackgroundClass }}"
                                    style="height: 150px; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">

                                    <!-- รูปภาพด้านซ้าย -->
                                    <div style="flex: 0 0 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                        <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}"
                                            alt="Image {{ $index + 1 }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>

                                    <!-- ข้อความด้านขวา -->
                                    <div class="ms-3 bg-white h-100 rounded p-1"
                                        style="flex: 1; position: relative; height: 100%;">
                                        <div class="card-text">
                                            {{ Str::limit($post->topic_name ?? 'No Title', 60, '...') }}
                                        </div>
                                        <div class="card-date d-flex align-items-center">
                                            <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon"
                                                width="15" height="20" class="me-2">
                                            <div class="card-text">
                                                {{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
            <a href="{{ route('CheckinSpotShowData') }}" class="button-viewall-section-6 py-2 px-4 mt-3">
                ดูทั้งหมด
            </a>
        </div>
    </div>
    <div class="container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper py-3">
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม1.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">ปฎิทิน<br>กิจกรรม</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม2.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">อาสาามัคร<br>ป้องกันภัย<br>ฝ่ายพลเรือน<br>อปพร.</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม3.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">KM องค์กร<br>แห่งการเรียนรู้</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม4.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">กิจการสภา</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม5.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">รางวัลแห่ง<br>ความภูมิใจ</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม6.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">ข้อมูลวารสาร</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม7.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">วารสารออนไลน์</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม8.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">ประมวล<br>จริยธรรม</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม9.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">พรบ. อำนวย<br>ความสะดวก<br>2558</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม10.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">ศูนย์ข้อมูล<br>ข่าวสาร</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม11.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">ศูนย์พัฒนา<br>ผู้สูงอายุ</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม12.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">เงินอุดหนุนดู<br>แลเด็กแรกเกิด</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม13.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">กองทุนหลัก<br>ประกันสุขภาพ<br>สปสช.</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม14.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">กลุ่มสตรี</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม15.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">แนะนำ<br>ร้านอาหาร</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม16.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">แนะนำสถาน<br>ที่ท่องเที่ยว</div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="slide-container">
                        <img src="{{ asset('images/section-6/ปุ่ม16.png') }}" alt="banner" class="slide-image-6">
                        <div class="slide-text">โรงพยาบาล<br>สงเสริมสุขภาพ<br>ตำบล(รพ.สต.)</div>
                    </a>
                </div>
                
            </div>
            <!-- ปุ่มเลื่อน -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>
    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 8,  // แสดงทีละ 4 อัน
          spaceBetween: 10,  // ระยะห่างระหว่างภาพ
          loop: true,        // ให้วนลูป
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          autoplay: {
            delay: 3000,   // สไลด์อัตโนมัติทุก 3 วินาที
            disableOnInteraction: false
          },
          breakpoints: {
            320: { slidesPerView: 3 },  // หน้าจอเล็ก แสดง 1 อัน
            676: { slidesPerView: 4 },  // หน้าจอกลาง แสดง 2 อัน
            868: { slidesPerView: 5 },  // หน้าจอใหญ่ขึ้น แสดง 3 อัน
            1024: { slidesPerView: 7 },  
            1200: { slidesPerView: 8 }  
          }
        });
      </script>
          
</main>
