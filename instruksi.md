# Cara Mengedit Jarak Teks "BERITA DAN PENGUMUMAN DESA"

## Lokasi File
File yang perlu diedit: `resources/views/index.blade.php`

## Struktur Section Berita
Section berita terletak sekitar line 88-142 dengan struktur:
```html
<!-- Berita dan Pengumuman Section dengan Side-Scrolling -->
<section id="berita" class="testimonials section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Berita dan Pengumuman Desa Sukma</h2>
    <p>Informasi terkini seputar Desa Sukma, Gorontalo</p>
  </div>

  <!-- Isi berita scrolling -->
  <div class="news-scrolling-container">
    ...
  </div>
</section>
```

## Cara Mengedit Jarak

### 1. Mengedit Jarak Atas (Margin Top)
Untuk menambah jarak antara section berita dengan elemen di atasnya, edit CSS di bagian `.news-scrolling-container`:

```css
.news-scrolling-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding: 2rem 0;  /* Tambah nilai ini untuk jarak atas & bawah */
  background: #f8f9fa;
  border-radius: 15px;
  margin-bottom: 2rem;
  margin-top: 2rem;  /* Tambahkan ini untuk jarak atas khusus */
}
```

### 2. Mengedit Jarak Section Title
Untuk mengedit jarak antara judul section dengan konten berita:

```css
.section-title {
  margin-bottom: 3rem;  /* Tambah nilai untuk jarak bawah yang lebih besar */
  margin-top: 2rem;    /* Tambah nilai untuk jarak atas */
}
```

### 3. Opsi Lengkap Pengaturan Jarak

Tambahkan CSS ini di dalam style tag di `index.blade.php`:

```css
/* Opsi 1: Mengedit jarak section berita secara keseluruhan */
#berita {
  padding-top: 4rem;    /* Jarak atas dari elemen sebelumnya */
  padding-bottom: 2rem; /* Jarak bawah ke elemen berikutnya */
}

/* Opsi 2: Mengedit jarak container judul */
#berita .section-title {
  margin-top: 3rem;     /* Jarak judul ke atas */
  margin-bottom: 2.5rem; /* Jarak judul ke konten */
}

/* Opsi 3: Mengedit jarak container scrolling */
.news-scrolling-container {
  margin-top: 2rem;     /* Jarak container ke judul */
  margin-bottom: 2rem;  /* Jarak container ke bawah */
}
```

## Cara Implementasi

1. **Buka file** `resources/views/index.blade.php`
2. **Cari CSS style** untuk `.news-scrolling-container` (sekitar line 32-40)
3. **Tambah atau edit** nilai `margin-top` dan/atau `margin-bottom`
4. **Save file** dan refresh browser untuk melihat perubahan

## Contoh Implementasi

Untuk menambah jarak yang lebih besar antara hero section dan berita:

```css
.news-scrolling-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding: 2rem 0;
  background: #f8f9fa;
  border-radius: 15px;
  margin: 4rem 0 2rem 0;  /* Atas 4rem, Kanan 0, Bawah 2rem, Kiri 0 */
}
```

## Tips Tambahan

- **1rem = 16px** (ukuran standar browser)
- Gunakan **rem** untuk responsive design yang lebih baik
- Test di berbagai ukuran layar untuk memastikan tampilan tetap baik
- Jika terlalu jauh, kurangi nilai marginnya

## Preview Perubahan

Setelah mengedit CSS:
- **Save file** `index.blade.php`
- **Refresh browser** di `http://localhost:8000`
- Scroll ke bagian berita untuk melihat perubahan jarak

Jika ingin jarak yang lebih dekat, kurangi nilai margin. Jika ingin lebih jauh, tambah nilai margin.

---

# Cara Mengganti Warna UI Halaman Profil Menjadi Kuning

## Lokasi File
File yang perlu diedit: `resources/views/index.blade.php`

## Struktur Warna Saat Ini
Warna UI halaman profil menggunakan tema biru/hijau dengan beberapa komponen utama:
- Hero section (bagian atas)
- Navigation bar
- Buttons dan links
- Background sections
- Card components

## Cara Mengganti Warna Menjadi Kuning

### 1. Tema Warna Kuning Utama
Gunakan kode warna kuning berikut:
- **Kuning Utama**: `#FFD700` (Gold)
- **Kuning Terang**: `#FFEB3B` (Light Yellow)
- **Kuning Gelap**: `#F57F17` (Dark Yellow)
- **Kuning Pastel**: `#FFF9C4` (Light Pastel)
- **Kuning Oranye**: `#FFC107` (Amber)

### 2. Edit CSS di dalam `<style>` tag

Tambahkan CSS berikut di dalam file `index.blade.php` (cari tag `<style>` di bagian bawah file):

