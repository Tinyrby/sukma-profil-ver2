@extends('admin.layouts.app')

@section('title', 'Detail Kartu Keluarga - Admin Panel SideS')
@section('page-title', 'Detail Kartu Keluarga')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kartu Keluarga</h6>
                <div>
                    <a href="{{ route('admin.kk.edit', $kk->no_kk) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.kk.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Informasi KK -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>No. KK:</strong></td>
                                <td>{{ $kk->no_kk }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kepala Keluarga:</strong></td>
                                <td>{{ $kk->kepala_keluarga }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Bangunan:</strong></td>
                                <td>{{ $kk->jenis_bangunan }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Pemakaian Air:</strong></td>
                                <td>{{ $kk->pemakaian_air }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kategori Keluarga:</strong></td>
                                <td><span class="badge bg-info">{{ $kk->kategori_keluarga }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Jenis Bantuan:</strong></td>
                                <td>
                                    @if($kk->jenis_bantuan)
                                        <span class="badge bg-success">{{ $kk->jenis_bantuan }}</span>
                                    @else
                                        <span class="text-muted">Tidak Ada</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Anggota Keluarga -->
                <hr>
                <h6 class="mb-3">Anggota Keluarga ({{ $kk->anggota->count() }} Orang)</h6>

                @if($kk->anggota->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status Keluarga</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kk->anggota as $index => $anggota)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $anggota->nik }}</td>
                                        <td>
                                            <strong>{{ $anggota->nama_lengkap }}</strong>
                                            @if($anggota->status_keluarga == 'kepala keluarga')
                                                <i class="fas fa-crown text-warning ms-1" title="Kepala Keluarga"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $anggota->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }}">
                                                {{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                                        </td>
                                        <td>{{ $anggota->status_keluarga }}</td>
                                        <td>{{ $anggota->tempat_lahir }}, {{ $anggota->tanggal_lahir->format('d/m/Y') }}</td>
                                        <td>{{ $anggota->pekerjaan }}</td>
                                        <td>
                                            {{ $anggota->alamat }}
                                            @if($anggota->dusun || $anggota->rt)
                                                <br>
                                                <small class="text-muted">
                                                    {{ $anggota->dusun->nama_dusun ?? '' }} {{ $anggota->rt->nama_rt ?? '' }}
                                                </small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Statistik Anggota -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card border-left-primary">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Anggota
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kk->anggota->count() }} Orang</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-success">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Laki-laki
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $kk->anggota->where('jenis_kelamin', 'L')->count() }} Orang
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-info">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Perempuan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $kk->anggota->where('jenis_kelamin', 'P')->count() }} Orang
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Belum ada anggota keluarga yang terdaftar</strong>
                        <br>
                        <small>Tambahkan anggota keluarga melalui menu Data Master → Penduduk dengan No. KK ini.</small>
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.kk.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar KK
                    </a>
                    @if($kk->anggota->count() > 0)
                        <button onclick="window.print()" class="btn btn-info">
                            <i class="fas fa-print"></i> Cetak Data
                        </button>
                    @endif
                </div>
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
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
</style>
@endpush
@endsection