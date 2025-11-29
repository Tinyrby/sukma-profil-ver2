@extends('admin.layouts.app')

@section('title', 'Edit Mutasi Penduduk - Admin Panel SideS')
@section('page-title', 'Edit Mutasi Penduduk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Mutasi Penduduk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.mutasi.update', $mutasi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_penduduk" class="form-label">Penduduk <span class="text-danger">*</span></label>
                                <select class="form-select @error('id_penduduk') is-invalid @enderror"
                                        name="id_penduduk" id="id_penduduk" required>
                                    <option value="">Pilih Penduduk</option>
                                    @foreach($penduduk as $p)
                                        <option value="{{ $p->id }}" {{ old('id_penduduk', $mutasi->id_penduduk) == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama_lengkap }} - {{ $p->nik }}
                                            @if($p->dusun)
                                                ({{ $p->dusun->nama_dusun }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_penduduk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_mutasi" class="form-label">Jenis Mutasi <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_mutasi') is-invalid @enderror"
                                        name="jenis_mutasi" id="jenis_mutasi" required>
                                    <option value="">Pilih Jenis Mutasi</option>
                                    <option value="Pindah Datang" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Pindah Datang' ? 'selected' : '' }}>Pindah Datang</option>
                                    <option value="Pindah Keluar" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Pindah Keluar' ? 'selected' : '' }}>Pindah Keluar</option>
                                    <option value="Meninggal" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                    <option value="Lahir" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Lahir' ? 'selected' : '' }}>Lahir</option>
                                    <option value="Kawin" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="Cerai" {{ old('jenis_mutasi', $mutasi->jenis_mutasi) == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                                </select>
                                @error('jenis_mutasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Mutasi <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                       name="tanggal" id="tanggal" value="{{ old('tanggal', $mutasi->tanggal->format('Y-m-d')) }}" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Tahun akan otomatis di-extract dari tanggal</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun (Auto-Generate)</label>
                                <input type="number" class="form-control" id="tahun_display" readonly
                                       value="{{ old('tahun', $mutasi->tahun) }}">
                                <small class="text-muted">Tahun di-extract dari tanggal mutasi</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                  name="keterangan" id="keterangan" rows="4" required>{{ old('keterangan', $mutasi->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Jelaskan detail mutasi (contoh: pindah ke alamat tertentu, meninggal karena sakit, dll.)</small>
                    </div>

                    <!-- Info Penduduk Terpilih -->
                    <div id="penduduk_info" class="alert alert-info">
                        <h6><i class="fas fa-user"></i> Informasi Penduduk</h6>
                        <div id="penduduk_details">
                            <strong>{{ $mutasi->penduduk->nama_lengkap }} - {{ $mutasi->penduduk->nik }}</strong>
                            @if($mutasi->penduduk->dusun)
                                ({{ $mutasi->penduduk->dusun->nama_dusun }})
                            @endif
                        </div>
                    </div>

                    <!-- Info Mutasi Saat Ini -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card border-left-primary">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Mutasi Dibuat
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $mutasi->created_at->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-success">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Terakhir Update
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $mutasi->updated_at->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-left-warning">
                                <div class="card-body py-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Tahun Mutasi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mutasi->tahun }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Penting:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Perubahan data mutasi akan mempengaruhi statistik dan laporan</li>
                            <li>Tanggal mutasi akan menentukan tahun otomatis</li>
                            <li>Keterangan harus jelas dan detail untuk dokumentasi</li>
                            <li>Pastikan semua perubahan sudah benar sebelum menyimpan</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.mutasi.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Mutasi
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
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
</style>
@endpush

@section('scripts')
<script>
    $(document).ready(function() {
        // Tahun otomatis dari tanggal
        $('#tanggal').change(function() {
            var tanggal = $(this).val();
            if (tanggal) {
                var tahun = new Date(tanggal).getFullYear();
                $('#tahun_display').val(tahun);
            } else {
                $('#tahun_display').val('');
            }
        });

        // Load data penduduk saat dipilih
        $('#id_penduduk').change(function() {
            var pendudukId = $(this).val();
            if (pendudukId) {
                // Mendapatkan data penduduk dari option yang dipilih
                var selectedOption = $(this).find('option:selected');
                var pendudukText = selectedOption.text();

                $('#penduduk_details').html('<strong>' + pendudukText + '</strong>');
                $('#penduduk_info').show();
            } else {
                $('#penduduk_info').hide();
            }
        });

        // Trigger change untuk load data awal
        $('#id_penduduk').trigger('change');
    });
</script>
@endsection