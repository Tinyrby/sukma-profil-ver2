<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profil Desa - SideS (Sistem Informasi Desa Sukma)</title>
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

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- News Momentum Scrolling CSS -->
  <style>
    :root {
        --primary-color: #5d2f72ff;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --bg-card: #ffffff;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --card-width: 300px;
    }

    .news-section {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        padding: 2rem 15px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding: 0 1rem;
    }

    .news-section .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    .scroll-btn {
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: var(--shadow);
        transition: all 0.2s ease;
        color: var(--text-dark);
        font-size: 1.2rem;
        z-index: 10;
    }

    .scroll-btn:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .scroll-controls {
        display: flex;
        gap: 10px;
    }

    /* --- AREA SCROLL --- */
    .news-scroller {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding: 10px 5px 25px 5px;

        /* Default: Snap aktif agar rapi saat diam */
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;

        scrollbar-width: none;
        -ms-overflow-style: none;
        cursor: grab;

        user-select: none;
        -webkit-user-select: none;

        /* Hardware Acceleration */
        transform: translateZ(0);
        will-change: scroll-position;
    }

    .news-scroller.active {
        cursor: grabbing;
        cursor: -webkit-grabbing;
        /* Matikan semua efek CSS saat interaksi mouse agar JS yang kendalikan penuh */
        scroll-behavior: auto !important;
        scroll-snap-type: none !important;
    }

    .news-scroller::-webkit-scrollbar {
        display: none;
    }

    .news-card {
        flex: 0 0 auto;
        width: var(--card-width);
        background: var(--bg-card);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        scroll-snap-align: start;
        border: 1px solid #e5e7eb;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        -webkit-user-drag: none;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .news-image-wrapper {
        position: relative;
        height: 180px;
        overflow: hidden;
        pointer-events: none;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.05);
    }

    .news-category {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(37, 99, 235, 0.9);
        color: white;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .news-content {
        padding: 1.25rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .news-date {
        font-size: 0.8rem;
        color: var(--text-light);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .news-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 0.75rem 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-excerpt {
        font-size: 0.9rem;
        color: var(--text-light);
        line-height: 1.5;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .read-more {
        margin-top: auto;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    @media (max-width: 640px) {
        :root {
            --card-width: 260px;
        }
        .section-header {
            flex-direction: row;
            align-items: center;
        }
        .section-title {
            font-size: 1.25rem;
        }
        .news-section {
            padding: 0 10px;
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

      <div class="logo">
          <!-- <img src="assets/img/logo.png" alt=""> -->
         <h1 class="sitename">SideS</h1>
      </div>


      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="">Beranda</a></li>
           <li><a href="#berita">Berita</a></li>
           <li><a href="#Statistik">Data & Statistik</a></li>
          <li><a href="#profil-singkat">Profil Desa</a></li>
          <li><a href="#struktur-organisasi">Struktur</a></li>
          <li><a href="#peta-lokasi">Lokasi</a></li>
          <li><a href="">Login</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in" class="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-7 col-lg-9 text-center">
            <h1>Sistem Informasi Desa Sukma</h1>
            <p><strong>SideS</strong> - Kecamatan • Kabupaten • Gorontalo</p>
            <p>Sistem informasi desa yang menyediakan akses mudah dan cepat untuk berbagai layanan desa. Dapatkan informasi lengkap Desa Sukma dalam genggaman Anda.</p>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

       <section id="sambutan-kepala-desa" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sambutan Kepala Desa</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/team/team-1.jpg" class="img-fluid rounded mb-3" alt="Kepala Desa Sukma" style="max-width: 250px;">
            <h4>Nama Kepala Desa Sukma</h4>
            <p class="text-muted">Kepala Desa Sukma</p>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="sambutan-content">
              <p class="lead">Assalamualaikum Warahmatullahi Wabarakatuh,</p>
              <p>Selamat datang di portal resmi Desa Sukma, Gorontalo. Melalui Sistem Informasi Desa Sukma (SideS), kami berkomitmen untuk memberikan pelayanan yang lebih transparan, akuntabel, dan mudah diakses oleh seluruh masyarakat Desa Sukma.</p>
              <p>SideS dirancang khusus untuk memudahkan warga Desa Sukma dalam mendapatkan berbagai informasi penting, mulai dari data kependudukan, berita terkini, potensi desa, hingga berbagai layanan online yang dapat diakses kapan saja dan di mana saja.</p>
              <p>Mari kita bersama-sama membangun Desa Sukma yang lebih maju, transparan, dan sejahtera melalui pemanfaatan teknologi yang tepat guna untuk kemajuan masyarakat Gorontalo.</p>
              <p class="mt-4">
                <strong>Wassalamualaikum Warahmatullahi Wabarakatuh,</strong><br>
                <strong>Nama Kepala Desa Sukma</strong><br>
                Kepala Desa Sukma, Gorontalo
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Sambutan Kepala Desa Section -->

    <!-- Berita dan Pengumuman Section dengan Momentum Scrolling -->
    <section id="berita" class="section light-background">

     <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview 3D News Slider</title>
  
  <!-- 1. Load Bootstrap & Swiper CSS (Hanya untuk Preview) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- 2. CSS Kustom (Ini yang nanti masuk ke main.css kamu) -->
  <style>
    /* Styling Dasar Body untuk Preview */
    body {
      background-color: #f6fafd;
      font-family: "Roboto", sans-serif;
    }

    /* --- MULAI KODE CSS 3D SLIDER --- */
    .section-title {
      text-align: center;
      padding-bottom: 30px;
      margin-top: 50px;
    }
    .section-title h2 {
      font-size: 32px;
      font-weight: 700;
      text-transform: uppercase;
      color: #124265;
    }
    .section-title p {
      color: #444;
    }

    .news-3d-swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    /* Ukuran Slide Desktop */
    .news-3d-swiper .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 320px; 
      height: auto;
    }

    /* Responsif HP */
    @media (max-width: 576px) {
      .news-3d-swiper .swiper-slide {
        width: 280px; 
      }
    }

    .news-card-3d {
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .news-image-wrapper {
      position: relative;
      height: 200px;
      overflow: hidden;
    }

    .news-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    /* Efek Zoom Gambar saat Aktif */
    .swiper-slide-active .news-image {
      transform: scale(1.1);
    }

    .news-category {
      position: absolute;
      top: 15px;
      left: 15px;
      background: #2487ce; /* Warna Aksen */
      color: #fff;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      z-index: 2;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .news-content {
      padding: 25px;
      text-align: center;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .news-date {
      color: #888;
      font-size: 13px;
      margin-bottom: 10px;
    }

    .news-title {
      font-size: 18px;
      font-weight: 700;
      color: #124265;
      margin-bottom: 15px;
      line-height: 1.4;
      /* Membatasi 2 baris */
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .news-excerpt {
      font-size: 14px;
      color: #666;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .read-more-btn {
      margin-top: auto;
      padding: 8px 25px;
      border: 2px solid #2487ce;
      color: #2487ce;
      border-radius: 50px;
      font-weight: 600;
      font-size: 14px;
      transition: 0.3s;
      text-decoration: none;
    }

    .read-more-btn:hover {
      background: #2487ce;
      color: #fff;
    }

    /* Tombol jadi solid saat di slide tengah */
    .swiper-slide-active .read-more-btn {
      background: #2487ce;
      color: #fff;
    }

    /* Styling Titik Navigasi */
    .news-3d-swiper .swiper-pagination-bullet-active {
      background-color: #2487ce;
      width: 20px;
      border-radius: 5px;
      opacity: 1;
    }
  </style>
</head>
<body>

  <!-- Struktur HTML Section -->
  <section id="berita" class="section">
    <div class="container">
      
      <div class="section-title">
        <h2>Berita dan Pengumuman Desa Sukma</h2>
      </div>

      <!-- Swiper Container -->
      <div class="swiper news-3d-swiper">
        <div class="swiper-wrapper" id="news-swiper-wrapper">
          <!-- News slides will be dynamically loaded here from database -->
          @if($berita->count() > 0)
            @foreach($berita as $item)
              <div class="swiper-slide">
                <div class="news-card-3d">
                  <div class="news-image-wrapper">
                    @php
                    $bgColor = '#2487ce';
                    $textColor = '#fff';

                    switch($item->badge_color) {
                        case 'primary':
                            $bgColor = '#2487ce';
                            $textColor = '#fff';
                            break;
                        case 'success':
                            $bgColor = '#198754';
                            $textColor = '#fff';
                            break;
                        case 'warning':
                            $bgColor = '#ffc107';
                            $textColor = '#333';
                            break;
                        case 'danger':
                            $bgColor = '#dc3545';
                            $textColor = '#fff';
                            break;
                        case 'info':
                            $bgColor = '#6f42c1';
                            $textColor = '#fff';
                            break;
                        default:
                            $bgColor = '#6c757d';
                            $textColor = '#fff';
                    }
                  @endphp
                  <span class="news-category" style="background-color: {{ $bgColor }}; color: {{ $textColor }};">
                      {{ ucfirst($item->kategori) }}
                    </span>
                   <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="news-image">
                  </div>
                  <div class="news-content">
                    <div class="news-date">{{ $item->tanggal_formatted }}</div>
                    <h3 class="news-title">{{ $item->judul }}</h3>
                    <p class="news-excerpt">{{ $item->excerpt }}</p>
                    <button onclick="showBeritaModal({{ $item->id }})" class="read-more-btn" data-bs-toggle="modal" data-bs-target="#beritaModal" style="background: none; border: 1px solid #5d2f72ff; padding: 8px 16px; color: #5d2f72ff; text-decoration: none; cursor: pointer; font-family: inherit; font-size: inherit; font-weight: 500; border-radius: 5px; transition: all 0.3s ease; display: inline-flex; align-items: center;" onmouseover="this.style.borderColor='#5d2f72ff'; this.style.backgroundColor='#5d2f72ff'; this.style.color='white'; this.style.boxShadow='0 2px 8px rgba(93, 47, 114, 0.3)';" onmouseout="this.style.borderColor='#5d2f72ff'; this.style.backgroundColor='transparent'; this.style.color='#5d2f72ff'; this.style.boxShadow='none';">
                        Baca Selengkapnya
                    </button>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <!-- Fallback slides if no data in database -->
            <div class="swiper-slide">
              <div class="news-card-3d">
                <div class="news-image-wrapper">
                  <span class="news-category">Pengumuman</span>
                  <img src="https://placehold.co/600x400/2487ce/white?text=Vaksinasi+Booster" alt="Berita 1" class="news-image">
                </div>
               
          @endif
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>

  <!-- 3. JS & Inisialisasi (Ini yang nanti masuk ke main.js kamu) -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      new Swiper('.news-3d-swiper', {
        effect: 'coverflow', // Mode 3D
        grabCursor: true,    // Kursor Tangan
        centeredSlides: true, // Slide Aktif di Tengah
        slidesPerView: 'auto', // Lebar ikut CSS
        loop: true,           // Muter terus
        speed: 600,
        
        // PENGATURAN EFEK 3D
        coverflowEffect: {
          rotate: 0,        // Rotasi kartu samping (0 biar tegak)
          stretch: 0,       // Jarak tarik
          depth: 150,       // Kedalaman (Makin besar makin mundur kartu sampingnya)
          modifier: 2,      // Pengali kekuatan efek
          slideShadows: false, // Bayangan di kartu samping
        },
        
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true, // Titik berubah ukuran sesuai posisi
        },
        
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        }
      });
    });
  </script>

</body>
</html>
    </section><!-- /Berita Section -->

    <!-- Statistics Section -->
     <section id="Statistik" class="section light-background">
      <div class="container">
        @php
          // Ambil data statistik dari database
          $totalPenduduk = \App\Models\Penduduk::count();
          $totalKK = \App\Models\Kk::count();

          // Data per dusun (query yang benar)
          $dusun1 = \App\Models\Penduduk::whereHas('dusun', function($query) {
              $query->where('nama_dusun', 'like', '%Dusun 1%');
          })->count();

          $dusun2 = \App\Models\Penduduk::whereHas('dusun', function($query) {
              $query->where('nama_dusun', 'like', '%Dusun 2%');
          })->count();

          $dusun3 = \App\Models\Penduduk::whereHas('dusun', function($query) {
              $query->where('nama_dusun', 'like', '%Dusun 3%');
          })->count();
        @endphp
      
        <div class="container section-title" data-aos="fade-up">
        <h2>Statistik Penduduk Desa Sukma</h2>
        </div><!-- End Section Title -->

        <div class="row gy-4 text-center">

          <!-- Total Penduduk -->
          <div class="col-md-6 col-lg-3">
            <div class="stats-item">
              <div class="stats-icon text-primary">
                <i class="fas fa-users"></i>
              </div>
              <h3 class="stats-number">{{ number_format($totalPenduduk) }}</h3>
              <p class="stats-label">Total Penduduk</p>
            </div>
          </div>

          <!-- Kepala Keluarga -->
          <div class="col-md-6 col-lg-3">
            <div class="stats-item">
              <div class="stats-icon text-success">
                <i class="fas fa-home"></i>
              </div>
              <h3 class="stats-number">{{ number_format($totalKK) }}</h3>
              <p class="stats-label">Kepala Keluarga</p>
            </div>
          </div>

          <!-- Dusun 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="stats-item">
              <div class="stats-icon text-warning">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <h3 class="stats-number">{{ number_format($dusun1) }}</h3>
              <p class="stats-label">Warga Dusun 1</p>
            </div>
          </div>

          <!-- Dusun 2 -->
          <div class="col-md-6 col-lg-3">
            <div class="stats-item">
              <div class="stats-icon text-info">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <h3 class="stats-number">{{ number_format($dusun2) }}</h3>
              <p class="stats-label">Warga Dusun 2</p>
            </div>
          </div>

        </div>

        

        <!-- Charts Section -->
       
    </section><!-- /Hero Section -->

    <!-- Sambutan Kepala Desa Section -->
 

    <!-- Profil Singkat Desa Section -->
    <section id="profil-singkat" class="about section">

      <!-- Section Title -->
      <div class="container section-title text-center" data-aos="fade-up">
  <h2>Profil Singkat Desa</h2>
</div><!-- End Section Title -->

<div class="container d-flex flex-column align-items-center">
  
  <div class="profile-card" data-aos="fade-up" data-aos-delay="100">
    <h4>Lokasi Desa Sukma</h4>
    <p><strong>Kecamatan:</strong> [Nama Kecamatan di Gorontalo]</p>
    <p><strong>Kabupaten:</strong> [Nama Kabupaten di Gorontalo]</p>
    <p><strong>Provinsi:</strong> Gorontalo</p>
  </div>

  <div class="profile-card" data-aos="fade-up" data-aos-delay="150">
    <h4>Data Geografis Desa Sukma</h4>
    <p><strong>Luas Wilayah:</strong> [XX] km²</p>
    <p><strong>Jumlah Penduduk:</strong> [XXXX] jiwa</p>
    <p><strong>Jumlah Dusun:</strong> [X] dusun</p>
    <p><strong>Jumlah RT:</strong> [XX] RT</p>
    <p><strong>Jumlah RW:</strong> [XX] RW</p>
  </div>

  <div class="profile-card" data-aos="fade-up" data-aos-delay="200">
    <h4>Visi Desa Sukma</h4>
    <p>"Terwujudnya Desa Sukma yang maju, mandiri, dan sejahtera berbasis teknologi informasi SideS"</p>
  </div>

  <div class="profile-card" data-aos="fade-up" data-aos-delay="250">
    <h4>Misi Desa Sukma</h4>
    <ul>
      <li>Menyediakan pelayanan publik Desa Sukma yang transparan dan akuntabel melalui SideS</li>
      <li>Meningkatkan kualitas sumber daya manusia Desa Sukma melalui pendidikan</li>
      <li>Mengembangkan potensi ekonomi lokal dan UMKM Desa Sukma</li>
      <li>Melestarikan budaya dan tradisi lokal Gorontalo di Desa Sukma</li>
      <li>Membangun infrastruktur Desa Sukma yang mendukung kesejahteraan masyarakat</li>
    </ul>
    
  </div>

</div>

    <!-- Struktur Organisasi Section -->
    <section id="struktur-organisasi" class="about section">

      <!-- Section Title -->
      <div class="container section-title text-center" data-aos="fade-up">
        <h2>Struktur Organisasi Desa Sukma</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        @php
          // Ambil data struktur organisasi dari database
          $strukturOrganisasi = \App\Models\StrukturOrganisasi::where('is_active', true)
              ->orderBy('urutan', 'asc')
              ->get();
        @endphp

        @if($strukturOrganisasi->count() > 0)
          <div class="row g-4 justify-content-center">
            @foreach($strukturOrganisasi as $struktur)
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="struktur-card text-center">
                <!-- Foto -->
                <div class="struktur-foto mb-3">
                  <img src="{{ $struktur->foto_url ?: asset('assets/img/team/default-user.png') }}"
                       alt="{{ $struktur->nama_lengkap }}"
                       class="img-fluid struktur-foto-img">
                </div>

                <!-- Informasi -->
                <div class="struktur-info">
                  <h5 class="struktur-nama">{{ $struktur->nama_lengkap }}</h5>
                  <p class="struktur-jabatan">{{ $struktur->jabatan }}</p>

                  @if($struktur->nip)
                  <p class="struktur-nip">
                    <small class="text-muted">NIP: {{ $struktur->nip }}</small>
                  </p>
                  @endif

                  <div class="struktur-status mt-2">
                    <span class="badge {{ $struktur->is_active ? 'bg-success' : 'bg-secondary' }} rounded-pill">
                      <i class="fas fa-circle me-1" style="font-size: 8px;"></i>
                      {{ $struktur->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        @else
          <div class="text-center py-5">
            <div class="struktur-empty-state">
              <i class="fas fa-users fa-4x text-muted mb-3"></i>
              <h5 class="text-muted">Belum Ada Data Struktur Organisasi</h5>
              <p class="text-muted">Data struktur organisasi desa akan segera ditampilkan</p>
            </div>
          </div>
        @endif
      </div>

    </section><!-- /Struktur Organisasi Section -->

<style>
  .profile-card {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2); /* ← shadow lebih tebal */
    padding: 25px;
    margin: 20px 0;
    width: 80%;
    max-width: 800px;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  /* Efek sedikit terangkat saat dihover */
  .profile-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
  }

  /* Struktur Organisasi Card Styling */
  .struktur-card {
    background: #ffffff;
    border-radius: 15px;
    padding: 25px 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .struktur-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    border-color: #007bff;
  }

  .struktur-foto {
    position: relative;
    width: 140px;
    height: 140px;
    margin-bottom: 15px;
  }

  .struktur-foto-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 25px;
    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    transition: all 0.3s ease;
  }

  .struktur-card:hover .struktur-foto-img {
    border-color: #0056b3;
    transform: scale(1.05);
  }

  .struktur-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .struktur-nama {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.3;
    min-height: 2.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .struktur-jabatan {
    font-size: 0.95rem;
    font-weight: 500;
    color: #007bff;
    margin-bottom: 5px;
    line-height: 1.4;
    min-height: 2.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .struktur-nip {
    font-size: 0.85rem;
    margin-bottom: 10px;
    line-height: 1.3;
  }

  .struktur-status {
    margin-top: auto;
  }

  .struktur-status .badge {
    font-size: 0.75rem;
    padding: 5px 12px;
    font-weight: 500;
  }

  /* Empty State Styling */
  .struktur-empty-state {
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 15px;
    border: 2px dashed #dee2e6;
  }

  .struktur-empty-state i {
    color: #6c757d;
    opacity: 0.5;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .struktur-foto {
      width: 120px;
      height: 120px;
    }

    .struktur-nama {
      font-size: 1rem;
      min-height: 2.4rem;
    }

    .struktur-jabatan {
      font-size: 0.9rem;
      min-height: 2.5rem;
    }
  }

  @media (max-width: 576px) {
    .struktur-card {
      padding: 20px 15px;
    }

    .struktur-foto {
      width: 100px;
      height: 100px;
    }

    .struktur-nama {
      font-size: 0.95rem;
      min-height: 2.2rem;
    }

    .struktur-jabatan {
      font-size: 0.85rem;
      min-height: 2.3rem;
    }
  }

  .profile-card h4 {
    color: #003366;
    font-weight: 600;
    margin-bottom: 10px;
    border-bottom: 2px solid #007bff33;
    display: inline-block;
    padding-bottom: 5px;
  }

  .profile-card ul {
    margin-left: 20px;
  }

  .profile-card p, 
  .profile-card li {
    color: #333;
    line-height: 1.6;
  }

  .read-more {
    display: inline-flex;
    align-items: center;
    background: #87569e;
    color: white;
    padding: 8px 16px;
    border-radius: 10px;
    text-decoration: none;
    transition: background 0.3s;
  }

  .read-more:hover {
    background: #4b016dff;
  }

  .read-more i {
    margin-left: 8px;
  }

  /* Stats Styling */
  .stats-item {
    background: #fff;
    border-radius: 15px;
    padding: 30px 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    height: 100%;
  }

  .stats-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
  }

  .stats-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 28px;
    color: #fff;
  }

  .stats-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
  }

  .stats-label {
    font-size: 1rem;
    color: #666;
    margin: 0;
    font-weight: 500;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .stats-number {
      font-size: 2rem;
    }

    .stats-icon {
      width: 60px;
      height: 60px;
      font-size: 24px;
    }
  }
</style>

    </section><!-- /Profil Singkat Desa Section -->

    
    

      
      

        </div>


    </section><!-- /Data dan Statistik Desa Section -->

    
   
     

    <!-- Peta Lokasi Section -->
    <section id="peta-lokasi" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Peta Lokasi Desa Sukma</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
        <div class="mb-4">
          <iframe
            style="border:0; width: 100%; height: 400px;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.6467902513978!2d123.0912561!3d0.5312914!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327ed5b015442eb3%3A0x77805afaa93920a0!2sDesa%20sukma!5e0!3m2!1sid!2sid!4v1763619529473!5m2!1sid!2sid"
            frameborder="0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

        <div class="row text-center">
          <div class="col-md-4">
            <div class="info-box">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat Desa Sukma</h3>
              <p>Jl. Contoh No. 123<br>Desa Sukma, Kecamatan Contoh<br>Kabupaten Contoh, Gorontalo</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-box">
              <i class="bi bi-telephone"></i>
              <h3>Kontak Darurat</h3>
              <p>Kantor Desa Sukma: (021) 1234567<br>Polsek Terdekat: (021) 7654321<br>Puskesmas Terdekat: (021) 1122334</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info-box">
              <i class="bi bi-clock"></i>
              <h3>Jam Operasional</h3>
              <p>Senin - Jumat: 08:00 - 15:00<br>Sabtu: 08:00 - 12:00<br>Minggu & Hari Libur: Tutup</p>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Peta Lokasi Section -->
         

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
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
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#sambutan-kepala-desa">Profil Desa Sukma</a></li>
            <li><a href="#berita">Berita Desa Sukma</a></li>
            <li><a href="#potensi">Potensi Desa Sukma</a></li>
            <li><a href="#kontak">Kontak Desa Sukma</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan SideS</h4>
          <ul>
            <li><a href="#layanan">Surat Keterangan</a></li>
            <li><a href="#layanan">Kependudukan</a></li>
            <li><a href="#layanan">Pembayaran Online</a></li>
            <li><a href="#layanan">Pengaduan</a></li>
            <li><a href="#data-statistik">Data Statistik</a></li>
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
      <p>© <span>2024</span> <strong class="px-1 sitename">SideS</strong> <span>Sistem Informasi Desa Sukma, Gorontalo</span></p>
      <div class="credits">
        Dikembangkan dengan ❤️ untuk kemajuan Desa Sukma
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Modal Login Admin -->
  <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login Admin SideS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Masukkan username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Ingat saya</label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <div class="text-center mt-3">
              <small>Lupa password? <a href="#">Reset password</a></small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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


    <!-- News Momentum Scrolling JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('newsContainer');
        if (!slider) return;

        let isDown = false;
        let startX;
        let scrollLeft;
        let isDragging = false;

        // Fisika Momentum
        let velX = 0;
        let momentumID;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            isDragging = false;
            slider.classList.add('active');

            // Stop momentum lama jika user klik lagi
            cancelAnimationFrame(momentumID);

            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;

            // Reset velocity
            velX = 0;
        });

        slider.addEventListener('mouseleave', () => {
            // Jika mouse keluar area saat dragging, anggap seperti dilepas
            if(isDown) {
                isDown = false;
                beginMomentumTracking();
            }
            slider.classList.remove('active');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');

            // Simple approach: langsung kembalikan CSS snap untuk consistency
            setTimeout(() => {
                slider.style.scrollSnapType = '';
                slider.style.scrollBehavior = '';
            }, 100);
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();

            const x = e.pageX - slider.offsetLeft;
            // Sensitivity 2x agar gerakan lebih ringan
            const walk = (x - startX) * 2;

            const prevScrollLeft = slider.scrollLeft;
            slider.scrollLeft = scrollLeft - walk;

            // Hitung kecepatan lemparan berdasarkan selisih posisi
            velX = slider.scrollLeft - prevScrollLeft;

            if(Math.abs(walk) > 5) isDragging = true;
        });

        function beginMomentumTracking() {
            cancelAnimationFrame(momentumID);

            function momentumLoop() {
                // Friction 0.98 (lebih licin agar momentum lebih tahan lama)
                slider.scrollLeft += velX;
                velX *= 0.98;

                // Lanjutkan animasi jika kecepatan masih signifikan
                if (Math.abs(velX) > 0.1) {
                    momentumID = requestAnimationFrame(momentumLoop);
                } else {
                    // Jika sudah berhenti meluncur, kembalikan fitur SNAP dengan delay
                    // agar smooth dan tidak konflik dengan CSS
                    setTimeout(function() {
                        // Hapus inline style agar kembali mengikuti CSS (x mandatory)
                        slider.style.scrollSnapType = '';
                        slider.style.scrollBehavior = '';
                    }, 50);
                }
            }
            momentumLoop();
        }

        // Prevent Link Click saat dragging
        window.preventClickDuringDrag = function(e) {
            if (isDragging) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            return true;
        };

        // Navigasi Tombol
        const scrollLeftBtn = document.getElementById('scrollLeft');
        const scrollRightBtn = document.getElementById('scrollRight');

        if (scrollLeftBtn) {
            scrollLeftBtn.addEventListener('click', () => {
                slider.scrollBy({ left: -320, behavior: 'smooth' });
            });
        }

        if (scrollRightBtn) {
            scrollRightBtn.addEventListener('click', () => {
                slider.scrollBy({ left: 320, behavior: 'smooth' });
            });
        }

        // Touch events untuk mobile
        slider.addEventListener('touchstart', (e) => {
            isDown = true;
            isDragging = false;
            startX = e.touches[0].pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
            velX = 0;
            cancelAnimationFrame(momentumID);
        });

        slider.addEventListener('touchmove', (e) => {
            if (!isDown) return;
            const x = e.touches[0].pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            const prevScrollLeft = slider.scrollLeft;
            slider.scrollLeft = scrollLeft - walk;
            velX = slider.scrollLeft - prevScrollLeft;
            if(Math.abs(walk) > 5) isDragging = true;
        });

        slider.addEventListener('touchend', () => {
            isDown = false;
            isDragging = false;

            // Simple approach: langsung kembalikan CSS snap
            setTimeout(() => {
                slider.style.scrollSnapType = '';
                slider.style.scrollBehavior = '';
            }, 100);
        });
    });
    </script>

