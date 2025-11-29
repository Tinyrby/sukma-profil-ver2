<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita - SideS</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }
        .category-badge {
            font-size: 0.75rem;
            padding: 4px 8px;
            border-radius: 12px;
        }
        .news-image-thumb {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
        }
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header-actions {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Header -->
        <div class="header-actions">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">📰 Manajemen Berita Desa Sukma</h2>
                    <p class="mb-0 opacity-75">Kelola berita, pengumuman, dan agenda desa</p>
                </div>
                <a href="{{ route('public.management.news.create') }}" class="btn btn-light">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                </a>
            </div>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">Gambar</th>
                                <th class="border-0">Judul</th>
                                <th class="border-0">Kategori</th>
                                <th class="border-0">Tanggal</th>
                                <th class="border-0">Urutan</th>
                                <th class="border-0">Status</th>
                                <th class="border-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritas as $berita)
                            <tr>
                                <td>
                                    @if($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                             class="news-image-thumb"
                                             alt="{{ $berita->judul }}">
                                    @else
                                        <div class="news-image-thumb bg-light d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-medium">{{ $berita->judul }}</div>
                                    <small class="text-muted">{{ Str::limit($berita->excerpt, 80) }}</small>
                                </td>
                                <td>
                                    <span class="badge category-badge bg-{{ $berita->badge_color }}">
                                        {{ ucfirst($berita->kategori) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</td>
                                <td>{{ $berita->urutan }}</td>
                                <td>
                                    @if($berita->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('berita.show', $berita->slug) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Lihat">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('public.management.news.edit', $berita->id) }}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('public.management.news.destroy', $berita->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-newspaper fs-1"></i>
                                        <h5 class="mt-3">Belum ada data berita</h5>
                                        <p>Tambahkan berita pertama dengan klik tombol di atas</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="bi bi-house me-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>