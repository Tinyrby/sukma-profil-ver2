@extends('admin.layouts.app')

@section('title', 'Data Penduduk - Admin Panel SideS')
@section('page-title', 'Data Penduduk')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
                <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Penduduk
                </a>
            </div>
            <div class="card-body">
                <!-- Filter -->
                <form method="GET" action="{{ route('admin.penduduk.index') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="id_dusun" id="filter_dusun" class="form-select">
                                <option value="">Semua Dusun</option>
                                @foreach($dusun as $d)
                                    <option value="{{ $d->id }}" {{ request('id_dusun') == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama_dusun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="jenis_kelamin" class="form-select">
                                <option value="">Semua Jenis Kelamin</option>
                                <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="status_keluarga" class="form-select">
                                <option value="">Semua Status Keluarga</option>
                                <option value="kepala keluarga" {{ request('status_keluarga') == 'kepala keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                <option value="istri" {{ request('status_keluarga') == 'istri' ? 'selected' : '' }}>Istri</option>
                                <option value="anak" {{ request('status_keluarga') == 'anak' ? 'selected' : '' }}>Anak</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-info btn-sm w-100">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Dusun</th>
                                <th>Status Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penduduk as $index => $p)
                                <tr>
                                    <td>{{ $penduduk->firstItem() + $index }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td>
                                        <span class="badge {{ $p->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }}">
                                            {{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    <td>{{ $p->tanggal_lahir->format('d/m/Y') }}</td>
                                    <td>{{ $p->dusun->nama_dusun ?? '-' }}</td>
                                    <td>{{ $p->status_keluarga }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.penduduk.edit', $p->id) }}"
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.penduduk.destroy', $p->id) }}" method="POST"
                                                  class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{ $penduduk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Tidak ada AJAX RT yang diperlukan setelah penghapusan fitur RT
    });
</script>
@endsection