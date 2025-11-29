<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Profil Desa - SideS (Sistem Informasi Desa Sukma)')</title>
  <meta name="description" content="SideS - Sistem Informasi Desa Sukma, Gorontalo. Portal resmi desa untuk informasi lengkap dan transparan">
  <meta name="keywords" content="SideS, Sistem Informasi Desa Sukma, Desa Sukma Gorontalo, profil desa, layanan desa">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- News Scrolling CSS -->
  <style>
  .news-scrolling-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    padding: 2rem 0;
  }

  .news-scrolling-wrapper {
    position: relative;
    width: 100%;
  }

  .news-scrolling-track {
    display: flex;
    gap: 1.5rem;
    animation: scroll 30s linear infinite;
    width: fit-content;
  }

  .news-scrolling-track:hover {
    animation-play-state: paused;
  }

  .news-scrolling-item {
    flex: 0 0 auto;
    width: 300px;
  }

  @keyframes scroll {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }
  </style>

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">SideS</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
          <li><a href="/#sambutan-kepala-desa">Profil Desa</a></li>
          <li><a href="{{ route('berita.index') }}">Berita</a></li>
          <li><a href="/#potensi">Potensi</a></li>
          <li><a href="/#layanan">Layanan</a></li>
          <li><a href="/#kontak">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('admin.login') }}">Login Admin</a>

    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="/" class="logo d-flex align-items-center">
            <span class="sitename">SideS</span>
          </a>
          <p>SideS (Sistem Informasi Desa Sukma) adalah platform digital yang menyediakan informasi lengkap dan layanan online untuk kemudahan akses masyarakat Desa Sukma, Gorontalo.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Menu</h4>
          <ul>
            <li><a href="/">Beranda</a></li>
            <li><a href="/#sambutan-kepala-desa">Profil Desa Sukma</a></li>
            <li><a href="{{ route('berita.index') }}">Berita Desa Sukma</a></li>
            <li><a href="/#potensi">Potensi Desa Sukma</a></li>
            <li><a href="/#kontak">Kontak Desa Sukma</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan SideS</h4>
          <ul>
            <li><a href="/#layanan">Surat Keterangan</a></li>
            <li><a href="/#layanan">Kependudukan</a></li>
            <li><a href="/#layanan">Pembayaran Online</a></li>
            <li><a href="/#layanan">Pengaduan</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Desa Sukma</h4>
          <p>Jl. Contoh No. 123</p>
          <p>Desa Sukma, Kecamatan Contoh</p>
          <p>Kabupaten Contoh, Gorontalo</p>
          <p class="mt-4"><strong>Telepon:</strong> <span>(021) 1234567</span></p>
          <p><strong>Email:</strong> <span>info@sides-sukma.desa.id</span></p>
        </div>

      </div>
    </div>


    <div class="container copyright text-center mt-4">
      <p>© <span>{{ date('Y') }}</span> <strong class="px-1 sitename">SideS</strong> <span>Sistem Informasi Desa Sukma, Gorontalo</span></p>
      <div class="credits">
        Dikembangkan dengan ❤️ untuk kemajuan Desa Sukma
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>