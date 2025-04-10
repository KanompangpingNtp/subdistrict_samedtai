<style>
    .bg-page10 {
        background-image: url('{{ asset('images/section-10/BG.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 50vh;
        padding: 3rem 0rem 0rem 0rem;

    }

    .logo-footer {
        width: 13rem;
        hight: 13rem;
        z-index: 5;
    }


    .no-bullets {
        list-style-type: none;
        /* ลบจุดด้านหน้า */
        padding-left: 0;
        /* ลบระยะห่างซ้าย */
        margin: 0;
        /* ลบระยะห่างรอบๆ */
    }

    .no-bullets li a {
        color: #000;
        transition: all 0.3s ease;
    }

    .no-bullets li a:hover {
        color: #ffffff;
    }

    .bg-dataweb {
        color: rgb(0, 0, 0);
        font-weight: bold;
        background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgb(255, 157, 211, 0.9));
        border-radius: 16px;
    }

    .hover-effect {
        transition: transform 0.3s ease, filter 0.3s ease;
        /* ทำให้การเปลี่ยนลื่นไหล */
    }

    .hover-effect:hover {
        transform: scale(1.2);
        /* ขยายขนาดเมื่อ hover */
        filter: drop-shadow(0 0 10px rgba(0, 123, 255, 0.8));
        /* เพิ่มเอฟเฟกต์เรืองแสง */
    }

    .text-link-custom a {
        text-decoration: none;
        color: #000;

    }

    .text-link-custom a:hover {
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .bg-coute {
        background: linear-gradient(to right, rgba(80, 243, 255, 0.9), rgb(255, 157, 211, 0.9));
        padding: 10px 20px;
    }

    /* กำหนด border สำหรับแต่ละ div */
.bg-coute .text-center {
    padding: 1rem 3rem;
}

/* Border สำหรับแต่ละ div */
.bg-coute .text-center:nth-child(1) {
    border-right: 3px solid #f1f1f1; /* border-right สำหรับ div แรก */
}

.bg-coute .text-center:nth-child(2) {
    border-right: 3px solid #f1f1f1; /* border-right สำหรับ div ที่สอง */
}

.bg-coute .text-center:nth-child(3) {
    border-right: 3px solid #f1f1f1; /* border-right สำหรับ div ที่สาม */
}

.bg-coute .text-center:nth-child(5) {
    border-left: 3px solid #f1f1f1; /* border-left สำหรับ div ที่ห้า */
}

/* ใช้ Media Query เพื่อซ่อน border เมื่อขนาดหน้าจอน้อยกว่า lg */
@media (max-width: 991.98px) {  
    .bg-coute .text-center {
        border: none !important;  /* ใช้ !important เพื่อให้มั่นใจว่า border จะหายไป */
    }
}
.container .border-light {
    border: 3px solid #f1f1f1;
}

/* เมื่อขนาดหน้าจอต่ำกว่า lg (max-width: 991px) */
@media (max-width: 991px) {
    /* ซ่อน border ของทุก .border-light */
    .container .border-light {
        border: none !important;  /* ใช้ !important เพื่อทำให้แน่ใจว่า border จะหายไป */
    }
}
</style>
<!-- Content Section -->
<main class="bg-page10 d-flex">
    <div class="d-flex flex-column justify-content-start align-items-center w-100 gap-4">
        <img src="{{ asset('images/section-10/Layer586.png') }}" alt="logo" class="logo-footer">
        <div class="text-center py-3 px-4 lh-1"
            style="background: linear-gradient(to right, rgba(80, 243, 255, 0.9), rgb(255, 157, 211, 0.9));
        padding: 10px 20px; border-radius:15px;">
            <span class="fw-bold fs-2">จำนวนผู้เข้าชมเว็บไซต์</span> <br>
            number of website visitors
        </div>

        <div class="bg-coute d-flex flex-column flex-lg-row justify-content-center align-items-center" style="border-radius: 15px;">
            <div class="text-center">
                <span class="fs-1">1</span><br>
                <span class="fw-bold">ขณะนี้</span>
            </div>
            <div class="text-center">
                <span class="fs-1">1</span><br>
                <span class="fw-bold">วันนี้</span>
            </div>
            <div class="text-center">
                <span class="fs-1">1</span><br>
                <span class="fw-bold">เดือนนี้</span>
            </div>
            <div class="text-center">
                <span class="fs-1">1</span><br>
                <span class="fw-bold">ปีนี้</span>
            </div>
            <div class="text-center">
                <span class="fs-1">1</span><br>
                <span class="fw-bold">ทั้งหมด</span>
            </div>
        </div>
        
        <div class="container">
            <div class="d-flex flex-column flex-lg-row justify-content-around align-items-center gap-3 py-3"
                 style="background: linear-gradient(to right, rgba(80, 243, 255, 0.9), rgb(255, 157, 211, 0.9));
                        padding: 10px 20px; border-top-left-radius:15px; border-top-right-radius:15px;">
        
                <div class="d-flex flex-column justify-content-center align-items-start">
                    <div class="lh-1">
                        <span class="fw-bold fs-3">องค์การบริหารส่วนตำบลเสม็ดใต้</span> <br>
                        <span class="fw-bold fs-5">Samedtai Subdistrict Administrative Organization</span> <br>
                        <div class="fw-bold fs-5 mt-3">
                            เลขที่ 111 หมู่ที่ 4 ตำบลเสม็ดใต้ <br>
                            อำเภอบางคล้า จังหวัดฉะเชิงเทรา 24110
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start lh-1 gap-2 border border-light border-3 border-bottom-0 border-top-0 px-3">
                    <div class="d-flex justify-content-center align-items-start mt-2">
                        <div class="fs-4"><span class="px-2 py-1 fs-5"
                                style="background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgb(255, 157, 211, 0.9));
                                       padding: 10px 20px; border-radius:15px;">โทรศัพท์</span>
                            0-3858-4130
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start mt-2">
                        <div class="fs-4"><span class="px-2 py-1 fs-5"
                                style="background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgb(255, 157, 211, 0.9));
                                       padding: 10px 20px; border-radius:15px;">โทรสาร</span>
                            0-3858-4383
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start mt-2">
                        <div class="fs-4"><span class="px-2 py-1 fs-5"
                                style="background: linear-gradient(to top, rgba(255, 255, 255, 0.9), rgb(255, 157, 211, 0.9));
                                       padding: 10px 20px; border-radius:15px;">Email</span>
                            -
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start lh-1 border border-light border-3 border-bottom-0 border-top-0 border-start-0 px-3">
                    <span class="bg-dataweb px-3 py-1 mb-1">ข้อมูลเว็บไซด์</span>
                    <ul class="no-bullets">
                        <li><a href="#" class="text-decoration-none ">หน้าแรก</a></li>
                        <li><a href="#" class="text-decoration-none ">กระดานกระทู้</a></li>
                        <li><a href="#" class="text-decoration-none ">ติดต่อ</a></li>
                        <li><a href="#" class="text-decoration-none ">แผนผังเว็บไซต์</a></li>
                    </ul>
                </div>
        
                <div class="d-flex flex-column justify-content-center align-items-start lh-1 gap-2 text-link-custom ">
                    <a href="https://webmail.samedtai.go.th/" class="d-flex justify-content-center align-items-start gap-2">
                        <img src="{{ asset('images/section-10/up-arrow.png') }}" alt="email" width="20" height="15">
                        <div>ตรวจสอบEmail</div>
                    </a>
                    <a href="#" class="d-flex justify-content-center align-items-start gap-2">
                        <img src="{{ asset('images/section-10/up-arrow.png') }}" alt="phone" width="20" height="20">
                        <div>เว็บใกล้เคียง</div>
                    </a>
                    <a href="#" class="d-flex justify-content-center align-items-start gap-2">
                        <img src="{{ asset('images/section-10/up-arrow.png') }}" alt="phone" width="20" height="20">
                        <div>เว็บมาสเตอร์</div>
                    </a>
                    <a href="#" class="d-flex justify-content-center align-items-start gap-2">
                        <img src="{{ asset('images/section-10/up-arrow.png') }}" alt="phone" width="20" height="20">
                        <div>เข้าสู่ระบบ Admin</div>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
</main>
{{-- <div class="d-flex flex-column justify-content-center align-items-start lh-1 gap-2">
                    <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/arrow.png') }}"
                            alt="upload" width="25" height="25"></a>
                    <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/share.png') }}"
                            alt="chair" width="25" height="25"></a>
                    <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/messenger.png') }}"
                            alt="message" width="25" height="25"></a>
                </div> --}}
