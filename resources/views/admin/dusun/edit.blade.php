@extends('admin.layouts.app')

@section('title', 'Edit Dusun - Admin Panel SideS')
@section('page-title', 'Edit Dusun')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Dusun</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dusun.update', $dusun->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_dusun" class="form-label">Nama Dusun <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_dusun') is-invalid @enderror"
                               name="nama_dusun" id="nama_dusun" value="{{ old('nama_dusun', $dusun->nama_dusun) }}"
                               placeholder="Contoh: Dusun Sukamaju" required>
                        @error('nama_dusun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Masukkan nama dusun tanpa awalan "Dusun"</small>
                    </div>

                    <!-- Informasi Statistik -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card border-left-primary">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Penduduk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dusun->penduduk->count() }} Orang</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Penduduk -->
                    @if($dusun->penduduk->count() > 0)
                        <div class="mb-4">
                            <h6 class="mb-3">Daftar Penduduk di {{ $dusun->nama_dusun }}</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Status Keluarga</th>
                                            <th>Jenis Kelamin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dusun->penduduk->take(10) as $penduduk)
                                            <tr>
                                                <td>{{ $penduduk->nik }}</td>
                                                <td>{{ $penduduk->nama_lengkap }}</td>
                                                <td>{{ $penduduk->status_keluarga }}</td>
                                                <td>
                                                    <span class="badge {{ $penduduk->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }}">
                                                        {{ $penduduk->jenis_kelamin == 'L' ? 'L' : 'P' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($dusun->penduduk->count() > 10)
                                    <small class="text-muted">Menampilkan 10 dari {{ $dusun->penduduk->count() }} penduduk</small>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning mb-4">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Belum ada penduduk</strong>
                            <br>
                            <small>Tambahkan penduduk untuk dusun ini melalui menu Data Master → Penduduk</small>
                        </div>
                    @endif

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Perhatian:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Nama dusun harus unik (tidak boleh sama dengan dusun lain)</li>
                            <li>Dusun yang sudah memiliki penduduk tidak dapat dihapus</li>
                            <li>Perubahan nama dusun akan mempengaruhi data penduduk terkait</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.dusun.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }
</style>
@endpush
@endsection