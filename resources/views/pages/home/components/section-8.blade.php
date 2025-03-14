<style>
    .bg-page8 {
        background-image: url('{{ asset('images/section-8/BG.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-8 {
        font-size: 40px;
        color: rgb(0, 0, 0);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 16px;
    }

    .bg-pink-section-8 {
        background: linear-gradient(to top, rgb(255, 157, 211), rgb(255, 157, 211));
        padding: 5px;
        border-radius: 20px;
    }

    .bg-left-pink-title-section-8 {
        background: linear-gradient(to top, rgb(255, 157, 211), rgb(255, 157, 211));
        padding: 10px 23px;
        border-radius: 30px;
    }

    .card-view-page8 {
        width: 100%;
        background: rgb(231, 231, 231);
        transition: all 0.3s ease;
        cursor: pointer;
        /* เพิ่มการเปลี่ยนแปลงอย่างนุ่มนวล */
    }

    .card-view-page8:hover {
        background: rgb(200, 200, 200);
        /* เปลี่ยนสีพื้นหลังเมื่อ hover */
        transform: scale(1.02);
        /* ขยายขนาดเล็กน้อย */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        /* เพิ่มเงา */
    }


    .bg-left-pink-view-all-section-8 {
        background: linear-gradient(to top, rgb(255, 157, 211), rgb(255, 157, 211));
        padding: 10px 23px;
        border-radius: 30px;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        cursor: pointer;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงอย่างนุ่มนวล */
    }

    .bg-left-pink-view-all-section-8:hover {
        background: linear-gradient(to top, rgb(255, 100, 150), rgb(255, 100, 150));
        /* เปลี่ยนสี gradient เมื่อ hover */
        box-shadow: 0px 2px 20px rgba(255, 100, 150, 0.9);
        /* เพิ่มเงาเข้มขึ้น */
        transform: scale(1.05);
        /* ขยายขนาดเล็กน้อย */
    }


    .bg-blue-section-8 {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(138, 241, 255));
        padding: 5px;
        border-radius: 20px;
    }

    .bg-right-blue-title-section-8 {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(138, 241, 255));
        padding: 10px 23px;
        border-radius: 30px;
    }

    .bg-right-blue-view-all-section-8 {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(138, 241, 255));
        padding: 10px 23px;
        border-radius: 30px;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        cursor: pointer;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงอย่างนุ่มนวล */
    }

    .bg-right-blue-view-all-section-8:hover {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(138, 241, 255));
        /* เปลี่ยนสี gradient เมื่อ hover */
        box-shadow: 0px 2px 20px rgb(107, 238, 255);
        /* เพิ่มเงาเข้มขึ้น */
        transform: scale(1.05);
        /* ขยายขนาดเล็กน้อย */
    }

    .title-book {
        font-size: 2rem;
        font-weight: bold;
        text-shadow:
            1px 1px 0 #fff,
            /* ขอบด้านขวา */
            -1px -1px 0 #fff,
            /* ขอบด้านซ้าย */
            1px -1px 0 #fff,
            /* ขอบด้านล่าง */
            -1px 1px 0 #fff;
        /* ขอบด้านบน */
    }

    .link-book {
        background: linear-gradient(to bottom, #8dd5fe, #f4b0d4);
        color: rgb(0, 0, 0);
        padding: 8px 5px;
        border-radius: 15px;
        font-size: 20px;
        text-decoration: none;
        transition: background 0.3s, transform 0.3s;
    }

    .link-book div {
        border-radius: 10px;
    }

    .link-book:hover {
        background: linear-gradient(to bottom, #f4b0d4, #8dd5fe);
        color: #f4b0d4;
        transform: scale(1.05);
    }

    .book-pink,
    .book-blue {
        background: linear-gradient(to bottom, #e8b6da, #9bd1f8);
        border-radius: 50px;
        padding: 1rem;
    }
</style>
<!-- Content Section -->
<main class="bg-page8 d-flex">
    <div class="container">
        <div class="row">
            <div class="col-4 d-none d-lg-flex justify-content-center align-items-center">
                <img src="{{ asset('images/section-8/Book.png') }}" alt="book-title" class="img-">
            </div>
            <div class="col-1 d-none d-lg-flex flex-column justify-content-evenly align-items-center ">
                <img src="{{ asset('images/section-8/double-chevron.png') }}" alt="img-arrow" style="width: 100px;"
                    class="mb-5">
                <img src="{{ asset('images/section-8/double-chevron.png') }}" alt="img-arrow" style="width: 100px;"
                    class="mt-5">
            </div>
            <div class="col-lg-7 d-flex flex-column align-items-between">
                <div class="book-blue my-2 d-flex flex-column justify-content-center align-items-start gap-1">
                    <div class="title-book mb-3 text-center w-100">
                        จากกรมส่งเสริมการปกครองท้องถิ่น
                    </div>
                    <div class="bg-white p-3 d-flex flex-column justify-content-center align-items-start w-100 gap-1"
                        style="border-radius: 30px;">
                        <a href="#" class="link-book">
                            <div class="py-2 ps-2 pe-5 bg-white">หน้าแรก</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="py-2 ps-2 pe-5 bg-white">หนังสือราชการของ สถ.</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="py-2 ps-2 pe-5 bg-white">กฏหมาย ระเบียบ และมติ ก.กลาง</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="py-2 ps-2 pe-5 bg-white">บทความน่าสนใจ</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="py-2 ps-2 pe-5 lh-1 bg-white" >พรบ. และประกาศเกี่ยวกับเทคโนโลยีสารสนเทศ</div>
                        </a>
                    </div>

                </div>
                <div class="book-pink my-2 d-flex flex-column justify-content-center align-items-start gap-1">
                    <div class="title-book mb-2 text-center w-100">
                        จากท้องถิ่นจังหวัด
                    </div>
                    <div class="bg-white p-3 d-flex flex-column justify-content-center align-items-start w-100 gap-1"
                        style="border-radius: 30px;">
                        <a href="#" class="link-book">
                            <div class="bg-white py-2 ps-2 pe-5">หน้าแรก</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="bg-white py-2 ps-2 pe-5">ข่าวประชาสัมพันธ์</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="bg-white py-2 ps-2 pe-5">หนังสือสั่งการ</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="bg-white py-2 ps-2 pe-5">กระดานข่าว</div>
                        </a>
                        <a href="#" class="link-book">
                            <div class="bg-white py-2 ps-2 pe-5">ติดต่อหน่วยงาน</div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
