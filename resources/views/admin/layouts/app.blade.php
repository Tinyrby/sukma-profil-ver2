<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - SideS')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar bg-dark text-white">
        <div class="sidebar-header p-3">
            <h4><i class="fas fa-city"></i> SideS Admin</h4>
            <small>Sistem Informasi Desa Sukma</small>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                   href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
                    <span>Data Master</span>
                </h6>
            </li>

            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.penduduk*') ? 'active' : '' }}"
                   href="{{ route('admin.penduduk.index') }}">
                    <i class="fas fa-users"></i> Data Penduduk
                </a>
            </li>

            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.kk*') ? 'active' : '' }}"
                   href="{{ route('admin.kk.index') }}">
                    <i class="fas fa-id-card"></i> Kartu Keluarga
                </a>
            </li>

            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.dusun*') ? 'active' : '' }}"
                   href="{{ route('admin.dusun.index') }}">
                    <i class="fas fa-map-marked-alt"></i> Data Dusun
                </a>
            </li>

            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.berita*') ? 'active' : '' }}"
                   href="{{ route('berita.admin.index') }}">
                    <i class="fas fa-newspaper"></i> Manajemen Berita
                </a>
            </li>

            <li class="nav-item">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
                    <span>Transaksi & Mutasi</span>
                </h6>
            </li>

            <li class="nav-item mb-1">
                <a class="nav-link text-white {{ request()->routeIs('admin.mutasi*') ? 'active' : '' }}"
                   href="{{ route('admin.mutasi.index') }}">
                    <i class="fas fa-exchange-alt"></i> Mutasi Penduduk
                </a>
            </li>

            <li class="nav-item mt-auto mb-1">
                <a class="nav-link text-danger" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <div class="container-fluid">
                <h5 class="mb-0 text-gray-800">@yield('page-title', 'Dashboard')</h5>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                            <i class="fas fa-user-circle fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link {
            padding: 14px 24px;
            border-radius: 8px;
            margin: 2px 12px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .sidebar-heading {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .main-content {
            margin-left: 250px;
            padding-top: 0;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>