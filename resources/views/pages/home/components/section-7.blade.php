<style>
    .bg-page7 {
        background-image: url('{{ asset('images/section-7/ช่วยกันตัด.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        padding: 3rem 0;
    }

    .title-section-7 {
        font-size: 30px;
        color: rgb(0, 0, 0);
        box-shadow: 0px 2px 15px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        border-radius: 100px;
        position: relative;
        /* ทำให้ตำแหน่งของลูกเป็นอิงกับ div นี้ */
        display: inline-block;
        /* ป้องกันไม่ให้พื้นที่ยืด */
    }

    .bg-details-section-7 {
        background: linear-gradient(to bottom, rgba(83, 83, 83, 0.521), rgba(83, 83, 83, 0.521));
        border-radius: 40px;
    }

    @media (max-width: 575px) {
    .bg-details-section-7 {
        border-radius: 40px 40px 0 0; /* มนเฉพาะด้านบน */
    }
}

    .bg-view-page7 {
        background: linear-gradient(to bottom, rgba(83, 83, 83, 0.521), rgba(83, 83, 83, 0.521));
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 5px;
    }

    .bg-view-in-page7 {
        background-color: rgba(107, 107, 107, 0.521);
        min-height: 36rem;
        border-radius: 3%;
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .layout-card-view-page7 {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        padding: 3px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.7);
        width: 100%;
        transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
    }

    .card-view-page7 {
        width: 100%;
        background: white;
        border-radius: 10px;
        padding-left: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        padding-top: 5px;
    }


    .layout-card-view-page7:hover {
        transform: translateY(-5px);
        /* ยกปุ่มขึ้นเล็กน้อย */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);

    }

    .card-view-page7 .title {
        font-size: 1.5rem;
        color: #333;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* กำหนดให้แสดงเพียง 2 บรรทัด (ประมาณ 25 คำ) */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        /* แสดง "..." เมื่อข้อความยาวเกิน */
    }


    .card-view-page7 .date {
        font-size: 1.5rem;
        color: #555;
    }

    .card-view-page7 .content {
        font-size: 1.25rem;
        color: #777;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* แสดงผลเพียง 2 บรรทัด */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        /* รองรับการตัดคำในหลายบรรทัด */
    }

    .luxury-button {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 10px 10px;
        background: linear-gradient(to right, rgb(138, 241, 255), rgb(138, 241, 255));
        border: none;
        position: relative;
        color: black;
        font-size: 1.4rem;
        cursor: pointer;
        border-radius: 35px;
        box-shadow: 0px 2px 5px rgba(255, 255, 255, 0.9);
        font-weight: bold;
        transition: all 0.3s ease;
    }

    /* สำหรับหน้าจอขนาด lg หรือใหญ่กว่า (1200px ขึ้นไป) */
    @media (min-width: 1200px) {
        .luxury-button {
            width: 200px;
            padding: 10px 10px;
            font-size: 1.4rem;
            color: white;
        }
    }

    .luxury-button:hover {
        transform: translateY(-2px);
        transform: rotate(2deg) scale(1.05);
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(255, 157, 211));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 20px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .luxury-button.active {
        transform: translateY(-2px);
        transform: rotate(2deg) scale(1.05);
        background: linear-gradient(to right, rgb(255, 157, 211), rgb(255, 157, 211));
        /* เปลี่ยนทิศทางไล่สี */
        box-shadow: 0px 4px 4px rgba(255, 157, 211, 0.9), 0px 4px 20px rgba(138, 241, 255, 0.9);
        /* เพิ่มเงาสี */
        transform: scale(1.05);
        /* ขยายขนาด */
        color: white;
        /* เปลี่ยนสีข้อความ */
    }

    .pdf-item {
        margin-bottom: 8px;
    }

    .text-primary {
        color: #007bff;
        text-decoration: none;
    }

    .text-primary:hover {
        text-decoration: underline;
    }

    .hover-effect {
        transition: transform 0.3s ease, opacity 0.3s ease;
        /* การเปลี่ยนแปลงของภาพ */
    }

    .hover-effect:hover {
        transform: scale(1.02);
        /* ขยายภาพเมื่อ hover */
        opacity: 0.8;
        /* ทำให้ภาพโปร่งแสง */
    }

    .underline-gradient {
        position: relative;
        display: inline-block;
    }

    .underline-gradient::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 3px;
        /* ความสูงของเส้นใต้ */
        background: linear-gradient(to right, #ff69b4, #00bfff);
        /* ไล่สีจากชมพูไปฟ้า */
        border-radius: 2px;
        /* ทำให้เส้นใต้มีความโค้งมล */
    }



    /* ปุ่มส่ง */
    .submit-btn {
        padding: 1px 10px;
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .layout-bottom-page7:hover {
        transform: translateY(-1px);
        /* ยกปุ่มขึ้นเล็กน้อย */
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .layout-bottom-page7 {
        background: linear-gradient(to top, rgb(138, 241, 255), rgb(255, 157, 211));
        padding: 3px;
        border-radius: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.7);
        width: 100%;
        transition: transform 0.3s, box-shadow 0.3s, background 0.3s;
    }

    .img-hover-section-7 {
        transition: all 0.3s ease;
        /* การเปลี่ยนแปลงอย่างราบรื่น */
    }

    /* เอฟเฟกต์เมื่อ hover */
    .btn-link:hover .img-hover-section-7 {
        transform: scale(1.1);
        /* ขยายขนาดภาพเมื่อ hover */
        filter: drop-shadow(0px 2px 15px rgba(255, 255, 255, 0.8));
    }
</style>



<main class="bg-page7 d-flex">
    <div class="container d-flex flex-column flex-xl-row justify-content-center align-items-center gap-3">
        <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-center">
            <div class="title-section-7 lh-1 text-center mb-3 py-3 px-4 d-flex">
                <div>
                    ประกาศความเคลื่อนไหว <br>
                    องค์การบริหารส่วนตำบลเสม็ดใต้
                </div>
                <img src="{{ asset('images/section-7/run.png') }}" alt="logo" width="60" height="60"
                    class="ms-2">
            </div>
            <div class="d-flex flex-column align-content-center justify-content-center w-100">
                <div class="d-flex align-content-center justify-content-around gap-2 bg-details-section-7 py-3 px-3">
                    <div class="luxury-button lh-1" id="btnProcurement"
                        onclick="changeContent('จัดซื้อจัดจ้าง', {{ json_encode($procurement) }})">
                        ประกาศจัดซื้อจัดจ้าง
                    </div>
                    <div class="luxury-button lh-1" id="btnProcurementResults"
                        onclick="changeContent('ผลจัดซื้อจัดจ้าง', {{ json_encode($procurementResults) }})">
                        ผลจัดซื้อจัดจ้าง
                    </div>
                    <div class="luxury-button lh-1" id="btnAverage"
                        onclick="changeContent('ราคากลาง', {{ json_encode($average) }})">
                        ประกาศราคากลาง
                    </div>
                    <div class="luxury-button lh-1" id="btnRevenue"
                        onclick="changeContent('เก็บรายได้', {{ json_encode($revenue) }})">
                        งานเก็บรายได้
                    </div>
                </div>
                <div class="bg-view-page7 mx-0 mx-sm-5">
                    <div class="bg-view-in-page7 d-flex flex-column justify-content-start align-items-center gap-1 overflow-auto"
                        id="contentArea">
                        <!-- เนื้อหาที่จะถูกเปลี่ยนแปลงที่นี่ -->
                    </div>
                    <div id="pagination" class="d-flex justify-content-center mt-3">
                        <button id="prevBtn" class="btn btn-outline-dark me-2" style="display:none;">
                            <i class="fa-solid fa-chevron-left"></i> ก่อนหน้า
                        </button>
                        <a href="{{route('TreasuryAnnouncementData')}}" class="button-viewall-section-6 py-2 px-4 mx-2">
                            ดูทั้งหมด
                        </a>
                        <button id="nextBtn" class="btn btn-outline-dark" style="display:none;">
                            ถัดไป <i class="fa-solid fa-chevron-right"></i>
                        </button>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex flex-column justify-content-center align-items-center gap-3">
            <a href="{{ route('ShowDataButton') }}" class="btn-link">
                <img src="{{ asset('images/section-7/btn.png') }}" alt="btn-go" class="img-hover-section-7 img-fluid">
            </a>
            <a href="{{ route('ShowDataButton') }}" class="btn-link">
                <img src="{{ asset('images/section-7/bannerภายนอก.png') }}" alt="btn-go" class="img-hover-section-7 img-fluid">
            </a>

            <div class="d-flex align-content-center justify-content-around gap-2 bg-details-section-7 p-2"
                style="border-radius: 10px;">
                <div class="layout-card-view-page7" style="border-radius: 20px;">
                    <div class="bg-white p-3 d-flex flex-column align-content-center justify-content-center"
                        style="border-radius: 20px;">
                        <div class="d-flex align-content-center justify-content-center">
                            <img src="{{ asset('images/section-7/survey.png') }}" alt="icon" width="45"
                                height="45" class="me-2">
                            <span class="fw-bold fs-2 underline-gradient">แบบสำรวจความคิดเห็น</span>
                        </div>
                        <div class="radio-container mt-2 ms-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" value="1"
                                    id="radio1">
                                <label class="form-check-label" for="radio1">ตัวเลือก 1</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" value="2"
                                    id="radio2">
                                <label class="form-check-label" for="radio2">ตัวเลือก 2</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" value="3"
                                    id="radio3">
                                <label class="form-check-label" for="radio3">ตัวเลือก 3</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" value="4"
                                    id="radio4">
                                <label class="form-check-label" for="radio4">ตัวเลือก 4</label>
                            </div>
                        </div>

                        <!-- ปุ่มส่ง -->
                        <div class="layout-bottom-page7 mt-2">
                            <button class="submit-btn fs-2 w-100 fw-bold">กดโหวต</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // ฟังก์ชันที่ใช้แสดงเนื้อหา
    function changeContent(topic, data) {
        // เก็บข้อมูลทั้งหมด
        allItems = data;

        // เรียกใช้ฟังก์ชันเพื่อแสดงข้อมูลตามหน้า
        displayItems();

        // ทำการเปลี่ยนปุ่มที่ถูกคลิกเป็น active และรีเซ็ตปุ่มอื่นๆ
        setActiveButton(topic);
    }

    function setActiveButton(topic) {
        // กำหนดชื่อปุ่มตามหัวข้อ
        const buttons = ['btnProcurement', 'btnProcurementResults', 'btnAverage', 'btnRevenue'];
        const topics = ['จัดซื้อจัดจ้าง', 'ผลจัดซื้อจัดจ้าง', 'ราคากลาง', 'เก็บรายได้'];

        // รีเซ็ตสถานะ active ของทุกปุ่ม
        buttons.forEach(buttonId => document.getElementById(buttonId).classList.remove('active'));

        // ทำให้ปุ่มที่ถูกเลือกมีสถานะ active
        const activeButtonIndex = topics.indexOf(topic);
        if (activeButtonIndex !== -1) {
            document.getElementById(buttons[activeButtonIndex]).classList.add('active');
        }
    }

    let currentPage = 1;
    const itemsPerPage = 5;
    let allItems = [];

    function displayItems() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = currentPage * itemsPerPage;

        const itemsToDisplay = allItems.slice(startIndex, endIndex);
        let contentArea = document.getElementById('contentArea');
        contentArea.innerHTML = '';

        itemsToDisplay.forEach(item => {
            let newContent = document.createElement('div');

            // เพิ่ม div สำหรับ layout-card-view-page7
            let layoutWrapper = document.createElement('div');
            layoutWrapper.className = 'layout-card-view-page7'; // คลาสใหม่ที่ครอบคลุม

            // สร้าง card-view-page7 ภายใน layout
            let cardContent = document.createElement('div');
            cardContent.className = 'card-view-page7';

            let pdfContent = '';

            if (item.pdfs && item.pdfs.length > 0) {
                pdfContent = item.pdfs.map(pdf => `
                <div class="pdf-item ms-3">
                    <i class="fa-solid fa-file-pdf text-danger"></i>
                    <a href="{{ asset('storage/${pdf.post_pdf_file}') }}" target="_blank" class="text-primary">
                        ${pdf.post_pdf_file.split('/').pop()}
                    </a>
                </div>
            `).join('');
            } else {
                pdfContent = '<div class="text-danger ms-2">ไม่มีข้อมูล PDF</div>';
            }

            const truncateTitle = (title) => {
                if (title.length > 40) {
                    return title.substring(0, 40) + '...';
                }
                return title;
            };

            // กำหนด HTML ของ card-view-page7
            cardContent.innerHTML = `
            <div class="d-flex justify-content-between align-content-center">
                <div class="title text-truncate d-flex justify-content-start align-items-center">
                     ${truncateTitle(item.title_name)}
                </div>
                <div class="date pt-1"> <img src="{{ asset('images/section-7/on-time.png') }}" alt="bell" width="25" height="22"> ${item.date}</div>
            </div>
            <div class="content">
                ${pdfContent}
            </div>
        `;

            // เพิ่ม cardContent ลงใน layoutWrapper
            layoutWrapper.appendChild(cardContent);

            // เพิ่ม layoutWrapper ลงใน contentArea
            contentArea.appendChild(layoutWrapper);
        });

        document.getElementById('prevBtn').style.display = currentPage === 1 ? 'none' : 'inline-block';
        document.getElementById('nextBtn').style.display = currentPage * itemsPerPage >= allItems.length ? 'none' :
            'inline-block';
    }


    document.getElementById('prevBtn').addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            displayItems();
        }
    });

    document.getElementById('nextBtn').addEventListener('click', function() {
        if (currentPage * itemsPerPage < allItems.length) {
            currentPage++;
            displayItems();
        }
    });

    window.onload = function() {
        changeContent('จัดซื้อจัดจ้าง', @json($procurement));
    }
</script>
