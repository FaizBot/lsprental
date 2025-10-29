<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - My Website</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap & Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <!-- Judul Menu -->
                        <li class="sidebar-title">Main Menu</li>

                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                                <i class="bi bi-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.customers') ? 'active' : '' }}">
                            <a href="{{ route('admin.customers') }}" class="sidebar-link">
                                <i class="bi bi-people"></i>
                                <span>Customer</span>
                            </a>
                        </li>
                        
                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.mobil') ? 'active' : '' }}">
                            <a href="{{ route('admin.mobil') }}" class="sidebar-link">
                                <i class="bi bi-house"></i>
                                <span>Mobil</span>
                            </a>
                        </li>

                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.rental', 'admin.rental.show', 'admin.rental.create', 'admin.payment.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.rental') }}" class="sidebar-link">
                                <i class="bi bi-house"></i>
                                <span>Rental</span>
                            </a>
                        </li>

                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.payment', 'admin.payment.show') ? 'active' : '' }}">
                            <a href="{{ route('admin.payment') }}" class="sidebar-link">
                                <i class="bi bi-house"></i>
                                <span>Payment</span>
                            </a>
                        </li>

                        <!-- Menu item -->
                        <li class="sidebar-item {{ request()->routeIs('admin.payment', 'admin.payment.show') ? 'active' : '' }}">
                            <a href="{{ route('admin.payment') }}" class="sidebar-link">
                                <i class="bi bi-house"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

                    </ul>
                    <!-- Tombol Logout di bawah -->
                    <div class="p-3 border-top">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-danger w-100" id="logout-btn">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <!-- End Sidebar -->

        <!-- Main -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <!-- Content -->
            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Content -->
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- JQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- untuk js tambahan -->
    @stack('scripts')

    <!-- Sweetalert -->
    @if(session('success'))
        <script>
            Swal.fire({ title: "Berhasil", text: "{{ session('success') }}", icon: "success" });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({ title: "Gagal!", text: "{{ session('error') }}", icon: "error" });
        </script>
    @endif

    @push('scripts')
    <script>
    document.getElementById('logout-btn').addEventListener('click', function() {
        Swal.fire({
            title: "Yakin ingin logout?",
            text: "Sesi Anda akan berakhir.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, logout",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
    </script>
    @endpush
</body>

</html>
