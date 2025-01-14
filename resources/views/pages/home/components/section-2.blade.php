<style>
    .bg-page2 {
        background-image: url('{{ asset('images/section-2/bg-2.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 120vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .title-section-2{
        font-size: 60px;
        color: white;
        text-shadow: 4px 1px 3px rgba(0, 0, 0, 0.8);
        font-weight: bold;
    }

    .bg-detail{
        background-color: #ffffff;
        padding: 5px 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .bg-phone1{
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(191, 248, 255));
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .bg-phone2{
        background: linear-gradient(to right, rgb(191, 248, 255), rgb(255, 157, 211));
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .banner-pink{
        background-color: rgb(255, 157, 211);
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor:pointer;
    }
    .banner-blue{
        background-color: rgb(191, 248, 255);
        border-top-right-radius: 20px;
        border-bottom-left-radius: 20px;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.7);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor:pointer;
    }

    .banner-pink:hover, .banner-blue:hover {
    transform: scale(1.05); /* ขยายขนาดเล็กน้อย */
    box-shadow: none; /* ลบเงาเมื่อ hover */
}

</style>
<!-- Content Section -->
<main class="bg-page2 d-flex">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center gap-5">
            <div class="title-section-2 mb-2">
                คณะผู้บริหาร
            </div>
            <div class="d-flex justify-content-center align-items-center gap-5">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/section-2/personal-2.png')}}" alt="personal1">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นายชวภณ พ่วงเจริญ</span> <br>
                        รองนายกองค์การ <br>
                        บริหารส่วนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1" style="border-radius: 20px;">สายด่วน</span>065-3939-282 
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/section-2/personal-5.png')}}" alt="personal2">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-4">นายกิตติพงศ์ สีเหลือง</span> <br>
                        นายกองค์การบริหารส่วนนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone2 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1" style="border-radius: 20px;">สายด่วน</span>09-8552-5555
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/section-2/personal-4.png')}}" alt="personal3">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นางสาวชฎาพรเปี่ยมเจริญ</span> <br>
                        รองนายกองค์การ <br>
                        บริหารส่วนนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1" style="border-radius: 20px;">สายด่วน</span>086-0329-077
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/section-2/personal-1.png')}}" alt="personal4">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-5">นางอำพร แสงสุทธิวาส</span> <br>
                        เลขานุการนายก
                    </div>
                    <div class="bg-phone1 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1" style="border-radius: 20px;">สายด่วน</span>092-4166-322
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/section-2/personal-3.png')}}" alt="personal5">
                    <div class="bg-detail w-100 lh-sm text-center">
                        <span class="fw-bold fs-4">นางศิริลักษณ์ โสธรเทวาพิทักษ์</span> <br>
                        รองปลัดองค์การบริหารส่วนตำบลเสม็ดใต้
                    </div>
                    <div class="bg-phone2 w-100 py-2 ps-1 pe-2 fw-bold fs-5">
                        <span class="bg-dark text-white px-2 py-1 me-1" style="border-radius: 20px;">สายด่วน</span>0-3858-4130 ต่อ 119
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-4">
                <div class="d-flex align-items-center lh-1 banner-blue px-3 py-1 fw-bold ">
                    <img src="{{asset('images/section-2/1-สารจากนายก.png')}}" alt="icon" class="me-2">
                    สารจากนายก
                </div>
                <div class="d-flex align-items-center lh-1 banner-pink px-3 py-1 fw-bold ">
                    <img src="{{asset('images/section-2/2-เจตจำนง.png')}}" alt="icon" class="me-2">
                    เจตจำนงสุจริต <br>
                    ของผู้บริหาร
                </div>
                <div class="d-flex align-items-center lh-1 banner-blue px-3 py-1 fw-bold ">
                    <img src="{{asset('images/section-2/3-รับเเจ้งเรือง.png')}}" alt="icon" class="me-2">
                    รับแจ้งเรื่องราวร้องทุกข์ <br>
                    ร้องทุกข์
                </div>
                <div class="d-flex align-items-center lh-1 banner-pink px-3 py-1 fw-bold ">
                    <img src="{{asset('images/section-2/4-รับเรืองร้องเรียนทุจริต.png')}}" alt="icon" class="me-2">
                    รับเรื่องร้องเรียน <br>
                    ทุจริตประพฤติมิชอบ
                </div>
                <div class="d-flex align-items-center lh-1 banner-blue px-3 py-1 fw-bold ">
                    <img src="{{asset('images/section-2/5-ITALogo1.png')}}" alt="icon" class="me-2">
                    การประเมินคุณธรรม <br>
                    และ ความโปร่งใส
                </div>
            </div>
        </div>
    </div>
</main>
