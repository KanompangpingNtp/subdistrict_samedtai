<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />
    <title>@yield('title') | Dashboard </title>
    <link rel="icon" type="image/png" href="{{ asset('navbar/logo.png') }}">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- font-awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

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
        <a class="navbar-brand ps-3" href="#"> <i class="fa-solid fa-database me-3"></i>EService Admin</a>
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
                    <li style="font-size: 14px;">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                ออกจากระบบ <i class="fa-solid fa-right-from-bracket ms-5"></i>
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
                    <div class="nav mb-5">
                        <div class="sb-sidenav-menu-heading" style="font-size: 10px;">สำนักปลัดเทศบาล</div>
                        <a class="nav-link" href="{{route('GeneralRequestsAdminShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            คำร้องทั่วไป
                        </a>
                        <a class="nav-link" href="{{route('ElderlyAllowanceAdminShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            แบบยืนยันเบี้ยยังชีพผู้สูงอายุ
                        </a>
                        <a class="nav-link" href="{{route('DisabilityAdminShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            แบบคำขอลงทะเบียนรับเงินเบี้ยความพิการ
                        </a>
                        <a class="nav-link" href="{{route('TableReceiveAssistanceAdminPages')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            แบบคำขอรับการสงเคราะห์
                        </a>
                        <a class="nav-link" href="{{route('HealthHazardApplicationAdminShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            แบบคำร้องใบอนุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ
                        </a>
                        <a class="nav-link" href="{{route('FoodStorageLicenseShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            คำร้องขอแจ้งจำหน่ายหรือสะสมอาหาร
                        </a>
                        <a class="nav-link" href="{{route('TableCertificationAdminPages')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            คำขอรับรองสิ่งปลูกสร้างอาคาร
                        </a>
                        <a class="nav-link" href="{{route('TableTradeRegistryAdminPages')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            คำร้องทะเบียนพาณิชย์
                        </a>
                        <a class="nav-link" href="{{route('TrashBinRequestAdminShowData')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            แบบแสดงจำนงขอใช้บริการจัดเก็บขยะมูลฝอย
                        </a>
                        <a class="nav-link" href="{{route('TableBuildingChangeAdminPages')}}">
                            <div class="sb-nav-link-icon"><i class="bi bi-clipboard"></i></div>
                            คำขออนุญาตก่อสร้างอาคารดัดแปลงอาคารหรือรื้อถอนอาคาร
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4 mb-4">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; บริษัท So Smart Solution สงวนสิทธิ์ 2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('dashboard/js/scripts.js')}}"></script>
</body>
</html>
