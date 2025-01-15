<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="คำอธิบายเว็บไซต์">
    <title>ฐานข้อมูลเสม็ดใต้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'th-krub';
            src: url('/fonts/TH-Krub.ttf') format('woff2');
            font-weight: normal;
        }

        @font-face {
            font-family: 'th-krub';
            src: url('/fonts/TH-Krub-Bold.ttf') format('woff2');
            font-weight: bold;
        }

        body {
            font-family: 'th-krub', sans-serif;
            font-size: 20px;
        }

        .bg-base-data {
            background-image: url('{{ asset('images/base_data/bg-base-data.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
        }

        .bg-title {
            background: linear-gradient(to right, rgb(130, 194, 255), rgb(255, 157, 211));
            border-radius: 40px;
            box-shadow: 0px 2px 10px rgba(255, 255, 255, 0.9);
            text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.8);
        }

        .button-link {
    background: linear-gradient(to right, rgb(130, 194, 255), rgb(255, 157, 211));
    border-radius: 40px;
    box-shadow: 0px 2px 10px rgba(255, 255, 255, 0.9);
    text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.8);
    text-decoration: none;
    color: #000;
    transition: all 0.3s ease; /* เพิ่ม transition สำหรับการเปลี่ยนแปลงที่นุ่มนวล */
}

.button-link:hover {
    background: linear-gradient(to right, rgb(255, 157, 211), rgb(130, 194, 255)); /* สลับสีพื้นหลังเมื่อ hover */
    box-shadow: 0px 4px 20px rgba(255, 255, 255, 0.9); /* เพิ่มเงาให้ใหญ่ขึ้นเมื่อ hover */
    text-shadow: 2px 2px 5px rgba(255, 255, 255, 1); /* เพิ่มความชัดเจนของเงาข้อความ */
    transform: scale(1.05); /* ขยายขนาดเล็กน้อยเมื่อ hover */
}

    </style>
</head>

<body>
    <main class="bg-base-data d-flex py-5">
        <div class="container d-flex flex-column justify-content-start align-items-start pt-5">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="bg-title text-dark text-center px-5 py-2 fs-1  mb-4">
                    ฐานข้อมูลตำบลเสม็ดใต้
                </div>
                <a href="{{route('home_index')}}"
                    class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                    style="overflow: visible;">
                    <img src="{{ asset('images/base_data/1-ปุ่มหน้าหลัก.png') }}" alt="icon" width="60" height="60"
                        style="position: relative; left: -20px; top:-8px;">
                    <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                        style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                        กลับหน้าหลัก
                    </div>
                </a>
            </div>

            <div class="row g-4 px-5 py-5">
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/hospital.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการสาธารณสุข
                        </div>
                    </a>
                </div>
                <!-- เพิ่มอีก 2 รายการตัวอย่าง -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/hook.png') }}" alt="icon" width="75" height="70"
                            style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการควบคุมอาคาร
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/63.png') }}" alt="icon" width="75" height="70"
                            style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-5 lh-1"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            โครงการตามเทศ <br>
                            บัญญัติ2563
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/welfare.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านสวัสดิการสังคม
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/public-relations.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการประชาสัมพันธ์
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/64.png') }}" alt="icon" width="75" height="70"
                            style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-5 lh-1"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            โครงการตามเทศ <br>
                            บัญญัติ2564
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/mayor.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการปกครอง
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/occupation.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านอาชีพ
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/65.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:-8px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-5 lh-1"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            โครงการตามเทศ <br>
                            บัญญัติ2565
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/prevention.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านป้องกันสาธารณภัย
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/studying.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการศึกษา
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/checklist.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            แบบประเมินความพึงพอใจ
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/online-shop.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการพาณิชย์
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/travel-bag.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านการท่องเที่ยว
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/hierarchical.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            ด้านโครงสร้างพื้นฐาน
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#"
                        class="button-link d-flex justify-content-start align-items-center px-3 position-relative"
                        style="overflow: visible;">
                        <img src="{{ asset('images/base_data/medical-officer.png') }}" alt="icon" width="75"
                            height="70" style="position: relative; left: -20px; top:0px;">
                        <div class="bg-white w-100 text-center px-4 py-1 fs-4"
                            style="border-radius: 30px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.9);">
                            เฉพาะเจ้าหน้าที่
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
