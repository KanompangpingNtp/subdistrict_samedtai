<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="คำอธิบายเว็บไซต์">
    <title>@yield('title', 'Default Title')</title>
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

        .bg-nav {
            background-image: url('{{ asset('images/navbar/bg-navbar.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 10vh;
            padding: 10px;
        }

        .text-title-nav {
            color: #ffffff;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
        }

        .button-pink {
            background-color: rgb(255, 157, 211);
            font-size: 25px;
            font-weight: bold;
            padding: 2px 20px;
            border: 0px solid black;
            border-radius: 10px;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* เพิ่มทรานสิชั่น */
        }

        .button-pink:hover {
            transform: scale(1.05);
            /* ขยายขนาด */
            box-shadow: 0 0 5px 3px rgba(255, 255, 255, 0.5);
            /* เรืองแสงสีขาว */
        }

        .button-blue {
            background-color: rgb(138, 241, 255);
            font-size: 25px;
            font-weight: bold;
            padding: 2px 20px;
            border: 0px solid black;
            border-radius: 10px;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* เพิ่มทรานสิชั่น */
        }

        .button-blue:hover {
            transform: scale(1.05);
            /* ขยายขนาด */
            box-shadow: 0 0 5px 3px rgba(255, 255, 255, 0.5);
            /* เรืองแสงสีขาว */
        }

        @media (max-width: 430px) {

            .button-pink,
            .button-blue {
                font-size: 18px;
                /* ปรับขนาดฟอนต์ให้เล็กลง */
                padding: 2px 15px;
                /* ปรับขนาด padding เล็กน้อยเพื่อความสมดุล */
            }
        }


        .button-img img {
            cursor: pointer;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .button-img img:hover {
            transform: scale(1.1);
            /* ขยายขนาดเมื่อ hover */
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.7));
            /* เพิ่มเงาสีขาว */
        }

        /* สำหรับ scrollbar ทุกประเภท */
        ::-webkit-scrollbar {
            width: 5px;
            /* กำหนดความกว้างของ scrollbar */
            height: 12px;
            /* กำหนดความสูงของ scrollbar สำหรับแนวนอน */

        }

        /* ส่วนที่ใช้ควบคุมสีของ scrollbar */
        ::-webkit-scrollbar-thumb {
            background-color: rgb(255, 157, 211);
            /* สีของ scrollbar */
            border-radius: 10px;
            /* ทำให้ขอบ scrollbar เป็นมุมมน */
            transition: all 0.5s;
        }

        /* ส่วนที่เป็นพื้นหลังของ scrollbar */
        ::-webkit-scrollbar-track {
            background: transparent;
            /* สีพื้นหลังของ scrollbar */
            border-radius: 10px;
            /* ทำให้ขอบของ track เป็นมุมมน */
        }

        /* ส่วนของ scrollbar แนวนอน */
        ::-webkit-scrollbar-horizontal {
            height: 10px;
        }

        /* สำหรับ scrollbar เมื่อ hover */
        ::-webkit-scrollbar-thumb:hover {
            background-color: rgb(138, 241, 255);
            /* เปลี่ยนสีเมื่อ hover */
        }

        .bg-black-opacity {
            background: linear-gradient(to bottom, rgba(29, 29, 29, 0.6), rgba(29, 29, 29, 0.6));
            padding: 10px 5px;
            border-radius: 12px;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-te-gadget {
            font-size: 0;
        }

        .goog-te-gadget span {
            display: none;
        }

        .goog-te-gadget-simple {
            background: none;
            border: none;
        }

        .logo{
            height: 9rem;
        }

        .link-logo {

            transition: all 0.3s ease;
            cursor: pointer;
        }

        .link-logo:hover {
            transform: scale(1.05);
            /* ขยายเล็กน้อย */
            filter: brightness(1.1);
            /* ทำให้ดูสว่างขึ้น */
        }
        .bg-runtext {
        background-image: url('{{ asset('images/section-1/ด้านล่างของปุ่ม.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 10vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }


    .bg-menu {
        background: linear-gradient(to right, rgba(59, 183, 255, 0.6), rgba(84, 215, 255, 0.6));
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.7);
        z-index: 2;
        transition: transform 0.3s ease;
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
        color: #00dddd;
        /* เปลี่ยนสีของข้อความเมื่อ hover */
        border-radius: 10px;
        /* เพิ่มมุมโค้งเพื่อให้ดูนุ่มนวล */
    }

    .navbar-item:hover img {
        transform: scale(1.1);
        /* ขยายขนาดไอคอนให้ใหญ่ขึ้นเมื่อ hover */
    }

    .navbar-item:hover div {
        color: #00dddd;
        /* เปลี่ยนสีของข้อความเมื่อ hover */
    }

    /* แสดงแนวตั้งไอคอนและข้อความ */
    .navbar-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .button-pink-search {
        background-color: rgb(255, 157, 211);
        font-size: 25px;
        font-weight: bold;
        padding: 0px 15px;
        border: 0px solid black;
        border-radius: 10px;
        color: #ffffff;
        cursor: pointer;
        text-decoration: none;
        text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.8);
        transition: all 0.3s ease;
        /* เพิ่มทรานสิชั่น */
    }

    .button-pink-search:hover {
        background-color: rgb(255, 123, 196);
        /* เรืองแสงสีขาว */
    }

    .video-container {
        position: relative;
        width: 100%;
        min-height: 100vh;
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

    .video-container .content {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        text-align: center;
        color: white;
        overflow: visible;
        z-index: 999;
    }

    .custom-dropdown-container {
        position: relative;
        z-index: 999;
    }

    .custom-dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        list-style: none;
        padding: 10px;
        min-width: 200px;
        z-index: 999;
    }

    .custom-dropdown-container:hover .custom-dropdown-menu {
        display: block;
    }

    .custom-dropdown-menu .dropdown-item {
        display: block;
        padding: 8px 15px;
        color: #333;
        text-decoration: none;
    }

    .custom-dropdown-menu .dropdown-item:hover {
        background-color: #f0f0f0;
    }

    .navbar-nav .nav-item .nav-link {
        transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
    }

    .navbar-nav .nav-item .nav-link:hover {
        transform: scale(1.1);
        /* ขยายขึ้น 10% */
        filter: drop-shadow(0 0 8px rgb(255, 123, 196));
        /* เรืองแสงสีฟ้า */
    }

    .navbar-text {
        font-size: 20px;
    }

    .navbar .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-menu {
        background-color: rgb(255, 123, 196, 0.6);
        border: 1px solid rgb(255, 123, 196);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        margin: 0;
        font-size: 23px;
        transition: all 0.3s ease;
    }


    .dropdown-menu a {
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .dropdown-menu a:hover {
        color: rgb(0, 0, 0);
        background-color: rgb(255, 123, 196);
    }
    </style>

</head>

<body>

    <!-- Content Section -->
    <header class="bg-nav d-flex">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-md-between align-items-center">
            <div class="d-flex flex-column flex-lg-row justify-content-start align-items-center gap-3">
                <a href="https://samedtai.go.th/home" class="link-logo">
                    <img src="{{ asset('images/navbar/Logo.png') }}" alt="logo" class="logo">
                </a>
                <div class="text-title-nav lh-1 text-center text-md-start ">
                    <span class="me-1" style="font-size: 36px;">องค์การบริหารส่วนตำบล</span><span
                        style="font-size: 50px;">เสม็ดใต้</span> <br>
                    <span style="font-size: 22px;"> Samedtai Subditrict Administrative Organization</span> <br>
                    <span style="font-size: 30px;">อำเภอบางคล้า จังหวัดฉะเชิงเทรา</span>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-start align-items-center">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <a class="button-pink" href="{{ route('showLoginForm') }}">เข้าสู่ระบบ</a>
                    <a class="button-blue">สมัครสมาชิก</a>
                    <a class="button-pink" href="{{ route('contact') }}">ติดต่อเรา</a>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-center gap-2 button-img mt-2">
                    <div class="d-flex justify-content-center align-items-end button-img gap-2">
                        <img src="{{ asset('images/navbar/text-minus.png') }}" alt="text-minus" data-action="decrease">
                        <img src="{{ asset('images/navbar/text-normal.png') }}" alt="text-normal" data-action="normal">
                        <img src="{{ asset('images/navbar/text-plus.png') }}" alt="text-plus" data-action="increase">
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                let defaultFontSize = 20; // ขนาดเริ่มต้น
                                const minFontSize = 10;
                                const maxFontSize = 40;
                                const step = 2;

                                function updateFontSize(size) {
                                    document.querySelectorAll("*").forEach(el => {
                                        el.style.fontSize = size + "px";
                                    });
                                }

                                document.querySelectorAll("img[data-action]").forEach(img => {
                                    img.addEventListener("click", function() {
                                        let action = this.getAttribute("data-action");

                                        if (action === "decrease") {
                                            defaultFontSize = Math.max(minFontSize, defaultFontSize - step);
                                        } else if (action === "normal") {
                                            defaultFontSize = 20;
                                        } else if (action === "increase") {
                                            defaultFontSize = Math.min(maxFontSize, defaultFontSize + step);
                                        }

                                        updateFontSize(defaultFontSize);
                                    });
                                });
                            });
                        </script>
                        <img src="{{ asset('images/navbar/disability.png') }}" alt="btn-disability" width="42"
                            height="42" id="toggleTheme" class="ms-3">
                        <style>
                            .dark-mode * {
                                background-color: black !important;
                                color: white !important;
                            }
                        </style>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const toggleButton = document.getElementById("toggleTheme");

                                toggleButton.addEventListener("click", function() {
                                    document.body.classList.toggle("dark-mode");
                                });
                            });
                        </script>
                    </div>


                    <div class="bg-black-opacity d-flex justify-content-center align-items-center gap-1">
                        <div class="text-white d-none d-sm-block">
                            เปลี่ยนภาษา
                        </div>
                        <div id="google_translate_element"></div>

                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'en', // ภาษาเริ่มต้นของเว็บไซต์
                                    includedLanguages: 'en,th,id,ms,vi,lo,my,kh,ph,sg', // ภาษาในอาเซียน
                                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                    autoDisplay: false // ปิดการแสดงผลอัตโนมัติ
                                }, 'google_translate_element');
                            }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                        </script>


                        <a href="#" class="flag-link"><img src="{{ asset('images/navbar/country/thailand.png') }}"
                                alt="Thailand" width="23"></a>
                        <a href="#" class="flag-link"><img src="{{ asset('images/navbar/country/Brunei.png') }}"
                                alt="Brunei" width="23"></a>
                        <a href="#" class="flag-link"><img src="{{ asset('images/navbar/country/Myanmar.png') }}"
                                alt="Myanmar" width="23"></a>
                        <a href="#" class="flag-link"><img src="{{ asset('images/navbar/country/Laos.png') }}"
                                alt="Laos" width="23"></a>
                        <a href="#" class="flag-link"><img
                                src="{{ asset('images/navbar/country/Indonesia.png') }}" alt="Indonesia"
                                width="23"></a>
                        <a href="#" class="flag-link"><img
                                src="{{ asset('images/navbar/country/Malaysia.png') }}" alt="Malaysia"
                                width="23"></a>
                        <a href="#" class="flag-link"><img
                                src="{{ asset('images/navbar/country/Philippines.png') }}" alt="Philippines"
                                width="23"></a>
                        <a href="#" class="flag-link"><img
                                src="{{ asset('images/navbar/country/Cambodia.png') }}" alt="Cambodia"
                                width="23"></a>
                        <a href="#" class="flag-link"><img
                                src="{{ asset('images/navbar/country/Singapore.png') }}" alt="Singapore"
                                width="23"></a>
                        <a href="#" class="flag-link"><img src="{{ asset('images/navbar/country/Vietnam.png') }}"
                                alt="Vietnam" width="23"></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class=" w-100">
        <nav class="navbar navbar-expand-lg bg-menu pb-2 pt-3">
            <div class="container">
                <!-- ปุ่ม Toggle สำหรับหน้าจอเล็ก -->
                <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- เมนูทั้งหมด -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav w-100 d-flex flex-wrap justify-content-evenly fw-bold">
                        <li class="nav-item dropdown">
                            <a href="https://samedtai.go.th/home" class="nav-link dropdown-toggle d-flex flex-column align-items-center" >
                                <img src="{{ asset('images/section-1/0-ปุ่มหน้าหลัก.png') }}" alt="house" class="navbar-icon">
                                <div class="navbar-text">หน้าหลัก</div>
                            </a>
                        </li>
                        <!-- 1. หน้าหลัก -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center mt-2" href="#" id="basicInfoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/1-ข้อมูลพื้นฐาน.png') }}" alt="house" class="navbar-icon">
                                <div class="navbar-text">ข้อมูลพื้นฐาน</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="basicInfoDropdown">
                                <li><a class="dropdown-item" href="{{route('HistoryPage')}}">ประวัติความเป็นมา</a></li>
                                <li><a class="dropdown-item" href="{{route('GeneralInformationPage')}}">ข้อมูลสภาพทั่วไป</a></li>
                                <li><a class="dropdown-item" href="#">ข้อมูลชุมชน</a></li>
                                <li><a class="dropdown-item" href="{{route('CommunityProductsPage')}}">ผลิตภัณฑ์ชุมชน</a></li>
                                <li><a class="dropdown-item" href="{{route('ImportantPlacesPage')}}">สถานที่สำคัญ</a></li>
                                <li><a class="dropdown-item" href="{{route('LandscapeGalleryPage')}}">แกลอรี่ภาพถ่ายภูมิทัศน์</a></li>
                            </ul>
                        </li>


                        <!-- 2. บุคลากร -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="personnelDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/2-ปุ่มบุคลากร.png') }}" alt="teamwork" class="navbar-icon">
                                <div class="navbar-text">บุคลากร</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="personnelDropdown">
                                <li><a class="dropdown-item" href="{{route('PersonnelChart')}}">โครงสร้างองค์กร</a>
                                </li>
                                @foreach ($personnelAgencies as $agency)
                                <li>
                                    <a class="dropdown-item" href="{{ route('AgencyShow', ['id' => $agency->id]) }}">
                                        {{ $agency->personnel_agency_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <!-- 3. ผลการดำเนินงาน -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="performanceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/3-ปุ่มผลการดำเนินงาน.png') }}" alt="online survey" class="navbar-icon">
                                <div class="navbar-text">ผลการดำเนินงาน</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="performanceDropdown">
                                @foreach ($PerfResultsMenu as $detail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('PerformanceResultsSectionPages', ['id' => $detail->id]) }}">
                                        {{ $detail->type_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="authorityDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/4-ปุ่มอำนาจหน้าที่.png') }}" alt="อำนาจหน้าที่" class="navbar-icon">
                                <div class="navbar-text">อำนาจหน้าที่</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="authorityDropdown">
                                @foreach ($AuthorityMenu as $detail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('AuthorityShowDetailsPages', ['id' => $detail->id]) }}">
                                        {{ $detail->type_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="developmentPlanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/5-ปุ่มแผนพัฒนาท้องถิ่น.png') }}" alt="แผนพัฒนาท้องถิ่น" class="navbar-icon">
                                <div class="navbar-text">แผนพัฒนาท้องถิ่น</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="developmentPlanDropdown">
                                @foreach ($OperationalPlanMenu as $detail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('OperationalPlanSectionPages', ['id' => $detail->id]) }}">
                                        {{ $detail->type_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="lawDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/6-กฏหมาย.png') }}" alt="กฏหมายและกฏระเบียบ" class="navbar-icon">
                                <div class="navbar-text">กฏหมายและกฏระเบียบ</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="lawDropdown">
                                @foreach ($LawsRegsMenu as $detail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('LawsAndRegulationsSectionPages', ['id' => $detail->id]) }}">
                                        {{ $detail->type_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="citizenMenuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/section-1/7-ปุ่มเมนูสำหรับประชาชน.png') }}" alt="เมนูสำหรับประชาชน" class="navbar-icon">
                                <div class="navbar-text">เมนูสำหรับประชาชน</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="citizenMenuDropdown">
                                <li><a class="dropdown-item" href="{{route('ReceiveComplaintsForm')}}">รับเรื่องราวร้องทุกข์ </a></li>
                                <li><a class="dropdown-item" href="{{route('SatisfactionForm')}}">รับแจ้งร้องเรียนทุจริตประพฤติมิชอบ</a></li>
                                <li><a class="dropdown-item" href="{{route('page_data')}}">E-SERVICE</a></li>
                                @foreach ($PublicMenus as $detail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('MenuForPublicSectionPages', ['id' => $detail->id]) }}">
                                        {{ $detail->type_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
    </div>


    @yield('content')



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
