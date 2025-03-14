<style>
    .bg-page1 {
        background-image: url('{{ asset('images/section-1/bg-1.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 88vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
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

</style>
<main class="d-flex flex-column align-items-center justify-content-end bg-page1">
    <div class="video-container">
        <video autoplay loop muted playsinline>
            <source src="{{ asset('images/video/องค์การบริหารส่วนตำบลเสม็ดใต้ใหม่.webm') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="content">
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
                                <!-- 1. หน้าหลัก -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle d-flex flex-column align-items-center " href="#" id="basicInfoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('images/section-1/1-ปุ่มหน้าหลัก.png') }}" alt="house" class="navbar-icon">
                                        <div class="navbar-text ">หน้าหลัก</div>
                                    </a>
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
                                        <li><a class="dropdown-item" href="{{route('testPage')}}">แบบสอบถามความพึงพอใจ </a></li>
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
                
            </div>
            
            <div class="bg-runtext w-100 d-flex align-items-center" style="z-index: 10;">
                <div class="container d-flex align-items-center gap-3">
                    <div class="col-12 col-md-9 bg-text">
                        <div
                            style="white-space: nowrap; overflow: hidden; position: relative; width: 100%; height: 38px; background: linear-gradient(to right, #ffffff6b, #ffffff6b); border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); padding: 5px;">
                            <span
                                style="display: inline-block; position: absolute; white-space: nowrap; animation: marquee 15s linear infinite; color: white; font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                                วิสัยทัศน์ : ตำบลน่าอยู่ เรียนรู้ตลอดชีวิต เป็นมิตรสิ่งแวดล้อม พร้อมพัฒนาสู่เมืองดิจิทัล
                            </span>
                        </div>
                    </div>
                    <div class="col-3 d-none d-md-block">
                        <form action="https://www.google.com/search" method="GET" class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="ค้นหา..."
                                style="border-radius: 10px 0 0 10px;">
                            <button class="button-pink-search" type="submit" style="border-radius: 0 10px 10px 0;">
                                <i class="fas fa-search mt-2"></i>
                            </button>
                        </form>
                    </div>

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
