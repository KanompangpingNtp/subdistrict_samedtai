<style>
    .bg-page5 {
        background-image: url('{{ asset('images/section-5/bg-5.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
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
</style>
<!-- Content Section -->
<main class="bg-page5 d-flex">
    <div class="container d-flex justify-content-center align-items-center gap-3">

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="title-section-5 lh-1 text-center mb-3">
                งานกิจกรรม
            </div>
            <div class="bg-details-section-5 d-flex flex-column justify-content-center py-3 px-3 ">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <?php
                for ($i = 1; $i <= 4; $i++) {
                    // กำหนดคลาสพื้นหลังสลับสี
                    $cardBackgroundClass = ($i % 2 == 0) ? 'bg-blue-card-section-5' : 'bg-pink-card-section-5';
                    ?>
                    <a href="#" class="card <?php echo $cardBackgroundClass; ?> p-2 gap-1" style="width: 18rem; border-radius: 10px;">
                        <div class="card-img-wrapper rounded" style="height: 200px; overflow: hidden;">
                            <img src="path/to/your/image-<?php echo $i; ?>.jpg" class="card-img-top img-fluid"
                                alt="Card Image <?php echo $i; ?>"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body bg-text-card-section-5 rounded lh-1 px-2 py-2">
                            <div class="card-text">
                                <?php
                                $text = "This is card number $i with sample text. This text might be too long for the card.";
                                echo mb_strimwidth($text, 0, 70, '...');
                                ?>
                            </div>
                            <hr class="m-2">
                            <div class=" d-flex justify-content-end align-items-center lh-1 px-2">
                                <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15"
                                    height="20" class="me-2">
                                <div class="card-text">dd-mm-yy</div>
                            </div>
                        </div>


                    </a>
                    <?php
                }
                ?>
                </div>

                <div class="d-flex justify-content-end align-items-center w-100 mt-2 me-5">
                    <a href="#" class="button-viewall-section-5 py-1 px-3">
                        ดูทั้งหมด
                    </a>
                </div>
            </div>
            <div class="bg-details-section-5 d-flex justify-content-center mt-3 px-3 py-2">
                <div class="col-6">
                    <img src="{{asset('images/section-5/weather.png')}}" alt="weather">
                </div>
                <div class="col-6 pt-2">
                    <img src="{{asset('images/section-5/pm.png')}}" alt="pm">
                </div>
            </div>
        </div>

    </div>
</main>
