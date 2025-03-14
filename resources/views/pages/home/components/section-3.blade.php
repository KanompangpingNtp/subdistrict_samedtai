<style>
    .bg-page3 {
        background-image: url('{{ asset('images/section-3/พี้นหลังของส่วนที่3.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .bg-banner-section3 {
        background: linear-gradient(to right,
                rgba(255, 157, 211, 0) 0%,
                /* ซ้ายสุดจาง */
                rgb(255, 157, 211) 50%,
                /* ตรงกลางชมพูเข้ม */
                rgba(255, 157, 211, 0) 100%
                /* ขวาสุดจาง */
            );
        min-height: 12vh;
        margin-top: 5rem;
    }


    @media (max-width: 992px) {
        .bg-banner-section3 {
            background-image: none;
            /* ลบรูปภาพพื้นหลัง */
            background-color: rgba(255, 192, 203, 0.2);
            /* สีชมพูโปร่งแสง */
            border-radius: 20px;
            padding-bottom: 2rem;
        }
    }

    .title-section-3 {
        font-size: 60px;
        color: rgb(0, 0, 0);
        text-shadow: 4px 2px 3px rgba(255, 255, 255, 0.9);
        font-weight: bold;
    }

    .bg-details {
        background: linear-gradient(to bottom, rgb(191, 248, 255), rgb(255, 157, 211));
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .bg-details img {
        width: 100%;
        /* ให้รูปขยายเต็มความกว้างของ div */
        height: 100%;
        /* ให้รูปขยายเต็มความสูงของ div */
        object-fit: cover;
        /* ทำให้รูปขยายให้พอดีกับขนาดของ div โดยไม่เสียสัดส่วน */
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

    .button-banner-section3 {
        background-color: #86d5fc;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        font-weight: bold;
        color: black;
        /* สีข้อความเริ่มต้น */
        padding: 10px 20px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงที่ลื่นไหล */
    }

    .button-banner-section3:hover {
        background-color: rgb(255, 157, 211);
        /* เปลี่ยนสีพื้นหลัง */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9);
        /* เพิ่มความเข้มของเงา */
        transform: scale(1.05);
        /* ขยายปุ่มเล็กน้อย */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }
</style>
<!-- Content Section -->
<main class="bg-page3 d-flex">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center w-100 gap-5">
            <div class="col-12 col-lg-6 d-flex flex-column">
                <div class="title-section-3 lh-1 text-center">
                    วิดีทัศน์แนะนำ <br>
                    <span style="font-size:40px;">องค์การบริหารส่วนตำบลเสม็ดใต้</span>
                </div>
                <div class="bg-details px-3 py-4" style="width: 100%; margin: auto; position: relative;">
                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/bqN6rK-IurA?start=19"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen style="border-top-right-radius: 20px; border-bottom-left-radius: 20px;">
                    </iframe>
                    <a href="#" class="button-viewall py-2 px-4 "
                        style="position: absolute; bottom: -26px; right: 20px;  background-color: lightgray; border-radius: 10px; text-decoration: none; font-weight: bold;">
                        ดูทั้งหมด
                    </a>
                </div>

            </div>
            <div class="col-12 col-lg-6 d-flex flex-column">
                <div class="title-section-3 lh-1 text-center">
                    E-LIBRARY <br>
                    <span style="font-size:40px;">องค์การบริหารส่วนตำบลเสม็ดใต้</span>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                    <div class=" flex-grow-1">
                        <img src="{{ asset('images/section-3/อบต.เสม็ดใต้.png') }}" alt="post" class="img-fluid">
                    </div>
                    <div class="bg-details px-3 pt-4 pb-5 flex-grow-1" style="margin: auto; position: relative;">
                        <img src="{{ asset('images/section-3/องค์การบริหาร ส่วนตำบลเสม็ดใต้่.png') }}" alt="ebook" class="img-fluid">
                        <a href="#" class="button-viewall py-2 px-4"
                            style="position: absolute; bottom: -26px; right: 20px; background-color: lightgray; border-radius: 10px; text-decoration: none; font-weight: bold;">
                            ดูทั้งหมด
                        </a>
                    </div>
                </div>
                
                
                
            </div>
        </div>
        <div class="container bg-banner-section3 py-3">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 text-center">
                <div class="col">
                    <a href="#"
                        class="d-flex justify-content-center align-items-center button-banner-section3 px-3 py-2 lh-1">
                        <img src="{{ asset('images/section-3/ปุ่ม1.png') }}" alt="icon" width="60"
                            height="60" class="mb-2">
                        <span>สาระดีๆจาก <br> ศาลการปกครอง</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#"
                        class="d-flex justify-content-center align-items-center button-banner-section3 px-2 py-2 lh-1 fs-5">
                        <img src="{{ asset('images/section-3/ปุ่ม2.png') }}" alt="icon" width="50"
                            height="60" class="mb-2">
                        <span style="font-size: 16px;">สำนักงานคณะกรรมการป้องกัน <br> และปราบปรามการทุจริตแห่งชาติ</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#"
                        class="d-flex justify-content-center align-items-center button-banner-section3 px-3 py-2 lh-1 ">
                        <img src="{{ asset('images/section-3/ปุ่ม3.png') }}" alt="icon" width="60"
                            height="60" class="mb-2">
                        <span>ระบบการจัดซื้อ <br> จัดจ้างภาครัฐ (EGP)</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#"
                        class="d-flex justify-content-center align-items-center button-banner-section3 px-3 py-2 lh-1">
                        <img src="{{ asset('images/section-3/ปุ่ม4.png') }}" alt="icon" width="60"
                            height="60" class="mb-2">
                        <span>ศูนย์ข้อมูลข่าวสาร <br>อิเล็กทรอนิกส์ <br>ของราชการ (OIC)</span>
                    </a>
                </div>
                <div class="col">
                    <a href="#"
                        class="d-flex justify-content-center align-items-center button-banner-section3 px-3 py-2 lh-1">
                        <img src="{{ asset('images/section-3/ปุ่ม5.png') }}" alt="icon" width="60"
                            height="60" class="mb-2">
                        <span>One Stop Service</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</main>
