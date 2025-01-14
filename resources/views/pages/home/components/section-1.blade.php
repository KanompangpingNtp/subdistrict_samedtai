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
    

</style>
<main class="d-flex flex-column align-items-center justify-content-end bg-page1">
    <div class="bg-menu w-100 pb-2 pt-3">
        <div class="container d-flex flex-wrap justify-content-evenly">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/1-ปุ่มหน้าหลัก.png') }}" alt="ปุ่มหน้าหลัก">
                    <div>หน้าหลัก</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/2-ปุ่มบุคลากร.png') }}" alt="ปุ่มบุคลากร">
                    <div>บุคลากร</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/3-ปุ่มผลการดำเนินงาน.png') }}" alt="ปุ่มผลการดำเนินงาน">
                    <div>ผลการดำเนินงาน</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/4-ปุ่มอำนาจหน้าที่.png') }}" alt="ปุ่มอำนาจหน้าที่">
                    <div>อำนาจหน้าที่</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/5-ปุ่มแผนพัฒนาท้องถิ่น.png') }}" alt="ปุ่มแผนพัฒนาท้องถิ่น">
                    <div>แผนพัฒนนาท้องถิ่น</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/6-กฏหมาย.png') }}" alt="กฏหมาย">
                    <div>กฏหมายและกฏระเบียบ</div>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <a href="#" class="navbar-item">
                    <img src="{{ asset('images/section-1/7-ปุ่มเมนูสำหรับประชาชน.png') }}" alt="ปุ่มเมนูสำหรับประชาชน">
                    <div>เมนูสำรหับประชาชน</div>
                </a>
            </div>
        </div>
    </div>
    <div class="bg-runtext w-100 d-flex align-items-center">
        <div class="container d-flex align-items-center gap-3">
            <div class="col-12 col-md-9 bg-text">
                <div style="white-space: nowrap; overflow: hidden; position: relative; width: 100%; height: 38px; background: linear-gradient(to right, #ffffff6b, #ffffff6b); border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); padding: 5px;">
                    <span style="display: inline-block; position: absolute; white-space: nowrap; animation: marquee 15s linear infinite; color: white; font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        วิสัยทัศน์ : ตำบลน่าอยู่ เรียนรู้ตลอดชีวิต เป็นมิตรสิ่งแวดล้อม พร้อมพัฒนาสู่เมืองดิจิทัล
                    </span>
                </div>
            </div>
            <div class="col-3 d-none d-md-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ค้นหา..." style="border-radius: 10px 0 0 10px;">
                    <button class="button-pink-search" type="button" style="border-radius: 0 10px 10px 0;">
                        <i class="fas fa-search mt-2"></i>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    
    <style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    </style>
    

</main>
