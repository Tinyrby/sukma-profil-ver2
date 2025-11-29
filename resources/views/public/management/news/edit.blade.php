<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - SideS</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .form-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px 16px 0 0;
        }
        .image-preview {
            max-width: 200px;
            max-height: 150px;
            border-radius: 8px;
            object-fit: cover;
        }
        .required {
            color: #dc3545;
        }
        .current-image {
            position: relative;
            display: inline-block;
        }
        .remove-image {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="form-container">
            <!-- Header -->
            <div class="form-header">
                <h3 class="mb-1">✏️ Edit Berita</h3>
                <p class="mb-0 opacity-75">Perbarui informasi berita atau pengumuman desa</p>
            </div>

            <!-- Form -->
            <div class="p-4">
                <form action="{{ route('public.management.news.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Row 1: Judul dan Slug -->
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="judul" class="form-label">
                                Judul Berita <span class="required">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   id="judul"
                                   name="judul"
                                   value="{{ old('judul', $berita->judul) }}"
                                   placeholder="Masukkan judul berita"
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="slug" class="form-label">
                                Slug <span class="required">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   id="slug"
                                   name="slug"
                                   value="{{ old('slug', $berita->slug) }}"
                                   placeholder="url-friendly-judul"
                                   required>
                            <small class="text-muted">Slug akan digunakan dalam URL</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Kategori, Tanggal, Urutan -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="kategori" class="form-label">
                                Kategori <span class="required">*</span>
                            </label>
                            <select class="form-select @error('kategori') is-invalid @enderror"
                                    id="kategori"
                                    name="kategori"
                                    required>
                                <option value="">Pilih Kategori</option>
                                <option value="berita" {{ old('kategori', $berita->kategori) == 'berita' ? 'selected' : '' }}>Berita</option>
                                <option value="pengumuman" {{ old('kategori', $berita->kategori) == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                <option value="agenda" {{ old('kategori', $berita->kategori) == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                <option value="kegiatan" {{ old('kategori', $berita->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="penting" {{ old('kategori', $berita->kategori) == 'penting' ? 'selected' : '' }}>Penting</option>
                                <option value="lainnya" {{ old('kategori', $berita->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">
                                Tanggal <span class="required">*</span>
                            </label>
                            <input type="date"
                                   class="form-control @error('tanggal') is-invalid @enderror"
                                   id="tanggal"
                                   name="tanggal"
                                   value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}"
                                   required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="urutan" class="form-label">
                                Urutan <span class="required">*</span>
                            </label>
                            <input type="number"
                                   class="form-control @error('urutan') is-invalid @enderror"
                                   id="urutan"
                                   name="urutan"
                                   value="{{ old('urutan', $berita->urutan) }}"
                                   min="0"
                                   required>
                            <small class="text-muted">Angka kecil = urutan pertama</small>
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 3: Excerpt -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="excerpt" class="form-label">
                                Ringkasan <span class="required">*</span>
                            </label>
                            <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                      id="excerpt"
                                      name="excerpt"
                                      rows="3"
                                      placeholder="Ringkasan berita (akan ditampilkan di halaman utama)"
                                      required>{{ old('excerpt', $berita->excerpt) }}</textarea>
                            <small class="text-muted">Maksimal 200 karakter untuk tampilan yang optimal</small>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 4: Konten -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="konten" class="form-label">
                                Konten Lengkap <span class="required">*</span>
                            </label>
                            <textarea class="form-control @error('konten') is-invalid @enderror"
                                      id="konten"
                                      name="konten"
                                      rows="8"
                                      placeholder="Konten lengkap berita (support HTML)"
                                      required>{{ old('konten', $berita->konten) }}</textarea>
                            @error('konten')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 5: Gambar -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="gambar" class="form-label">Ganti Gambar</label>
                            <input type="file"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   id="gambar"
                                   name="gambar"
                                   accept="image/*"
                                   onchange="previewImage(this, 'imagePreview')">
                            <small class="text-muted">Format: JPG, PNG, GIF. Maks: 2MB</small>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preview</label>
                            <div id="imagePreview" class="text-center">
                                @if($berita->gambar)
                                    <div class="current-image">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                             class="image-preview"
                                             alt="Current image"
                                             id="currentImage">
                                        <button type="button" class="remove-image" onclick="removeCurrentImage()">×</button>
                                    </div>
                                @else
                                    <div class="bg-light p-4 rounded" style="width: 200px; height: 150px; display: inline-flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-image fs-1 text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Row 6: Status -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $berita->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktif (tampilkan di website)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('public.management.news.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Kembali
                                </a>
                                <div>
                                    <button type="reset" class="btn btn-outline-warning me-2">
                                        <i class="bi bi-arrow-clockwise me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save me-2"></i>Perbarui Berita
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
        // Auto-generate slug from title
        document.getElementById('judul').addEventListener('input', function() {
            const slug = this.value.toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });

        // Image preview
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="image-preview" alt="Preview">`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Remove current image
        function removeCurrentImage() {
            const currentImage = document.getElementById('currentImage');
            if (currentImage) {
                currentImage.parentElement.remove();
            }
        }
    </script>
</body>
</html>