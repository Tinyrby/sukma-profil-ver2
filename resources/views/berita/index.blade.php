@extends('layouts.app')

@section('title', 'Semua Berita - Desa Sukma')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Berita dan Pengumuman</h1>
        <p class="lead text-muted">Informasi terkini seputar Desa Sukma, Gorontalo</p>
    </div>

    <!-- Filter Kategori -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-funnel me-2"></i>Filter Berdasarkan Kategori</h5>
                    <div class="btn-group flex-wrap" role="group">
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-primary mb-2 {{ !request('kategori') ? 'active' : '' }}">
                            Semua
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=berita" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'berita' ? 'active' : '' }}">
                            Berita
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=pengumuman" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'pengumuman' ? 'active' : '' }}">
                            Pengumuman
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=agenda" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'agenda' ? 'active' : '' }}">
                            Agenda
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=kegiatan" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'kegiatan' ? 'active' : '' }}">
                            Kegiatan
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=penting" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'penting' ? 'active' : '' }}">
                            Penting
                        </a>
                        <a href="{{ route('berita.index') }}?kategori=lainnya" class="btn btn-outline-primary mb-2 {{ request('kategori') == 'lainnya' ? 'active' : '' }}">
                            Lainnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Berita -->
    @if($beritas->count() > 0)
    <div class="row">
        @foreach($beritas as $berita)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm hover-lift">
                <img src="{{ $berita->gambar_url }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <div class="mb-2">
                        <span class="badge bg-{{ $berita->badge_color }}">{{ ucfirst($berita->kategori) }}</span>
                    </div>
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($berita->excerpt, 120) }}</p>

                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i> {{ $berita->tanggal_formatted }}
                        </small>
                        <button onclick="showBeritaModal({{ $berita->id }})" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#beritaModal" style="background-color: #5d2f72ff; border: 1px solid #5d2f72ff; color: #5d2f72ff; background: none; padding: 8px 16px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(93, 47, 114, 0.1);" onmouseover="this.style.backgroundColor='#5d2f72ff'; this.style.borderColor='#5d2f72ff'; this.style.color='white'; this.style.boxShadow='0 4px 8px rgba(93, 47, 114, 0.3)'; this.style.transform='translateY(-1px)';" onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='#5d2f72ff'; this.style.color='#5d2f72ff'; this.style.boxShadow='0 2px 4px rgba(93, 47, 114, 0.1)'; this.style.transform='translateY(0)';">
                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->links() }}
    </div>
    @else
    <div class="text-center py-5">
        <div class="mb-4">
            <i class="bi bi-newspaper" style="font-size: 4rem; color: #dee2e6;"></i>
        </div>
        <h3>Belum Ada Berita</h3>
        <p class="text-muted">Belum ada berita yang tersedia untuk kategori ini. Silakan cek kembali nanti.</p>
        <a href="/" class="btn btn-primary">
            <i class="bi bi-house me-2"></i>Kembali ke Beranda
        </a>
    </div>
    @endif
</div>

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

<style>
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.btn-group .active {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
}

.card-title {
    height: 3em;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    line-height: 1.5;
}
</style>

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
@endsection