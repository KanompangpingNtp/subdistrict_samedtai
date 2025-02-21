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
</style>
<!-- Content Section -->
<main class="bg-page8 d-flex">
    <div class="container d-flex flex-column justify-content-center align-items-center gap-3 px-5">
        <div class="title-section-8 lh-1 text-center mb-5 py-3 px-4 d-flex ">
            หนังสือราชการ
        </div>
        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
            <div class=" col-lg-6 bg-pink-section-8">
                <div class="bg-white d-flex flex-column justify-content-center align-items-center gap-3 p-3"
                    style="border-radius: 20px;">
                    <div class=" p-1 w-100 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center align-items-center lh-1 gap-3 fw-bold bg-left-pink-title-section-8 w-50"
                            style="margin-top: -3.5rem;"> <!-- ใช้ margin-top เป็นค่าลบ -->
                            <img src="{{ asset('images/section-8/open-book-1.png') }}" alt="logo" width="45"
                                height="45">
                            <span class="text-center fs-4">จากกรมส่งเสริม <br>การปกครองท้องถิ่น</span>
                        </div>

                    </div>
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        ?>
                    <div class="card-view-page8 d-flex">
                        <img src="{{ asset('images/section-8/bookmark.png') }}" alt="icon" width="20"
                            height="25">
                        <div class="m-2 p-0">
                            <?php
                            $text = 'This is card number with sample text. This text might be too long for the card.';
                            echo mb_strimwidth($text, 0, 60, '...');
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="d-flex justify-content-center align-items-center lh-1 gap-3 fw-bold bg-left-pink-view-all-section-8 w-25"
                        style="margin-bottom: -2.5rem;"> <!-- ใช้ margin-top เป็นค่าลบ -->
                        <span class="text-center ">ดูทั้งหมด</span>
                    </div>
                </div>

            </div>

            <div class=" col-lg-6 bg-blue-section-8 mt-5 mt-lg-0">
                <div class="bg-white d-flex flex-column justify-content-center align-items-center gap-3 p-3"
                    style="border-radius: 20px;">
                    <div class=" p-1 w-100 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center align-items-center lh-1 gap-3 fw-bold bg-right-blue-title-section-8 w-50"
                            style="margin-top: -3.5rem;"> <!-- ใช้ margin-top เป็นค่าลบ -->
                            <img src="{{ asset('images/section-8/open-book-1.png') }}" alt="logo" width="45"
                                height="45">
                            <span class="text-center fs-3">จากท้องถิ่นจังหวัด</span>
                        </div>

                    </div>
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        ?>
                    <div class="card-view-page8 d-flex">
                        <img src="{{ asset('images/section-8/bookmarkblue.png') }}" alt="icon" width="20"
                            height="25">
                        <div class="m-2 p-0">
                            <?php
                            $text = 'This is card number with sample text. This text might be too long for the card.';
                            echo mb_strimwidth($text, 0, 60, '...');
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="d-flex justify-content-center align-items-center lh-1 gap-3 fw-bold bg-right-blue-view-all-section-8 w-25"
                        style="margin-bottom: -2.5rem;"> <!-- ใช้ margin-top เป็นค่าลบ -->
                        <span class="text-center">ดูทั้งหมด</span>
                    </div>
                </div>

            </div>
        </div>


    </div>
</main>
