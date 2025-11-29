@extends('admin.layouts.app')

@section('title', 'Data Mutasi Penduduk - Admin Panel SideS')
@section('page-title', 'Data Mutasi Penduduk')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Mutasi Penduduk</h6>
                <a href="{{ route('admin.mutasi.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Mutasi
                </a>
            </div>
            <div class="card-body">
                <!-- Filter -->
                <form method="GET" action="{{ route('admin.mutasi.index') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="tahun" class="form-select">
                                <option value="">Semua Tahun</option>
                                @foreach($tahunList as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="jenis_mutasi"
                                   placeholder="Jenis Mutasi" value="{{ request('jenis_mutasi') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="id_dusun" class="form-select">
                                <option value="">Semua Dusun</option>
                                @foreach($dusun as $d)
                                    <option value="{{ $d->id }}" {{ request('id_dusun') == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama_dusun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-sm w-100">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penduduk</th>
                                <th>NIK</th>
                                <th>Jenis Mutasi</th>
                                <th>Tanggal</th>
                                <th>Tahun</th>
                                <th>Dusun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mutasi as $index => $item)
                                <tr>
                                    <td>{{ $mutasi->firstItem() + $index }}</td>
                                    <td>
                                        <strong>{{ $item->penduduk->nama_lengkap }}</strong>
                                    </td>
                                    <td>{{ $item->penduduk->nik }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $item->jenis_mutasi }}</span>
                                    </td>
                                    <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $item->tahun }}</span>
                                    </td>
                                    <td>{{ $item->penduduk->dusun->nama_dusun ?? '-' }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-info"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $item->keterangan }}"
                                                    onclick="alert('Keterangan: {{ $item->keterangan }}')">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <a href="{{ route('admin.mutasi.edit', $item->id) }}"
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.mutasi.destroy', $item->id) }}" method="POST"
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
                {{ $mutasi->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endsection