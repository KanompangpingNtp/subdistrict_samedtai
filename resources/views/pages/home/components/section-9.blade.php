<style>
    .bg-page9 {
        background-image: url('{{ asset('images/section-9/bg-9.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */

    }

    .title-section-8 {
        font-size: 40px;
        color: rgb(0, 0, 0);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 16px;
    }

    .map-section-9 img {
        width: 100%;
        /* ให้รูปขยายเต็มความกว้างของ div */
        height: 100%;
        /* ให้รูปขยายเต็มความสูงของ div */
        object-fit: cover;
        /* ทำให้รูปขยายให้พอดีกับขนาดของ div โดยไม่เสียสัดส่วน */
        transition: all 0.3s ease;
        /* ทำให้การเปลี่ยนแปลงราบรื่น */
    }

    /* เพิ่มเอฟเฟ็กต์ hover */
    .map-section-9 img:hover {
        filter: drop-shadow(0 0 20px rgb(255, 157, 211));
        /* ทำให้รูปเรืองแสง */
    }
</style>
<!-- Content Section -->
<main class="bg-page9 d-flex">
    <div class="container d-flex flex-column justify-content-start align-items-start mt-5">
        <div class="title-section-8 lh-1 text-center mb-5 py-3 px-4">
            ตำบลเสม็ดใต้ <br>
            <span class="fs-3">อำเภอบางคล้า จังหวัดฉะเชิงเทรา</span>
        </div>
        <div class="map-section-9">
            <img src="{{ asset('images/section-9/MapOut (0-00-00-00).png') }}" alt="map">
        </div>

    </div>
</main>
