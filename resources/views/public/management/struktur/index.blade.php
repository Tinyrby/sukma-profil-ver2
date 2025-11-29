<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Struktur Organisasi - SideS</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }
        .member-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e9ecef;
        }
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header-actions {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }
        .urutan-badge {
            background: #6c757d;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Header -->
        <div class="header-actions">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">👥 Manajemen Struktur Organisasi</h2>
                    <p class="mb-0 opacity-75">Kelola data staf dan pejabat desa</p>
                </div>
                <a href="{{ route('public.management.struktur.create') }}" class="btn btn-light">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Anggota
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
                                <th class="border-0">Foto</th>
                                <th class="border-0">Nama Lengkap</th>
                                <th class="border-0">Jabatan</th>
                                <th class="border-0">NIP</th>
                                <th class="border-0">Urutan</th>
                                <th class="border-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($struktur as $member)
                            <tr>
                                <td>
                                    @if($member->foto)
                                        <img src="{{ $member->foto_url }}"
                                             class="member-image"
                                             alt="{{ $member->nama_lengkap }}">
                                    @else
                                        <div class="member-image bg-light d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-medium">{{ $member->nama_lengkap }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $member->jabatan }}</span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $member->nip ?? '-' }}</small>
                                </td>
                                <td>
                                    <span class="urutan-badge">{{ $member->urutan }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('public.management.struktur.edit', $member->id) }}"
                                           class="btn btn-sm btn-outline-warning"
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('public.management.struktur.destroy', $member->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
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
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-people fs-1"></i>
                                        <h5 class="mt-3">Belum ada data struktur organisasi</h5>
                                        <p>Tambahkan anggota pertama dengan klik tombol di atas</p>
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