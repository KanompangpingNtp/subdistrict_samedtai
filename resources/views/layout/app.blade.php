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

        .logo {
            height: 9rem;
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
    </style>
</head>

<body>

    <!-- Content Section -->
    <header class="bg-nav d-flex">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-md-between align-items-center">
            <div class="d-flex  justify-content-start align-items-center gap-3">
                <img src="{{ asset('images/navbar/Logo.png') }}" alt="logo" class="logo d-none d-md-block">
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
                    <a class="button-pink" href="{{route('contact')}}">ติดต่อเรา</a>
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


    <div class="d-flex flex-column justify-content-center align-items-center gap-2 position-fixed top-50 end-0 translate-middle-y me-3 p-3 shadow rounded"
        id="floatingButtons" style="z-index: 1000; background-color: rgba(255, 157, 211, 0.7);">
        <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/arrow.png') }}" alt="upload"
                width="25" height="25"></a>
        <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/share.png') }}" alt="chair"
                width="25" height="25"></a>
        <a href="#"><img class="hover-effect" src="{{ asset('images/section-10/messenger.png') }}"
                alt="message" width="25" height="25"></a>
    </div>


    @yield('content')


    <script>
        document.getElementById("scrollToTop").addEventListener("click", function (event) {
            event.preventDefault(); // ป้องกันการโหลดหน้าใหม่
            window.scrollTo({ top: 0, behavior: "smooth" }); // เลื่อนขึ้นแบบนุ่มนวล
        });
    </script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
