<style>
    .bg-header {
        background-image: url('{{ asset('images/header/BG.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 90vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .bg-runtext {
        background-image: url('{{ asset('images/header/แถบล่าง.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 10vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }


    

    .navbar-item {
        color: white;
        text-decoration: none;
        text-align: center;
        display: block;
        padding: 2px 10px;
        transition: all 0.3s ease;
    }

    .navbar-item img {
        width: 40px;
        height: 40px;
        margin-bottom: 5px;
        transition: transform 0.3s ease;
        /* เพิ่ม effect การขยายขนาดของไอคอน */
    }

    .navbar-item div {
        font-size: 23px;
        transition: color 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงสีของข้อความ */
    }

    .navbar-item:hover {
        color: rgba(135, 255, 36, 0.8);
        /* เปลี่ยนสีของข้อความเมื่อ hover */
        border-radius: 10px;
        /* เพิ่มมุมโค้งเพื่อให้ดูนุ่มนวล */
    }

    .navbar-item:hover img {
        transform: scale(1.1);
        /* ขยายขนาดไอคอนให้ใหญ่ขึ้นเมื่อ hover */
    }

    .navbar-item:hover div {
        color: rgba(32, 61, 8, 0.8);
        /* เปลี่ยนสีของข้อความเมื่อ hover */
    }

    /* แสดงแนวตั้งไอคอนและข้อความ */
    .navbar-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }


    .hero-section {
        width: 100%;
        height: 100vh;
        /* Full screen height */
        overflow: hidden;
        position: relative;
    }

    .carousel {
        display: flex;
        height: 100%;
        position: relative;
    }

    .carousel-slide {
        flex: 0 0 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: transform 0.5s ease-in-out;
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .carousel-slide.active {
        opacity: 1;
        position: relative;
    }

    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(135, 255, 36, 0.8);
        color: #fff;
        border: none;
        border-radius: 100%;
        padding: 1px 32px;
        cursor: pointer;
        font-size: 50px;
        z-index: 10;
        transition: all 0.3s ease;
    }

    .carousel-btn.left {
        left: 10px;
    }

    .carousel-btn.right {
        right: 10px;
    }

    .carousel-btn:hover {
        background: rgba(0, 0, 0, 0.8);
        box-shadow: 0 0 5px 3px rgba(255, 255, 255, 0.5);

    }

    .video-container {
        position: relative;
        width: 100%;
        min-height: 105vh;
        overflow: visible;
    }

    .video-container video {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<main class="d-flex flex-column align-items-center justify-content-start bg-header">
    <div class="video-container">
        <video autoplay loop muted playsinline >
            <source src="{{ asset('images/video/03021.webm') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

    </div>
        

    <div class="bg-runtext w-100 d-flex align-items-center">
        <div class="container d-flex align-items-center gap-3">
            <div class="bg-text w-100">
                <div
                    style="white-space: nowrap; overflow: hidden; position: relative; width: 100%; height: 38px; background: linear-gradient(to right, #ffffff6b, #ffffff6b); border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); padding: 5px;">
                    <span
                        style="display: inline-block; position: absolute; white-space: nowrap; animation: marquee 15s linear infinite; color: black; font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        วิสัยทัศน์ : ตำบลน่าอยู่ มุ่งสู่การศึกษา พัฒนาด้านการเกษตร เขตปลอดมลพิษ
                    </span>
                </div>
            </div>

        </div>
    </div>

    <style>
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>


</main>

