<style>
    .bg-page4 {
        background-image: url('{{ asset('images/section-4/bg-4.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-4 {
        font-size: 60px;
        color: rgb(255, 255, 255);
        text-shadow: 4px 2px 3px rgba(0, 0, 0, 0.9);
        font-weight: bold;
    }

    .bg-details {
        background: linear-gradient(to bottom, rgb(191, 248, 255), rgb(255, 157, 211));
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .button-viewall {
        background: linear-gradient(to right, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 20px;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 25px;
        font-weight: bold;
        color: black;
        padding: 10px 20px;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงแบบ Smooth */
    }

    .button-viewall:hover {
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(138, 241, 255));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .bg-details-section-4-1 {
        background: linear-gradient(to top, rgb(191, 248, 255), rgb(255, 157, 211));
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .bg-details-section-4-2 {
        background: linear-gradient(to bottom, rgb(191, 248, 255), rgb(255, 157, 211));
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .card-container-4 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    position: relative;
}

.card-container-4 img {
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
}

.card-container-4:hover img {
    transform: scale(1.05);
}

.card-text-4 {
    position: absolute;
    top: 50%;
    left: 60%;
    width: 100%;
    text-align: center;
    transform: translate(-50%, -50%);
    color: rgb(0, 0, 0);
    font-size: 22px;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    padding: 5px 10px;
    border-radius: 5px;
    opacity: 0.9;
    line-height: 1;
    transition: opacity 0.3s ease-in-out;
}

.card-container-4:hover .card-text-4 {
    opacity: 1;
}

</style>
<!-- Content Section -->
<main class="bg-page4 d-flex flex-column justify-content-between">
    <div class="container d-flex flex-column flex-xl-row justify-content-center align-items-center gap-3">

        <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
            <div class="title-section-4 lh-1 text-center">
                ป้ายประกาศ
            </div>
            <div id="carouselExample" class="carousel slide bg-details p-3" data-bs-ride="carousel"
                style="width: 100%; margin: auto;">
                <div class="carousel-inner">
                    @foreach ($noticeBoard as $key => $post)
                        @php
                            // เช็คว่ามีไฟล์ภาพในโพสต์หรือไม่
                            $firstPhoto = $post->photos->first();
                        @endphp
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            @if ($firstPhoto)
                                <img src="{{ asset('storage/' . $firstPhoto->post_photo_file) }}" class="d-block w-100"
                                    alt="Slide {{ $key + 1 }}">
                            @else
                                <img src="{{ asset('images/section-3/พี้นหลังของส่วนที่3.png') }}" class="d-block w-100"
                                    alt="Slide {{ $key + 1 }}">
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="d-flex justify-content-end align-items-center w-100 mt-2">
                <a href="{{ route('NoticeBoardShowData') }}" class="button-viewall py-2 px-4">
                    ดูทั้งหมด
                </a>
            </div>
        </div>
        <div
            class="col-xl-2 d-flex flex-column flex-md-row flex-xl-column justify-content-center align-items-center gap-3">
            <div class="bg-details-section-4-1 p-3 fw-bold" style="width: 100%; margin: auto;">
                <div class="d-flex flex-column justify-content-center align-items-center p-2 rounded text-white"
                    style="background-color: rgb(0, 219, 0);">
                    <div class="d-flex justify-content-start align-items-end fs-3 mb-2 ">
                        เพิ่มเพื่อน
                        <img src="{{ asset('images/section-4/line.png') }}" alt="line" width="40" height="40"
                            class="ms-2">
                    </div>
                    <img src="{{ asset('images/section-4/qr-code.png') }}" alt="qr-code">
                    <div class="mt-2 lh-1">
                        <span class="fs-4">มาเป็นเพื่อนกันที่ Line</span> <br>
                        องค์การบบริการส่วนตำบลเสม็ดใต้
                    </div>
                </div>
            </div>
            <div class=" bg-details-section-4-2 p-3 fw-bold" style="width: 100%; margin: auto;">
                <div class="d-flex flex-column justify-content-center align-items-center p-2 rounded "
                    style="background-color: rgb(250, 250, 250);">
                    <img src="{{ asset('images/section-4/predictive.png') }}" alt="icon">
                    <div class="text-center fs-5 lh-1 mt-2">
                        องค์การบริหารส่วนน <br>
                        ตำบลเสม็ดใต้ <br>
                        มีนำเทคโนโลยีดิจิทัลมาใช้ <br>
                        One Stop Service
                    </div>
                </div>
            </div>
        </div>
        <!-- Facebook Page Plugin -->
        <div class=" col-xl-3 bg-details p-3">
            <div class="fb-page" data-href="https://www.facebook.com/samedtaibangkla/" data-tabs="timeline"
                data-width="300" data-height="530" data-small-header="false" data-adapt-container-width="false"
                data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/samedtaibangkla/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/samedtaibangkla/">Facebook</a>
                </blockquote>

            </div>
        </div>

    </div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0"
        nonce="YOUR_NONCE"></script>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/1.png') }}" alt="card-link">
                    <div class="card-text-4">คู่มือประชาชน</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/2.png') }}" alt="card-link">
                    <div class="card-text-4">แผนการใช้จ่ายงบ<br>ประมาณประจำปี</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/3.png') }}" alt="card-link">
                    <div class="card-text-4">รับเรื่องร้องเรียนการ<br>ทุจริตประพฤติมิชอบ</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/4.png') }}" alt="card-link">
                    <div class="card-text-4">การจัดการเรื่อง<br>ร้องเรียนทุจริต</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/5.png') }}" alt="card-link">
                    <div class="card-text-4">เบี้ยยังชีพผู้สูงอายุ</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/6.png') }}" alt="card-link">
                    <div class="card-text-4">การจัดซื้อจัดจ้าง<br>หรือจัดหาพัสดุ</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/7.png') }}" alt="card-link">
                    <div class="card-text-4">เบี้ยยังชีพคนพิการ</div>
                </a>
                <a href="#" class="col-sm-6 col-xl-3 position-relative card-container-4">
                    <img src="{{ asset('images/section-4/8.png') }}" alt="card-link">
                    <div class="card-text-4">การบริหารและพัฒนา<br>ทรัพยากรบุคคล</div>
                </a>
            </div>
        </div>
        
    
</main>
