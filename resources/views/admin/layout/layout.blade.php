<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GM GKY Admin</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body {
            font-size: 13px;
            font-family: 'Bai Jamjuree', sans-serif;
        }

    </style>

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: '{{ $message }}'
        , })

    </script>
    @endif
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">Admin Dashbord</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" title="Toggle sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> --}}
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                ออกจากระบบ<i class="bi bi-door-closed-fill ms-3"></i>
                            </button>
                        </form>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MENU</div>
                        <a class="nav-link" href="{{route('AdminWebIntro')}}">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-database-add"></i>
                            </div>
                            จัดการอินโทรเว็บไซต์
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            จัดการเมนูพื้นฐาน
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('HistoryAdmin')}}">ประวัติความเป็นมา</a>
                                <a class="nav-link" href="{{route('GeneralInformationAdmin')}}">ข้อมูลสภาพทั่วไป</a>
                                <a class="nav-link" href="#">ข้อมูลชุมชน</a>
                                <a class="nav-link" href="{{route('CommunityProductsAdmin')}}">ผลิตภัณฑ์ชุมชน</a>
                                <a class="nav-link" href="{{route('ImportantPlacesAdmin')}}">สถานที่สำคัญ</a>
                                <a class="nav-link" href="{{route('LandscapeGalleryAdmin')}}">แกลอรี่ภาพถ่ายภูมิทัศน์</a>
                                {{-- <a class="nav-link" href="#">บริการขั้นพื้นฐาน</a> --}}
                                {{-- <a class="nav-link" href="#">ยุทธศาสตร์การพัฒนา</a> --}}
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            จัดการแถบเมนูหลัก
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ManagePersonnel')}}">บุคลากร</a>
                                <a class="nav-link" href="{{route('PerformanceResultsType')}}">ผลการดำเนินงาน</a>
                                <a class="nav-link" href="{{route('AuthorityType')}}">อำนาจหน้าที่</a>
                                <a class="nav-link" href="{{route('OperationalPlanType')}}">แผนงานพัฒนาท้องถิ่น</a>
                                <a class="nav-link" href="{{route('LawsAndRegulationsType')}}">กฏหมายและกฏระเบียบ</a>
                                <a class="nav-link" href="{{route('MenuForPublicType')}}">จัดการเมนูสำหรับประชาชน</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{route('PressReleaseHome')}}">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            ข่าวประชาสัมพันธ์
                        </a>
                        <a class="nav-link" href="{{route('ActivityHome')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            กิจกรรม
                        </a>
                        {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}

                        <a class="nav-link" href="{{route('CheckinSpotHome')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            จุดเช็คอินกินเที่ยว
                        </a>
                        <a class="nav-link" href="{{route('NoticeBoardHome')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            ป้ายประกาศ
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            การจัดการประกาศ
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('ProcurementHome')}}">ประกาศจัดซื้อจัดจ้าง</a>
                                <a class="nav-link" href="{{route('ProcurementResultsHome')}}">ผลจัดซื้อจัดจ้าง</a>
                                <a class="nav-link" href="{{route('AveragePriceHome')}}">ประกาศราคากลาง</a>
                                <a class="nav-link" href="{{route('RevenueHome')}}">งานเก็บรายได้</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{route('AdminITAType')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            จัดการการประเมินคุณธรรม(ITA)
                        </a>
                        <a class="nav-link" href="{{route('ForumAdminPages')}}">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            ข้อมูลกระดานกระทู้
                        </a>
                        <a class="nav-link" href="{{route('AdminQuestions')}}">
                            <div class="sb-nav-link-icon">
                                <i class="bi bi-clipboard"></i>
                            </div>
                            แบบสอบถามความพึงพอใจ
                        </a>
                    </div>
                </div>
                {{-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as : {{ Auth::user()->name }}
        </div>
    </div> --}}
    </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                @yield('pages_content')<br>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; บริษัท GM SKY สงวนสิทธิ์ 2024</div>
                    {{-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> --}}
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