<!-- Modal Detail Berita -->
<div class="modal fade" id="beritaModal" tabindex="-1" aria-labelledby="beritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="beritaModalLabel">Detail Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="beritaModalLoading" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Memuat detail berita...</p>
                </div>
                <div id="beritaModalContent" style="display: none;">
                    <img id="modalGambar" src="" class="img-fluid rounded mb-3" alt="" style="max-height: 400px; width: 100%; object-fit: cover;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span id="modalKategori" class="badge"></span>
                        <small id="modalTanggal" class="text-muted"></small>
                    </div>
                    <h4 id="modalJudul" class="mb-3"></h4>
                    <div id="modalKonten"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function showBeritaModal(beritaId) {
    // Reset modal content
    document.getElementById('beritaModalLoading').style.display = 'block';
    document.getElementById('beritaModalContent').style.display = 'none';

    // Fetch berita detail via AJAX
    fetch(`/api/berita/${beritaId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide loading
                document.getElementById('beritaModalLoading').style.display = 'none';

                // Set data ke modal
                document.getElementById('modalGambar').src = data.data.gambar;
                document.getElementById('modalGambar').alt = data.data.judul;
                document.getElementById('modalKategori').textContent = data.data.kategori.charAt(0).toUpperCase() + data.data.kategori.slice(1);
                document.getElementById('modalKategori').className = `badge bg-${data.data.badge_color}`;
                document.getElementById('modalTanggal').innerHTML = `<i class="bi bi-calendar"></i> ${data.data.tanggal}`;
                document.getElementById('modalJudul').textContent = data.data.judul;
                document.getElementById('modalKonten').innerHTML = data.data.konten.replace(/\n/g, '<br>');

                // Show content
                document.getElementById('beritaModalContent').style.display = 'block';
            } else {
                // Handle error
                document.getElementById('beritaModalLoading').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                        Gagal memuat detail berita. Silakan coba lagi.
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('beritaModalLoading').innerHTML = `
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i>
                    Terjadi kesalahan. Silakan coba lagi.
                </div>
            `;
        });
}

// Reset modal when closed
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('beritaModal');
    modal.addEventListener('hidden.bs.modal', function () {
        document.getElementById('beritaModalLoading').style.display = 'block';
        document.getElementById('beritaModalContent').style.display = 'none';
    });
});
</script>

</body>

</html>