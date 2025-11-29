<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota Struktur - SideS</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .form-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px 16px 0 0;
        }
        .image-preview {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #e9ecef;
        }
        .required {
            color: #dc3545;
        }
        .photo-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .photo-upload-area:hover {
            border-color: #f5576c;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <!-- Header -->
            <div class="form-header">
                <h3 class="mb-1">👥 Tambah Anggota Struktur</h3>
                <p class="mb-0 opacity-75">Isi data staf atau pejabat desa</p>
            </div>

            <!-- Form -->
            <div class="p-4">
                <form action="{{ route('public.management.struktur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Row 1: Foto -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Foto Anggota</label>
                            <div class="photo-upload-area" onclick="document.getElementById('foto').click()">
                                <div id="imagePreview">
                                    <i class="bi bi-camera fs-1 text-muted"></i>
                                    <p class="mt-2 mb-0">Klik untuk upload foto</p>
                                    <small class="text-muted">Format: JPG, PNG. Maks: 2MB</small>
                                </div>
                                <input type="file"
                                       id="foto"
                                       name="foto"
                                       accept="image/*"
                                       class="d-none"
                                       onchange="previewImage(this, 'imagePreview')">
                            </div>
                            @error('foto')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Nama dan NIP -->
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="nama_lengkap" class="form-label">
                                Nama Lengkap <span class="required">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('nama_lengkap') is-invalid @enderror"
                                   id="nama_lengkap"
                                   name="nama_lengkap"
                                   value="{{ old('nama_lengkap') }}"
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text"
                                   class="form-control @error('nip') is-invalid @enderror"
                                   id="nip"
                                   name="nip"
                                   value="{{ old('nip') }}"
                                   placeholder="Nomor Induk Pegawai">
                            <small class="text-muted">Opsional, kosongkan jika tidak ada</small>
                            @error('nip')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 3: Jabatan -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="jabatan" class="form-label">
                                Jabatan <span class="required">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('jabatan') is-invalid @enderror"
                                   id="jabatan"
                                   name="jabatan"
                                   value="{{ old('jabatan') }}"
                                   placeholder="Contoh: Kepala Desa, Sekretaris Desa, dll."
                                   required>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 4: Urutan -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="urutan" class="form-label">
                                Urutan <span class="required">*</span>
                            </label>
                            <input type="number"
                                   class="form-control @error('urutan') is-invalid @enderror"
                                   id="urutan"
                                   name="urutan"
                                   value="{{ old('urutan', 1) }}"
                                   min="0"
                                   required>
                            <small class="text-muted">Angka kecil = urutan pertama (dari kiri ke kanan)</small>
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

  
                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('public.management.struktur.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali
                                </a>
                                <div>
                                    <button type="reset" class="btn btn-outline-warning me-2">
                                        <i class="bi bi-arrow-clockwise me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Simpan Anggota
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Image preview with circular crop
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="image-preview" alt="Preview">`;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = `
                    <i class="bi bi-camera fs-1 text-muted"></i>
                    <p class="mt-2 mb-0">Klik untuk upload foto</p>
                    <small class="text-muted">Format: JPG, PNG. Maks: 2MB</small>
                `;
            }
        }

        // Validate file size before upload
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    e.target.value = '';
                    return;
                }

                const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan JPG atau PNG.');
                    e.target.value = '';
                    return;
                }
            }
        });
    </script>
</body>
</html>