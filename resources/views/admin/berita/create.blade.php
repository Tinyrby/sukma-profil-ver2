@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Berita Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul berita" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Kategori dan Tanggal -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="berita" {{ old('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                                    <option value="pengumuman" {{ old('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="agenda" {{ old('kategori') == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                    <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="penting" {{ old('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                                    <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="excerpt" class="form-label">Ringkasan <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" placeholder="Masukkan ringkasan berita (maksimal 500 karakter)" required>{{ old('excerpt') }}</textarea>
                                <small class="text-muted">Ringkasan akan ditampilkan di halaman utama dan daftar berita</small>
                                @error('excerpt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)">
                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal: 2MB</small>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Preview Gambar -->
                                <div id="imagePreview" class="mt-3" style="display: none;">
                                    <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px; max-height: 200px;">
                                </div>
                            </div>
                        </div>

                        <!-- Konten -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="konten" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="10" placeholder="Masukkan konten lengkap berita" required>{{ old('konten') }}</textarea>
                                <small class="text-muted">Gunakan format HTML untuk styling (misal: &lt;p&gt;, &lt;strong&gt;, &lt;em&gt;, dll)</small>
                                @error('konten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Urutan dan Status -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="urutan" class="form-label">Urutan Tampil</label>
                                <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan') ?? 0 }}" min="0">
                                <small class="text-muted">Nomor urutan untuk mengatur tampilan (0 = otomatis)</small>
                                @error('urutan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Aktif (Tampilkan di website)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Simpan Berita
                                </button>
                                <a href="{{ route('berita.admin.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-2"></i>Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
}

// Character counter untuk excerpt
document.getElementById('excerpt').addEventListener('input', function() {
    const maxLength = 500;
    const currentLength = this.value.length;

    if (currentLength > maxLength) {
        this.value = this.value.substring(0, maxLength);
    }
});
</script>
@endpush