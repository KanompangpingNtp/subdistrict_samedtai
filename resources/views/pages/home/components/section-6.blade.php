<style>
    .bg-page6 {
        background-image: url('{{ asset('images/section-6/ช่วยกันตัด.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        /* ใช้ min-height เพื่อให้พื้นที่ครอบคลุมหน้าจอ */
    }

    .title-section-6 {
        font-size: 50px;
        color: rgb(0, 0, 0);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 30px;
        position: relative;
        /* ทำให้ตำแหน่งของลูกเป็นอิงกับ div นี้ */
        display: inline-block;
        /* ป้องกันไม่ให้พื้นที่ยืด */
    }

    .image-right {
        position: absolute;
        /* ปรับตำแหน่งโดยสัมพันธ์กับ .title-section-6 */
        top: 50%;
        /* กึ่งกลางแนวตั้ง */
        transform: translateY(-50%);
        /* ปรับให้อยู่กึ่งกลางจริง */
        right: -30px;
        /* ขยับรูปออกไปทางขวาครึ่งหนึ่ง */
    }

    .bg-details-section-6 {
        background: linear-gradient(to bottom, rgba(148, 148, 148, 0.521), rgba(146, 146, 146, 0.514));
        border-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .button-viewall-section-6 {
        background: linear-gradient(to right, rgb(138, 241, 255), rgb(138, 241, 255));
        border-radius: 15px;
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 25px;
        font-weight: bold;
        color: black;
        padding: 10px 20px;
        transition: all 0.3s ease;
        /* เพิ่มการเปลี่ยนแปลงแบบ Smooth */
    }

    .button-viewall-section-6:hover {
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(255, 157, 211));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .bg-pink-card-section-6 {
        background-color: rgb(255, 157, 211);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-pink-card-section-6:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .bg-blue-card-section-6 {
        background-color: rgb(191, 248, 255);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* เพิ่ม transition เพื่อความลื่นไหล */
    }

    .bg-blue-card-section-6:hover {
        transform: scale(1.05);
        /* ขยายขนาดการ์ดเล็กน้อย */
        box-shadow: 0px 4px 20px rgba(191, 248, 255, 0.7);
        /* เพิ่มความเด่นของเงา */
    }

    .bg-details-right-section-6 {
        background: linear-gradient(to bottom, rgb(191, 248, 255), rgb(255, 157, 211));
        border-radius: 20px;
        box-shadow: 0px 2px 20px rgba(255, 255, 255, 0.9);
    }

    .card-date {
        position: absolute;
        bottom: 10px; /* ระยะห่างจากด้านล่าง */
        right: 10px; /* ระยะห่างจากด้านขวา */
        display: flex;
        align-items: center;
        gap: 5px; /* ระยะห่างระหว่างไอคอนและข้อความ */
    }
</style>
<!-- Content Section -->
<main class="bg-page6 d-flex">
    <div class="container d-flex justify-content-center align-items-center gap-3">
        <div class="col-lg-8 d-flex flex-column justify-content-center align-items-center">
            <div class="title-section-6 lh-1 text-center mb-3 py-1 px-4 position-relative">
                ข่าวประชาสัมพันธ์
                <img src="{{ asset('images/section-6/marketing.png') }}" alt="logo" width="50" height="40"
                    class="image-right">
            </div>
            <div class="bg-details-section-6 px-3 py-4" style="width: 100%; margin: auto; position: relative;">
                <div class="row">
                 @foreach ($pressRelease->take(6) as $index => $post)
                        @php
                            // กำหนดคลาสพื้นหลังสลับสี
                            $cardBackgroundClass = ($index % 2 == 0) ? 'bg-blue-card-section-6' : 'bg-pink-card-section-6';
                        @endphp
                        <div class="col-lg-6 p-2">
                            <div class="d-flex align-items-center p-3 {{ $cardBackgroundClass }}"
                                style="height: 150px; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">

                                <!-- รูปภาพด้านซ้าย -->
                                <div style="flex: 0 0 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                    <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}"
                                        alt="Image {{ $index + 1 }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <!-- ข้อความด้านขวา -->
                                <div class="ms-3 bg-white h-100 rounded p-1" style="flex: 1; position: relative; height: 100%;">
                                    <div class="card-text">
                                        {{ Str::limit($post->title_name ?? 'No Title', 60, '...') }}
                                    </div>
                                    <div class="card-date d-flex align-items-center">
                                        <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                        <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="#" class="button-viewall-section-6 py-2 px-4"
                    style="position: absolute; bottom: -26px; right: 20px; background-color: lightgray; border-radius: 10px; text-decoration: none; font-weight: bold;">
                    ดูทั้งหมด
                </a>
            </div>

        </div>
        <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center px-2">
            <div class="title-section-6 lh-1 text-center mb-3 py-2 px-4 position-relative" style="font-size: 40px;">
                แนะนำจุดเช็คอินกินเที่ยว
                <img src="{{ asset('images/section-6/point.png') }}" alt="logo" width="40" height="50"
                    class="image-right">
            </div>
            <div class="bg-details-right-section-6 px-3 py-2" style="width: 100%; margin: auto; position: relative;">
                <div class="row">
                    @foreach ($checkinspot->take(3) as $index => $post)
                        @php
                            // กำหนดคลาสพื้นหลังสลับสี
                            $cardBackgroundClass = ($index % 2 == 0) ? 'bg-blue-card-section-6' : 'bg-pink-card-section-6';
                        @endphp
                        <div class="col-lg-12 mb-1 p-2">
                            <div class="d-flex align-items-center p-3 {{ $cardBackgroundClass }}"
                                style="height: 150px; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);">

                                <!-- รูปภาพด้านซ้าย -->
                                <div style="flex: 0 0 100px; height: 100px; overflow: hidden; border-radius: 10px;">
                                    <img src="{{ asset('storage/' . ($post->photos->first()->post_photo_file ?? 'images/default.jpg')) }}"
                                        alt="Image {{ $index + 1 }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <!-- ข้อความด้านขวา -->
                                <div class="ms-3 bg-white h-100 rounded p-1" style="flex: 1; position: relative; height: 100%;" >
                                    <div class="card-text">
                                        {{ Str::limit($post->topic_name ?? 'No Title', 60, '...') }}
                                    </div>
                                    <div class="card-date d-flex align-items-center">
                                        <img src="{{ asset('images/section-5/hourglass.png') }}" alt="icon" width="15" height="20" class="me-2">
                                        <div class="card-text">{{ \Carbon\Carbon::parse($post->date)->format('d-m-Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <a href="#" class="button-viewall-section-6 py-2 px-4 mt-3">
                ดูทั้งหมด
            </a>
        </div>
    </div>
</main>
