@extends('admin.layouts.app')

@push('styles')
<style>
    /* Debugging styles */
    .debug-info {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 12px;
        color: #6c757d;
    }
</style>
@endpush

@section('title', 'Tambah Penduduk - Admin Panel SideS')
@section('page-title', 'Tambah Penduduk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- Debug Info -->
        <div class="debug-info">
            <strong>Debug Info:</strong><br>
            - Form Action: {{ route('admin.penduduk.store') }}<br>
            - Method: POST<br>
            - CSRF Token: {{ csrf_token() }}<br>
            - Admin Logged In: {{ session('admin_logged_in') ? 'YES' : 'NO' }}<br>
            - Current URL: {{ url()->current() }}
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penduduk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.penduduk.store') }}" method="POST">
                    @csrf

                    <!-- Data Pribadi -->
                    <h5 class="mb-3">Data Pribadi</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                       name="nik" id="nik" value="{{ old('nik') }}" maxlength="16" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_kk" class="form-label">No. KK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                       name="no_kk" id="no_kk" value="{{ old('no_kk') }}" maxlength="16" required>
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                       name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                       name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                       name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                <select class="form-select @error('status_perkawinan') is-invalid @enderror"
                                        name="status_perkawinan" id="status_perkawinan" required>
                                    <option value="">Pilih</option>
                                    <option value="belum kawin" {{ old('status_perkawinan') == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                    <option value="kawin" {{ old('status_perkawinan') == 'kawin' ? 'selected' : '' }}>Kawin</option>
                                    <option value="cerai hidup" {{ old('status_perkawinan') == 'cerai hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="cerai mati" {{ old('status_perkawinan') == 'cerai mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                                @error('status_perkawinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                       name="agama" id="agama" value="{{ old('agama') ?? 'Islam' }}" required>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                       name="pendidikan" id="pendidikan" value="{{ old('pendidikan') }}" required>
                                @error('pendidikan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                       name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}" required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_keluarga" class="form-label">Status Keluarga <span class="text-danger">*</span></label>
                                <select class="form-select @error('status_keluarga') is-invalid @enderror"
                                        name="status_keluarga" id="status_keluarga" required>
                                    <option value="">Pilih</option>
                                    <option value="kepala keluarga" {{ old('status_keluarga') == 'kepala keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                    <option value="istri" {{ old('status_keluarga') == 'istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="anak" {{ old('status_keluarga') == 'anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                                @error('status_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                       name="alamat" id="alamat" value="{{ old('alamat') }}" required>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="id_dusun" class="form-label">Dusun</label>
                                <select class="form-select @error('id_dusun') is-invalid @enderror"
                                        name="id_dusun" id="id_dusun">
                                    <option value="">Pilih Dusun</option>
                                    @foreach($dusun as $d)
                                        <option value="{{ $d->id }}" {{ old('id_dusun') == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama_dusun }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_dusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Pilih dusun tempat tinggal penduduk</small>
                            </div>
                        </div>
                    </div>

                    <!-- Checkbox Tambah Mutasi -->
                    <hr>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tambah_mutasi" id="tambah_mutasi"
                                   value="1" onchange="toggleMutasiForm()">
                            <label class="form-check-label" for="tambah_mutasi">
                                <strong>Tambahkan Mutasi Sekaligus</strong>
                            </label>
                        </div>
                    </div>

                    <!-- Form Mutasi (awalnya tersembunyi) -->
                    <div id="mutasiForm" style="display: none;" class="bg-light p-3 rounded">
                        <h6 class="mb-3">Data Mutasi</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jenis_mutasi" class="form-label">Jenis Mutasi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('jenis_mutasi') is-invalid @enderror"
                                           name="jenis_mutasi" id="jenis_mutasi" value="{{ old('jenis_mutasi') }}">
                                    @error('jenis_mutasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_mutasi" class="form-label">Tanggal Mutasi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_mutasi') is-invalid @enderror"
                                           name="tanggal_mutasi" id="tanggal_mutasi" value="{{ old('tanggal_mutasi') }}">
                                    @error('tanggal_mutasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="keterangan_mutasi" class="form-label">Keterangan <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('keterangan_mutasi') is-invalid @enderror"
                                              name="keterangan_mutasi" id="keterangan_mutasi" rows="3">{{ old('keterangan_mutasi') }}</textarea>
                                    @error('keterangan_mutasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i> Simpan Data Penduduk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Minimal JavaScript - hanya untuk toggle mutasi form
    function toggleMutasiForm() {
        const checkbox = document.getElementById('tambah_mutasi');
        const form = document.getElementById('mutasiForm');

        if (checkbox && form) {
            if (checkbox.checked) {
                form.style.display = 'block';
                // Set tanggal mutasi ke hari ini
                const tanggalMutasi = document.getElementById('tanggal_mutasi');
                if (tanggalMutasi) {
                    tanggalMutasi.value = new Date().toISOString().split('T')[0];
                }
            } else {
                form.style.display = 'none';
            }
        }
    }

    // HANYA JIKA checkbox dicentang saat load halaman
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('tambah_mutasi');
        if (checkbox && checkbox.checked) {
            toggleMutasiForm();
        }
    });
</script>
@endsection