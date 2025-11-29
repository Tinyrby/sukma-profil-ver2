@extends('layouts.app')

@section('title', $berita->judul . ' - Berita Desa Sukma')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
            <li class="breadcrumb-item active">{{ $berita->judul }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Detail Berita -->
        <div class="col-lg-8">
            <article class="card shadow-sm">
                <div class="card-body p-4">
                    <!-- Header Berita -->
                    <div class="mb-4">
                        <span class="badge bg-{{ $berita->badge_color }} fs-6 mb-3">{{ ucfirst($berita->kategori) }}</span>
                        <h1 class="display-5 fw-bold mb-3">{{ $berita->judul }}</h1>

                        <!-- Meta Info -->
                        <div class="d-flex align-items-center text-muted mb-4">
                            <i class="bi bi-calendar-event me-2"></i>
                            <span class="me-4">{{ $berita->tanggal_formatted }}</span>
                            <i class="bi bi-person me-2"></i>
                            <span>Admin Desa Sukma</span>
                        </div>
                    </div>

                    <!-- Gambar Utama -->
                    @if($berita->gambar)
                    <div class="mb-4">
                        <img src="{{ $berita->gambar_url }}" class="img-fluid rounded-3" alt="{{ $berita->judul }}">
                    </div>
                    @endif

                    <!-- Konten Berita -->
                    <div class="berita-content">
                        <div class="lead mb-4">{{ $berita->excerpt }}</div>

                        <div class="content">
                            {!! $berita->konten !!}
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="border-top pt-4 mt-5">
                        <h5 class="mb-3">Bagikan Berita</h5>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $berita->judul }}" target="_blank" class="btn btn-info btn-sm text-white">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text={{ $berita->judul }} {{ url()->current() }}" target="_blank" class="btn btn-success btn-sm">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Berita Terkait -->
            @if($relatedBeritas->count() > 0)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-newspaper me-2"></i>Berita Terkait</h5>
                </div>
                <div class="card-body p-0">
                    @foreach($relatedBeritas as $related)
                    <div class="border-bottom p-3">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ $related->gambar_url }}" class="rounded" alt="{{ $related->judul }}" style="width: 80px; height: 60px; object-fit: cover;">
                            </div>
                            <div class="ms-3">
                                <span class="badge bg-{{ $related->badge_color }} mb-1">{{ ucfirst($related->kategori) }}</span>
                                <h6 class="mb-1">
                                    <a href="{{ route('berita.show', $related->slug) }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($related->judul, 60) }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $related->tanggal_formatted }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Kategori Berita -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-tags me-2"></i>Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-primary me-2" style="font-size: 8px;"></i>Berita</span>
                            <span class="badge bg-primary rounded-pill">{{ \App\Models\Berita::kategori('berita')->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-success me-2" style="font-size: 8px;"></i>Pengumuman</span>
                            <span class="badge bg-success rounded-pill">{{ \App\Models\Berita::kategori('pengumuman')->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-info me-2" style="font-size: 8px;"></i>Agenda</span>
                            <span class="badge bg-info rounded-pill">{{ \App\Models\Berita::kategori('agenda')->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-warning me-2" style="font-size: 8px;"></i>Kegiatan</span>
                            <span class="badge bg-warning rounded-pill">{{ \App\Models\Berita::kategori('kegiatan')->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-danger me-2" style="font-size: 8px;"></i>Penting</span>
                            <span class="badge bg-danger rounded-pill">{{ \App\Models\Berita::kategori('penting')->count() }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-circle-fill text-secondary me-2" style="font-size: 8px;"></i>Lainnya</span>
                            <span class="badge bg-secondary rounded-pill">{{ \App\Models\Berita::kategori('lainnya')->count() }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Berita
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.berita-content {
    line-height: 1.8;
    font-size: 1.1rem;
}

.berita-content h1, .berita-content h2, .berita-content h3, .berita-content h4, .berita-content h5, .berita-content h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.berita-content p {
    margin-bottom: 1.5rem;
}

.berita-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
}

.berita-content ul, .berita-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.berita-content li {
    margin-bottom: 0.5rem;
}

.berita-content blockquote {
    border-left: 4px solid #007bff;
    padding-left: 1.5rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: #6c757d;
}
</style>
@endsection