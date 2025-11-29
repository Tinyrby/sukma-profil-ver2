@extends('admin.layouts.app')

@section('title', 'Manajemen Berita')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-newspaper me-2"></i>Manajemen Berita</h5>
                    <a href="{{ route('berita.admin.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                    </a>
                </div>
                <div class="card-body">
                    <!-- Search & Filter -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form method="GET" action="{{ route('berita.admin.index') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form method="GET" action="{{ route('berita.admin.index') }}">
                                <select name="kategori" class="form-select" onchange="this.form.submit()">
                                    <option value="">Semua Kategori</option>
                                    <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                                    <option value="pengumuman" {{ request('kategori') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                    <option value="agenda" {{ request('kategori') == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                    <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    <option value="penting" {{ request('kategori') == 'penting' ? 'selected' : '' }}>Penting</option>
                                    <option value="lainnya" {{ request('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!-- Table Berita -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($beritas as $berita)
                                <tr>
                                    <td>
                                        @if($berita->gambar)
                                            <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" style="width: 60px; height: 40px; object-fit: cover;" class="rounded">
                                        @else
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 40px; font-size: 10px;">
                                                No Image
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ Str::limit($berita->judul, 50) }}</div>
                                        <small class="text-muted">{{ Str::limit($berita->excerpt, 80) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $berita->badge_color }}">
                                            {{ ucfirst($berita->kategori) }}
                                        </span>
                                    </td>
                                    <td>{{ $berita->tanggal_formatted }}</td>
                                    <td>{{ $berita->urutan }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="status-{{ $berita->id }}"
                                                {{ $berita->is_active ? 'checked' : '' }}
                                                onchange="toggleStatus({{ $berita->id }})">
                                            <label class="form-check-label" for="status-{{ $berita->id }}">
                                                {{ $berita->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('berita.show', $berita->slug) }}" target="_blank" class="btn btn-outline-primary" title="Lihat">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('berita.admin.edit', $berita->id) }}" class="btn btn-outline-warning" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('berita.admin.destroy', $berita->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="bi bi-inbox" style="font-size: 2rem; color: #dee2e6;"></i>
                                        <p class="text-muted mt-2">Belum ada data berita</p>
                                        <a href="{{ route('berita.admin.create') }}" class="btn btn-primary btn-sm mt-2">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($beritas->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $beritas->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleStatus(id) {
    fetch(`{{ route('berita.admin.toggle-status', ':id') }}`.replace(':id', id), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const label = document.querySelector(`label[for="status-${id}"]`);
            label.textContent = data.is_active ? 'Aktif' : 'Nonaktif';

            // Tampilkan notifikasi sukses
            const toast = document.createElement('div');
            toast.className = 'toast align-items-center text-white bg-success border-0 position-fixed top-0 end-0 m-3';
            toast.style.zIndex = '9999';
            toast.setAttribute('role', 'alert');
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${data.message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
            document.body.appendChild(toast);

            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Kembalikan checkbox ke posisi semula
        const checkbox = document.getElementById(`status-${id}`);
        checkbox.checked = !checkbox.checked;
    });
}
</script>
@endpush