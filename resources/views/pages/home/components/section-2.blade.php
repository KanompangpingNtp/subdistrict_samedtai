<style>
    .bg-page2 {
        background-image: url('{{ asset('images/section-2/bg-2.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-2 {
        font-size: 60px;
        color: white;
        text-shadow: 4px 1px 3px rgba(0, 0, 0, 0.8);
        font-weight: bold;
    }

    .bg-detail {
        background-color: #ffffff;
        padding: 5px 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .bg-phone1 {
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(191, 248, 255));
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .bg-phone2 {
        background: linear-gradient(to right, rgb(191, 248, 255), rgb(255, 157, 211));
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .banner-pink {
        background-color: rgb(255, 157, 211);
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .banner-blue {
        background-color: rgb(191, 248, 255);
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .banner-pink:hover,
    .banner-blue:hover {
        transform: scale(1.05);
        /* ขยายขนาดเล็กน้อย */
        box-shadow: none;
        /* ลบเงาเมื่อ hover */
    }
</style>


<!-- Content Section -->
<main class="bg-page2 d-flex">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center gap-5">
            <div class="title-section-2 mb-2">
                คณะผู้บริหาร
            </div>
            <div class="d-flex justify-content-start align-items-center gap-3 ">
                <div class="d-none d-sm-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/section-2/2.png') }}" alt="personal1" style="width:12rem;">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นายชวภณ พ่วงเจริญ</span> <br>
                        รองนายกองค์การ <br>
                        บริหารส่วนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1"
                            style="border-radius: 20px;">สายด่วน</span>065-3939-282
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <!-- รูปภาพที่จะเปลี่ยน -->
                    <img id="slideshow-img" src="{{ asset('images/section-2/m-1.png') }}" alt="personal2"
                        class="slideshow-img" style="width:17rem;">

                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-4">นายกิตติพงศ์ สีเหลือง</span> <br>
                        นายกองค์การบริหารส่วนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone2 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1"
                            style="border-radius: 20px;">สายด่วน</span>09-8552-5555
                    </div>
                </div>

                <style>
                    /* ตั้งค่า CSS เพื่อให้รูปภาพค่อย ๆ เปลี่ยน */
                    .slideshow-img {
                        width: 13rem;
                        transition: opacity 1s ease-in-out;
                        opacity: 1;
                        position: relative;
                    }
                </style>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const images = [
                            "{{ asset('images/section-2/m-2.png') }}",
                            "{{ asset('images/section-2/m-3.png') }}",
                        ]; // ใส่ลิงก์รูปภาพที่ต้องการให้เปลี่ยน
                        let currentIndex = 0;
                        const imgElement = document.getElementById("slideshow-img");

                        function changeImage() {
                            imgElement.style.opacity = 0; // ทำให้รูปเก่าค่อย ๆ จางออก
                            setTimeout(() => {
                                currentIndex = (currentIndex + 1) % images.length;
                                imgElement.src = images[currentIndex]; // เปลี่ยนรูปภาพใหม่
                                setTimeout(() => {
                                    imgElement.style.opacity = 1; // ค่อย ๆ แสดงรูปใหม่ (fade-in)
                                }, 50); // รอให้รูปใหม่โหลดก่อนแล้วค่อย fade-in
                            }, 30000); // รอ 1 วินาทีให้ fade-out เสร็จ
                        }

                        setInterval(changeImage, 33000); // เปลี่ยนรูปทุก 3 วินาที
                    });
                </script>

                <div class="d-none d-md-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/section-2/13.png') }}" alt="personal3" style="width:12rem;">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นางสาวชฎาพรเปี่ยมเจริญ</span> <br>
                        รองนายกองค์การ <br>
                        บริหารส่วนนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1"
                            style="border-radius: 20px;">สายด่วน</span>086-0329-077
                    </div>
                </div>
                <div class="d-none d-lg-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/section-2/7.png') }}" alt="personal4" style="width:12rem;">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นางอำพร แสงสุทธิวาส</span> <br>
                        เลขานุการนายก
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1"
                            style="border-radius: 20px;">สายด่วน</span>092-4166-322
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('images/section-2/ปลัด.png') }}" alt="personal5" style="width:10rem;">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-4">นางมยุรี นาคสุข</span> <br>
                        ปลัดองค์การบริหาร<br> ส่วนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone2 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1"
                            style="border-radius: 20px;">สายด่วน</span>080-0155-050
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 text-center">
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center banner-blue px-3 py-2 fw-bold lh-1">
                            <img src="{{ asset('images/section-2/1-สารจากนายก.png') }}" alt="icon" class="mb-2">
                            <span>สารจากนายก</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-center align-items-center banner-pink px-3 py-2 fw-bold lh-1">
                            <img src="{{ asset('images/section-2/2-เจตจำนง.png') }}" alt="icon" class="mb-2">
                            <span>เจตจำนงสุจริต <br> ของผู้บริหาร</span>
                        </div>
                    </div>
                    <div class="col">
                        <a href="https://samedtai.go.th/ReceiveComplaints/form" style="text-decoration: none; color: black;">
                            <div class="d-flex justify-content-center align-items-center banner-blue px-3 py-2 fw-bold lh-1">
                                <img src="{{ asset('images/section-2/3-รับเเจ้งเรือง.png') }}" alt="icon"
                                    class="mb-2">
                                <span>รับแจ้งเรื่องราวร้องทุกข์ </span>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://samedtai.go.th/Satisfaction/form" style="text-decoration: none; color: black;">
                            <div class="d-flex justify-content-center align-items-center banner-pink px-3 py-2 fw-bold lh-1">
                                <img src="{{ asset('images/section-2/4-รับเรืองร้องเรียนทุจริต.png') }}" alt="icon"
                                    class="mb-2">
                                <span>รับเรื่องร้องเรียน <br> ทุจริตประพฤติมิชอบ</span>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{route('itaPage')}}" class="text-decoration-none">
                            <div class="d-flex justify-content-center align-items-center banner-blue px-3 py-2 fw-bold lh-1">
                                <img src="{{ asset('images/section-2/5-ITALogo1.png') }}" alt="icon" class="mb-2">
                                <span class="text-dark">การประเมินคุณธรรม <br> และ ความโปร่งใส</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
