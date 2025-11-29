@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin Panel SideS')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistik Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Penduduk
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPenduduk) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total KK
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalKk) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-id-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Mutasi
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalMutasi) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            KK Laki-Laki
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($kkByGender['laki-laki']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <!-- Penduduk per Dusun Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Penduduk per Dusun</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="pendudukDusunChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- KK by Gender Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kepala Keluarga Berdasarkan Jenis Kelamin</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="kkGenderChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Laki-laki
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Perempuan
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mutasi Terbaru -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mutasi Penduduk Terbaru</h6>
            </div>
            <div class="card-body">
                @if($mutasiTerbaru->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Penduduk</th>
                                    <th>Jenis Mutasi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mutasiTerbaru as $mutasi)
                                    <tr>
                                        <td>{{ $mutasi->penduduk->nama_lengkap }}</td>
                                        <td>{{ $mutasi->jenis_mutasi }}</td>
                                        <td>{{ $mutasi->tanggal->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-center text-muted">Belum ada data mutasi</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary btn-block">
                            <i class="fas fa-user-plus"></i> Tambah Penduduk
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.kk.create') }}" class="btn btn-success btn-block">
                            <i class="fas fa-id-card"></i> Tambah KK
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.mutasi.create') }}" class="btn btn-info btn-block">
                            <i class="fas fa-exchange-alt"></i> Tambah Mutasi
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-warning btn-block">
                            <i class="fas fa-list"></i> Lihat Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Chart Penduduk per Dusun
    const ctxPenduduk = document.getElementById('pendudukDusunChart').getContext('2d');
    const pendudukDusunChart = new Chart(ctxPenduduk, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Jumlah Penduduk',
                data: @json($chartData),
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Jumlah: ' + context.parsed.y + ' orang';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Chart KK by Gender
    const ctxKk = document.getElementById('kkGenderChart').getContext('2d');
    const kkGenderChart = new Chart(ctxKk, {
        type: 'doughnut',
        data: {
            labels: ['Kepala Keluarga Laki-laki', 'Kepala Keluarga Perempuan'],
            datasets: [{
                data: [{{ $kkByGender['laki-laki'] }}, {{ $kkByGender['perempuan'] }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(23, 162, 184, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(23, 162, 184, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection

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
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
    .chart-area {
        position: relative;
        height: 20rem;
        width: 100%;
    }
    .chart-pie {
        position: relative;
        height: 15rem;
        width: 100%;
    }
</style>
@endpush