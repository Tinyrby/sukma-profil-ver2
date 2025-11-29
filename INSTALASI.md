# Panduan Instalasi & Penggunaan SideS Admin Panel
*Sistem Informasi Desa Sukma - Versi Lengkap*

## 🚀 **INSTALASI**

### 1. **Persiapan Database**
Jalankan migration untuk membuat tabel database:
```bash
php artisan migrate
```

### 2. **Seed Data Awal**
Generate data dusun dan RT sample:
```bash
php artisan db:seed
```

### 3. **Clear Cache**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### 4. **Start Development Server**
```bash
php artisan serve
```

## 🔐 **LOGIN ADMIN**

1. Buka browser: `http://127.0.0.1:8000/dashboard`
2. Klik tombol **"Login Admin"**
3. Masukkan kredensial:
   - **Username**: `admin`
   - **Password**: `admin123`
4. Klik **Login**

---

## ✅ **FITUR YANG SUDAH DIPERBAIKI**

### 1. **📊 Sidebar Layout**
- ✅ Jarak konsisten antar menu
- ✅ Hover effects yang smooth
- ✅ Active state yang jelas
- ✅ Responsive design

### 2. **🏠 Data Kartu Keluarga (KK)**
- ✅ **Index**: Daftar KK dengan jumlah anggota
- ✅ **Create**: Form tambah KK lengkap
- ✅ **Edit**: Edit KK dengan tampilan anggota
- ✅ **Show**: Detail KK dengan statistik anggota
- ✅ **Delete**: Konfirmasi sebelum hapus

### 3. **🗺️ Data Dusun**
- ✅ **Index**: Daftar dusun dengan statistik
- ✅ **Create**: Tambah dusun baru
- ✅ **Edit**: Edit dusun dengan daftar RT
- ✅ **Delete**: Proteksi (tidak bisa hapus jika ada RT/penduduk)

### 4. **🏘️ Data RT**
- ✅ **Index**: Daftar RT dengan nama dusun
- ✅ **Create**: Tambah RT (wajib pilih dusun)
- ✅ **Edit**: Edit RT dengan data penduduk
- ✅ **Delete**: Proteksi (tidak bisa hapus jika ada penduduk)

### 5. **🔄 Data Mutasi Penduduk**
- ✅ **Index**: Daftar mutasi dengan filter
- ✅ **Create**: Tambah mutasi dengan auto-tahun
- ✅ **Edit**: Edit mutasi dengan info penduduk
- ✅ **Filter**: Filter berdasarkan tahun, jenis, dusun

### 6. **👥 Data Penduduk (Enhanced)**
- ✅ **AJAX Dropdown**: RT otomatis saat pilih dusun
- ✅ **Checkbox Mutasi**: Tambah penduduk + mutasi sekaligus
- ✅ **Advanced Filter**: Multi-kriteria filtering
- ✅ **Validation**: Complete validation dengan user feedback

---

## 🎯 **CARA MENGGUNAKAN**

### **Alur Kerja yang Direkomendasikan:**

#### **1. Setup Data Master**
```
Dashboard → Dusun → RT → Penduduk → KK → Mutasi
```

#### **2. Tambah Dusun**
1. Menu: **Data Master → Dusun**
2. Klik **"Tambah Dusun"**
3. Masukkan nama dusun
4. Klik **"Simpan"**

#### **3. Tambah RT**
1. Menu: **Data Master → RT**
2. Klik **"Tambah RT"**
3. Pilih dusun (dropdown)
4. Masukkan nama RT (contoh: RT 01)
5. Klik **"Simpan"**

#### **4. Tambah KK**
1. Menu: **Data Master → Kartu Keluarga**
2. Klik **"Tambah KK"**
3. Isi No KK (16 digit)
4. Isi kepala keluarga
5. Pilih jenis bangunan, air, kategori
6. Klik **"Simpan"**

#### **5. Tambah Penduduk (dengan Mutasi)**
1. Menu: **Data Master → Penduduk**
2. Klik **"Tambah Penduduk"**
3. Isi data pribadi lengkap
4. Pilih dusun → RT (otomatis muncul)
5. **Centang** "Tambahkan Mutasi Sekaligus" (jika perlu)
6. Isi data mutasi yang muncul
7. Klik **"Simpan"**

#### **6. Tambah Mutasi**
1. Menu: **Transaksi → Mutasi Penduduk**
2. Klik **"Tambah Mutasi"**
3. Pilih penduduk dari dropdown
4. Pilih jenis mutasi
5. Pilih tanggal (tahun otomatis)
6. Isi keterangan detail
7. Klik **"Simpan Mutasi"**

---

## 🔧 **FITUR SPECIAL**

### **1. AJAX Dynamic Dropdown**
- RT otomatis berubah saat memilih dusun
- Real-time data loading
- Error handling

### **2. Smart Mutasi Form**
- Checkbox untuk tambah mutasi saat input penduduk
- Auto-fill tanggal mutasi (hari ini)
- Auto-extract tahun dari tanggal
- Sequential save (penduduk → mutasi)

### **3. Advanced Filtering**
- Multi-kriteria filtering
- AJAX-based RT loading
- Form state management

### **4. Data Validation**
- NIK 16 digit validation
- No KK uniqueness
- Relational data integrity
- Custom error messages

### **5. Dashboard Analytics**
- Real-time statistics
- Interactive charts
- Quick action buttons
- Recent mutasi display

---

## 🐛 **TROUBLESHOOTING**

### **Common Issues:**

**1. Route Not Found**
```bash
php artisan route:clear
php artisan route:cache
```

**2. View Not Found**
```bash
php artisan view:clear
php artisan view:cache
```

**3. Migration Issues**
```bash
php artisan migrate:rollback
php artisan migrate
```

**4. AJAX Not Working**
- Check console browser (F12)
- Ensure jQuery loaded
- Check route definition

**5. Data Not Saving**
- Check validation errors
- Check database connection
- Check CSRF token

---

## 💡 **TIPS & BEST PRACTICES**

### **Data Entry:**
1. **Dusun dulu**, baru RT
2. **KK dulu**, baru penduduk
3. **Lengkapi data** untuk validasi maksimal
4. **Backup rutin** data penting

### **Security:**
1. **Logout** setelah selesai
2. **Ganti password** default di production
3. **Clear cache** setelah update

### **Performance:**
1. **Gunakan filter** untuk data besar
2. **Pagination** otomatis aktif
3. **Clear cache** jika terjadi masalah

---

## 📞 **SUPPORT**

Jika mengalami masalah:
1. **Check error messages** dengan detail
2. **Clear cache** terlebih dahulu
3. **Check browser console** (F12)
4. **Restart server** development

---

## 🎉 **READY TO USE!**

Sistem admin SideS sekarang **SUDAH LENGKAP** dan siap digunakan dengan:

- ✅ Semua fitur CRUD berfungsi
- ✅ Responsive design
- ✅ AJAX functionality
- ✅ Data validation
- ✅ User-friendly interface
- ✅ Professional dashboard

**Selamat menggunakan SideS Admin Panel!** 🚀

---

*© 2024 SideS - Sistem Informasi Desa Sukma, Gorontalo*