```css
/* Override warna utama menjadi tema kuning */
:root {
  --main-color: #FFD700;        /* Kuning utama */
  --secondary-color: #F57F17;   /* Kuning gelap */
  --accent-color: #FFC107;      /* Kuning oranye */
  --light-color: #FFF9C4;       /* Kuning pastel */
  --text-color: #333333;        /* Teks gelap */
  --text-light: #666666;        /* Teks sedang */
}

/* Hero Section Background */
.hero {
  background: linear-gradient(135deg, #FFD700 0%, #F57F17 100%) !important;
}

/* Navigation Bar */
.navbar {
  background-color: #FFD700 !important;
  border-bottom: 2px solid #F57F17 !important;
}

.navbar-brand,
.navbar-nav .nav-link {
  color: #333333 !important;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link.active {
  color: #F57F17 !important;
  background-color: rgba(255, 255, 255, 0.1) !important;
}

/* Buttons */
.btn-primary {
  background-color: #FFC107 !important;
  border-color: #FFC107 !important;
  color: #333333 !important;
}

.btn-primary:hover {
  background-color: #F57F17 !important;
  border-color: #F57F17 !important;
  color: #ffffff !important;
}

.btn-outline-primary {
  border-color: #FFC107 !important;
  color: #FFC107 !important;
}

.btn-outline-primary:hover {
  background-color: #FFC107 !important;
  color: #333333 !important;
}

/* Section Titles */
.section-title h2 {
  color: #F57F17 !important;
  border-bottom: 2px solid #FFD700 !important;
}

/* Cards */
.card {
  border: 1px solid #FFC107 !important;
  box-shadow: 0 4px 6px rgba(255, 193, 7, 0.1) !important;
}

.card-header {
  background-color: #FFC107 !important;
  border-bottom: 1px solid #FFD700 !important;
  color: #333333 !important;
}

/* Statistics Cards */
.stats-item {
  background: linear-gradient(145deg, #FFF9C4, #FFEB3B) !important;
  border: 1px solid #FFC107 !important;
}

.stats-number {
  color: #F57F17 !important;
}

/* News Scrolling Container */
.news-scrolling-container {
  background: #FFF9C4 !important;
  border: 1px solid #FFC107 !important;
}

/* News Cards */
.news-item {
  background: #ffffff !important;
  border: 1px solid #FFC107 !important;
  box-shadow: 0 2px 4px rgba(255, 193, 7, 0.2) !important;
}

.news-item:hover {
  border-color: #F57F17 !important;
  box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3) !important;
}

/* Links */
a {
  color: #F57F17 !important;
}

a:hover {
  color: #FFC107 !important;
}

/* Footer */
.footer {
  background-color: #F57F17 !important;
  color: #ffffff !important;
}

/* Active States */
.active {
  color: #FFD700 !important;
}

/* Form Elements */
.form-control:focus {
  border-color: #FFC107 !important;
  box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25) !important;
}

/* Alert Messages */
.alert-primary {
  background-color: #FFF9C4 !important;
  border-color: #FFC107 !important;
  color: #333333 !important;
}
```

### 3. Opsi Tema Kuning Lainnya

#### Tema Kuning Emas (Luxury)
```css
.hero {
  background: linear-gradient(135deg, #FFD700, #B8860B) !important;
}

.btn-primary {
  background-color: #B8860B !important;
  border-color: #B8860B !important;
}
```

#### Tema Kuning Lemon (Segar)
```css
.hero {
  background: linear-gradient(135deg, #FFF59D, #FFEB3B) !important;
}

.btn-primary {
  background-color: #FFEB3B !important;
  border-color: #FFEB3B !important;
  color: #333333 !important;
}
```

#### Tema Kuning Mustard (Retro)
```css
.hero {
  background: linear-gradient(135deg, #FFD54F, #E65100) !important;
}

.btn-primary {
  background-color: #E65100 !important;
  border-color: #E65100 !important;
}
```

### 4. Cara Implementasi

1. **Buka file** `resources/views/index.blade.php`
2. **Scroll ke bagian bawah** dan cari tag `<style>`
3. **Copy dan paste** CSS tema kuning yang diinginkan
4. **Save file** dengan Ctrl+S
5. **Refresh browser** di `http://localhost:8000` untuk melihat perubahan

### 5. Kustomisasi Tambahan

#### Mengubah Logo/Icon
Jika ingin mengubah warna logo atau icon:
```css
.logo img {
  filter: hue-rotate(45deg) saturate(2) !important;
}
```

#### Mengubah Gambar Background
Jika ingin menambah pattern/background:
```css
.hero {
  background: linear-gradient(135deg, #FFD700 0%, #F57F17 100%),
              url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><g fill-opacity="0.1"><path d="m0 40l40-40h-40zM40 0v40l-40-40z" fill="%23ffffff"/></g></svg>') !important;
}
```

### 6. Tips Tambahan

- **Test responsif**: Pastikan tampilan baik di desktop, tablet, dan mobile
- **Kontras warna**: Gunakan warna teks yang kontras dengan background kuning
- **Konsistensi**: Gunakan variasi warna kuning yang konsisten di seluruh halaman
- **Aksesibilitas**: Pastikan kontras warna memenuhi standar aksesibilitas (WCAG)

### 7. Preview dan Debugging

Setelah mengedit CSS:
- **Buka Developer Tools** (F12) untuk inspect elemen
- **Cek tab Elements** untuk melihat CSS yang terapplied
- **Test responsive** dengan Chrome DevTools Device Mode
- **Clear cache** browser jika perubahan tidak terlihat

### 8. Return ke Warna Asli

Jika ingin kembali ke warna asli, cukup hapus CSS tambahan atau comment bagian CSS tema kuning:
```css
/* Comment CSS tema kuning untuk menonaktifkan */
/*
.hero {
  background: linear-gradient(135deg, #FFD700 0%, #F57F17 100%) !important;
}
*/
```

## Contoh Implementasi Lengkap

Untuk implementasi cepat tema kuning emas:
```css
<!-- Tambahkan sebelum </head> -->
<style>
.hero { background: linear-gradient(135deg, #FFD700, #B8860B) !important; }
.navbar { background-color: #FFD700 !important; }
.btn-primary { background-color: #B8860B !important; border-color: #B8860B !important; }
.section-title h2 { color: #B8860B !important; }
.card { border-color: #FFD700 !important; }
</style>
```

Simpan file dan refresh browser untuk melihat perubahan warna tema kuning.