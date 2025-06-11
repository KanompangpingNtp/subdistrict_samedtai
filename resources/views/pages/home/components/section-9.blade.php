<style>
    .bg-page9 {
        background-image: url('{{ asset('images/section-9/bgs-9.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .map-wrapper {
        position: relative;
    }

    .obj-on-map {
        position: absolute;
        cursor: pointer;
    }

    .obj {
        width: 100px;
    }

    .map-card {
        position: absolute;
        top: 50%;
        right: -10%;
        margin-top: 10px;
        display: none;
        z-index: 3;
        width: 300px;
    }
    .map-card-left {
        position: absolute;
        top: 50%;
        right: -10%;
        margin-top: 10px;
        display: none;
        z-index: 3;
        width: 300px;
    }

    .obj-on-map:hover .map-card {
        display: block;
    }
    .obj-on-map:hover .map-card-left {
        display: block;
    }

    .pin-on-map {
        position: absolute;
        top: -10%;
        /* ปรับตำแหน่งตามที่ต้องการ */
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        /* ขนาดหมุด */
        z-index: 2;
        animation: floatUpDown 2s ease-in-out infinite;
    }

    @keyframes floatUpDown {

        0%,
        100% {
            transform: translateX(-50%) translateY(0);
        }

        50% {
            transform: translateX(-50%) translateY(-10px);
            /* ขึ้นไป 10px */
        }
    }

    .obj-1 {
        top: 60%;
        left: 45%;
    }
    .obj-2 {
        top: 35%;
        left: 35%;
    }
    .obj-3 {
        top: 60%;
        left: 85%;
    }
    .obj-4 {
        top: 40%;
        left: 85%;
    }
    .obj-5 {
        top: 5%;
        left: 30%;
    }
    .obj-6 {
        top: 20%;
        left: 25%;
    }
    .obj-7 {
        top: 25%;
        left: 17%;
    }
    .obj-8 {
        top: 25%;
        left: 5%;
    }

    @media (max-width: 991px) {

        .obj {
            width: 80px;
        }
        
        .pin-on-map {
            width: 25px;
        }

        .map-card {
            width: 200px;
        }

        .map-card-left{
            width: 200px;
        }
        .obj-1 {
            top: 60%;
            left: 43%;
        }
        .obj-2 {
            top: 32%;
            left: 34%;
        }
        .obj-3 {
            top: 58%;
            left: 83%;
        }
        .obj-4 {
            top: 37%;
            left: 83%;
        }
        .obj-5 {
            top: 5%;
            left: 27%;
        }
        .obj-6 {
            top: 18%;
            left: 25%;
        }
        .obj-7 {
            top: 25%;
            left: 17%;
        }
        .obj-8 {
            top: 25%;
            left: 5%;
        }

    }
    @media (max-width: 767px) {

        .obj {
            width: 60px;
        }
        
        .pin-on-map {
            width: 20px;
        }

        .map-card {
            width: 150px;
        }
        .map-card-left {
            width: 150px;
        }
        .obj-1 {
            top: 60%;
            left: 43%;
        }
        .obj-2 {
            top: 32%;
            left: 34%;
        }
        .obj-3 {
            top: 58%;
            left: 83%;
        }
        .obj-4 {
            top: 37%;
            left: 83%;
        }
        .obj-5 {
            top: 5%;
            left: 27%;
        }
        .obj-6 {
            top: 18%;
            left: 25%;
        }
        .obj-7 {
            top: 25%;
            left: 17%;
        }
        .obj-8 {
            top: 25%;
            left: 5%;
        }
    }
    @media (max-width: 500px) {

        .obj {
            width: 50px;
        }
        
        .pin-on-map {
            width: 20px;
        }

        .map-card {
            top: 50%;
            right: -10%;
            width: 150px;
        }
        .map-card-left {
            top: 50%;
            left: -10%;
            width: 150px;
        }
        .obj-1 {
            top: 60%;
            left: 43%;
        }
        .obj-2 {
            top: 32%;
            left: 34%;
        }
        .obj-3 {
            top: 58%;
            left: 83%;
        }
        .obj-4 {
            top: 37%;
            left: 83%;
        }
        .obj-5 {
            top: 5%;
            left: 27%;
        }
        .obj-6 {
            top: 18%;
            left: 25%;
        }
        .obj-7 {
            top: 25%;
            left: 17%;
        }
        .obj-8 {
            top: 25%;
            left: 5%;
        }
    }
    @media (max-width: 450px) {

        .obj {
            width: 35px;
        }
        
        .pin-on-map {
            width: 20px;
        }

        .map-card {
            top: 50%;
            right: -10%;
            width: 150px;
        }
        .map-card-left {
            top: 50%;
            left: -10%;
            width: 150px;
        }
        .obj-1 {
            top: 60%;
            left: 43%;
        }
        .obj-2 {
            top: 32%;
            left: 34%;
        }
        .obj-3 {
            top: 58%;
            left: 83%;
        }
        .obj-4 {
            top: 40%;
            left: 85%;
        }
        .obj-5 {
            top: 5%;
            left: 27%;
        }
        .obj-6 {
            top: 18%;
            left: 25%;
        }
        .obj-7 {
            top: 25%;
            left: 17%;
        }
        .obj-8 {
            top: 25%;
            left: 5%;
        }
    }
</style>
<!-- Content Section -->
<main class="bg-page9 d-flex">
    <div class="container d-flex flex-column justify-content-center my-5">
        <div class="d-flex justify-content-end mb-4 mb-sm-0">
            <img src="{{ asset('images/section-9/แลนด์มาร์ค.png') }}" alt="title" class="img-fluid">
        </div>
        <div class=" d-flex justify-content-center align-items-center">
            <div class="map-wrapper">
                <!-- รูปแผนที่หลัก -->
                <img src="{{ asset('images/section-9/รวมแผนที่.png') }}" alt="map" class="img-fluid">

                <div class="obj-on-map obj-1">
                    <img src="{{ asset('images/section-9/โรงพยาบาลส่งเสริมสุขภาพตำบลเสม็ดใต้.png') }}" alt="obj1"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/การ์ดโรงพยาลบาลส่งเสริม.png') }}" alt="card1"
                        class="map-card">
                </div>
                <div class="obj-on-map obj-2">
                    <img src="{{ asset('images/section-9/โรงเรียนบ้านหนองโสน.png') }}" alt="obj2"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/รร.บ้านหนองโสน.png') }}" alt="card2"
                        class="map-card">
                </div>
                <div class="obj-on-map obj-3">
                    <img src="{{ asset('images/section-9/โรงเรียนวัดเสม็ดใต้.png') }}" alt="obj3"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/รร.วัดเสม็ดใต้.png') }}" alt="card3"
                        class="map-card">
                </div>
                <div class="obj-on-map obj-4">
                    <img src="{{ asset('images/section-9/วัดเสม็ดใต้.png') }}" alt="obj4"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/การ์ดวัดเสม็ดใต้.png') }}" alt="card4"
                        class="map-card">
                </div>
                <div class="obj-on-map obj-5">
                    <img src="{{ asset('images/section-9/องค์การบริหารส่วนตำบลเสม็ดใต้.png') }}" alt="obj5"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/ที่ทำการอบต..png') }}" alt="card5"
                        class="map-card-left">
                </div>
                <div class="obj-on-map obj-6">
                    <img src="{{ asset('images/section-9/ศูนย์พัฒนาเด็กเล็กองค์การบริหารส่วนตำบลเสม็ดใต้.png') }}" alt="obj6"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/ศพด.เสม็ดใต้.png') }}" alt="card6"
                        class="map-card-left">
                </div>
                <div class="obj-on-map obj-7">
                    <img src="{{ asset('images/section-9/วัดสนามช้าง.png') }}" alt="obj7"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/การ์ดวัดสนามช้าง.png') }}" alt="card7"
                        class="map-card-left">
                </div>
                <div class="obj-on-map obj-8">
                    <img src="{{ asset('images/section-9/วัดหัวสวน.png') }}" alt="obj8"
                        class="obj">
                    <img src="{{ asset('images/section-9/หมุดแผนที่.png') }}" alt="pin" class="pin-on-map">
                    <img src="{{ asset('images/section-9/card/การ์ดวัดหัวสวน.png') }}" alt="card8"
                        class="map-card-left">
                </div>
            </div>

        </div>

    </div>
</main>
