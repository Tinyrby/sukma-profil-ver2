# Instruksi Penggunaan Halaman Admin SideS
*Sistem Informasi Desa Sukma*

## 📋 Daftar Isi
1. [Login Admin](#login-admin)
2. [Dashboard Admin](#dashboard-admin)
3. [Manajemen Penduduk](#manajemen-penduduk)
4. [Manajemen Mutasi Penduduk](#manajemen-mutasi-penduduk)
5. [Manajemen Kartu Keluarga](#manajemen-kartu-keluarga)
6. [Manajemen Dusun](#manajemen-dusun)
7. [Manajemen RT](#manajemen-rt)
8. [Fitur-Fitur Khusus](#fitur-fitur-khusus)
9. [Tips dan Troubleshooting](#tips-dan-troubleshooting)

---

## 🔐 Login Admin

### Cara Login:
1. Klik tombol **"Login Admin"** pada halaman utama website
2. Masukkan kredensial berikut:
   - **Username**: `admin`
   - **Password**: `admin123`
3. Klik tombol **"Login"**

### Security Notes:
- ⚠️ **Password default sementara**, segera ubah di production
- Logout setelah selesai menggunakan sistem
- Jangan bagikan kredensial login kepada orang yang tidak berwenang

---

## 📊 Dashboard Admin

### Fitur Utama Dashboard:

#### 1. **Statistik Cards**
- **Total Penduduk**: Jumlah seluruh penduduk terdaftar
- **Total KK**: Jumlah Kartu Keluarga
- **Total Mutasi**: Jumlah mutasi penduduk
- **KK Laki-Laki**: Jumlah kepala keluarga pria

#### 2. **Grafik Data**
- **Chart Penduduk per Dusun**: Bar chart menampilkan distribusi penduduk
- **Chart Kepala Keluarga**: Pie chart berdasarkan jenis kelamin

#### 3. **Mutasi Terbaru**
- Daftar 5 mutasi penduduk terakhir

#### 4. **Aksi Cepat**
- Tombol cepat untuk menambah data penduduk, KK, dan mutasi

---

## 👥 Manajemen Penduduk

### Menu: **Data Master → Penduduk**

#### Fitur-Fitur:

**1. Filter Data**
- Filter berdasarkan Dusun
- Filter berdasarkan RT (otomatis berubah saat memilih dusun)
- Filter berdasarkan jenis kelamin
- Filter berdasarkan status keluarga

**2. Tambah Penduduk**
- **Data Pribadi**: NIK, No KK, nama, jenis kelamin, tanggal lahir, dll.
- **Alamat**: Dusun, RT (dropdown dependen)
- **Checkbox "Tambahkan Mutasi Sekaligus"**
  - Centang untuk langsung membuat data mutasi
  - Akan muncul form tambahan untuk data mutasi
  - Tanggal mutasi otomatis terisi hari ini

**3. Edit Penduduk**
- Klik icon **edit** (✏️) pada kolom aksi
- Form edit dengan validasi data
- Dropdown RT dinamis berdasarkan dusun yang dipilih

**4. Hapus Penduduk**
- Klik icon **hapus** (🗑️) pada kolom aksi
- Konfirmasi sebelum menghapus

#### Alur Tambah Penduduk + Mutasi:
1. Isi form data penduduk lengkap
2. Centang checkbox "Tambahkan Mutasi Sekaligus"
3. Form mutasi akan muncul
4. Isi jenis mutasi, tanggal (auto-isi), dan keterangan
5. Klik "Simpan"
6. **Sistem akan**:
   - Menyimpan data penduduk terlebih dahulu
   - Mengambil ID penduduk yang baru dibuat
   - Menyimpan data mutasi dengan relasi ke penduduk

---

## 🔄 Manajemen Mutasi Penduduk

### Menu: **Transaksi → Mutasi Penduduk**

#### Fitur-Fitur:

**1. Filter Mutasi**
- Filter berdasarkan tahun
- Filter berdasarkan jenis mutasi
- Filter berdasarkan dusun

**2. Tambah Mutasi**
- Pilih penduduk dari dropdown
- Input jenis mutasi (contoh: pindah datang, meninggal, dll.)
- Pilih tanggal mutasi
- Input keterangan
- **Tahun otomatis di-extract** dari tanggal mutasi

**3. Edit & Hapus**
- Standard CRUD operations
- Validasi data sebelum simpan

---

## 🏠 Manajemen Kartu Keluarga

### Menu: **Data Master → Kartu Keluarga**

#### Fitur-Fitur:

**1. Data KK**
- No KK (primary key)
- Nama kepala keluarga
- Jenis bangunan
- Pemakaian air
- Kategori keluarga
- Jenis bantuan (jika ada)

**2. Tampilan Anggota Keluarga**
- Saat edit atau view, menampilkan daftar anggota keluarga
- Terintegrasi dengan data penduduk
- Status keluarga otomatis terdeteksi

**3. Validasi**
- Tidak dapat menghapus KK yang masih memiliki anggota
- No KK harus unique

---

## 🗺️ Manajemen Dusun

### Menu: **Data Master → Dusun**

#### Fitur-Fitur:
- CRUD sederhana untuk data dusun
- Validasi nama dusun unik
- Tidak dapat menghapus dusun yang masih memiliki RT/penduduk
- Display jumlah RT dan penduduk per dusun

---

## 🏘️ Manajemen RT

### Menu: **Data Master → RT**

#### Fitur-Fitur:
- **Dropdown Depend Dusun**: Wajib memilih dusun terlebih dahulu
- CRUD operations
- Tidak dapat menghapus RT yang masih memiliki penduduk
- Display jumlah penduduk per RT

---

## ✨ Fitur-Fitur Khusus

### 1. **AJAX Dropdown Dinamis**
- RT otomatis berubah saat memilih dusun
- Real-time filtering
- Menggunakan jQuery AJAX

### 2. **Smart Validation**
- Format NIK (16 digit)
- Format No KK (16 digit)
- Validasi relasi data
- Custom error messages

### 3. **Responsive Design**
- Mobile-friendly
- Bootstrap 5 framework
- Professional admin layout

### 4. **Data Charts**
- Real-time statistics
- Interactive charts dengan Chart.js
- Auto-update saat data berubah

---

## 🛠️ Tips dan Troubleshooting

### Common Issues:

**1. Login Gagal**
- ✅ Cek username & password
- ✅ Clear browser cache
- ✅ Pastikan URL benar

**2. Dropdown RT Tidak Muncul**
- ✅ Pastikan dusun sudah dipilih
- ✅ Cek koneksi internet
- ✅ Refresh halaman

**3. Data Tidak Tersimpan**
- ✅ Cek semua required field terisi
- ✅ Validasi format data (NIK 16 digit)
- ✅ Cek console browser untuk error

### Best Practices:

1. **Data Entry**:
   - Isi data dengan lengkap dan akurat
   - Gunakan format yang konsisten
   - Backup data secara berkala

2. **Security**:
   - Logout setelah selesai
   - Jangan share password
   - Update password secara berkala

3. **Performance**:
   - Gunakan filter untuk data yang besar
   - Hindari refresh berlebihan
   - Clear cache jika terjadi masalah

---

## 📞 Support

Jika mengalami masalah:
- 📧 Email: admin@sides-sukma.desa.id
- 📞 Telepon: (021) 1234567
- 🕐 Jam Support: Senin-Jumat, 08:00-15:00

---

## 🔄 Update System

### Cara Update:
1. Backup database
2. Download latest version
3. Extract dan replace files
4. Run migration
5. Clear cache

---

**© 2024 SideS - Sistem Informasi Desa Sukma, Gorontalo**
*Dikembangkan dengan ❤️ untuk kemajuan desa*