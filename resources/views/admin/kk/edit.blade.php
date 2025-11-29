@extends('admin.layouts.app')

@section('title', 'Edit Kartu Keluarga - Admin Panel SideS')
@section('page-title', 'Edit Kartu Keluarga')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Kartu Keluarga</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kk.update', $kk->no_kk) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_kk" class="form-label">No. KK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                       name="no_kk" id="no_kk" value="{{ old('no_kk', $kk->no_kk) }}" maxlength="16" required>
                                @error('no_kk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Masukkan 16 digit nomor KK</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kepala_keluarga" class="form-label">Kepala Keluarga <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kepala_keluarga') is-invalid @enderror"
                                       name="kepala_keluarga" id="kepala_keluarga" value="{{ old('kepala_keluarga', $kk->kepala_keluarga) }}" required>
                                @error('kepala_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_bangunan" class="form-label">Jenis Bangunan <span class="text-danger">*</span></label>
                                <select class="form-select @error('jenis_bangunan') is-invalid @enderror"
                                        name="jenis_bangunan" id="jenis_bangunan" required>
                                    <option value="">Pilih Jenis Bangunan</option>
                                    <option value="Rumah" {{ old('jenis_bangunan', $kk->jenis_bangunan) == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                                    <option value="Ruko" {{ old('jenis_bangunan', $kk->jenis_bangunan) == 'Ruko' ? 'selected' : '' }}>Ruko</option>
                                    <option value="Apartemen" {{ old('jenis_bangunan', $kk->jenis_bangunan) == 'Apartemen' ? 'selected' : '' }}>Apartemen</option>
                                    <option value="Vila" {{ old('jenis_bangunan', $kk->jenis_bangunan) == 'Vila' ? 'selected' : '' }}>Vila</option>
                                    <option value="Kontrakan" {{ old('jenis_bangunan', $kk->jenis_bangunan) == 'Kontrakan' ? 'selected' : '' }}>Kontrakan</option>
                                </select>
                                @error('jenis_bangunan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pemakaian_air" class="form-label">Pemakaian Air <span class="text-danger">*</span></label>
                                <select class="form-select @error('pemakaian_air') is-invalid @enderror"
                                        name="pemakaian_air" id="pemakaian_air" required>
                                    <option value="">Pilih Jenis Pemakaian Air</option>
                                    <option value="PDAM" {{ old('pemakaian_air', $kk->pemakaian_air) == 'PDAM' ? 'selected' : '' }}>PDAM</option>
                                    <option value="Sumur" {{ old('pemakaian_air', $kk->pemakaian_air) == 'Sumur' ? 'selected' : '' }}>Sumur</option>
                                    <option value="PAM Desa" {{ old('pemakaian_air', $kk->pemakaian_air) == 'PAM Desa' ? 'selected' : '' }}>PAM Desa</option>
                                    <option value="Air Mineral" {{ old('pemakaian_air', $kk->pemakaian_air) == 'Air Mineral' ? 'selected' : '' }}>Air Mineral</option>
                                </select>
                                @error('pemakaian_air')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori_keluarga" class="form-label">Kategori Keluarga <span class="text-danger">*</span></label>
                                <select class="form-select @error('kategori_keluarga') is-invalid @enderror"
                                        name="kategori_keluarga" id="kategori_keluarga" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Miskin" {{ old('kategori_keluarga', $kk->kategori_keluarga) == 'Miskin' ? 'selected' : '' }}>Miskin</option>
                                    <option value="Menengah" {{ old('kategori_keluarga', $kk->kategori_keluarga) == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                                    <option value="Mampu" {{ old('kategori_keluarga', $kk->kategori_keluarga) == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                                </select>
                                @error('kategori_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_bantuan" class="form-label">Jenis Bantuan</label>
                                <select class="form-select @error('jenis_bantuan') is-invalid @enderror"
                                        name="jenis_bantuan" id="jenis_bantuan">
                                    <option value="">Tidak Ada</option>
                                    <option value="PKH" {{ old('jenis_bantuan', $kk->jenis_bantuan) == 'PKH' ? 'selected' : '' }}>PKH</option>
                                    <option value="BPNT" {{ old('jenis_bantuan', $kk->jenis_bantuan) == 'BPNT' ? 'selected' : '' }}>BPNT (Kartu Sembako)</option>
                                    <option value="BST" {{ old('jenis_bantuan', $kk->jenis_bantuan) == 'BST' ? 'selected' : '' }}>BST</option>
                                    <option value="BLT-DD" {{ old('jenis_bantuan', $kk->jenis_bantuan) == 'BLT-DD' ? 'selected' : '' }}>BLT-DD</option>
                                </select>
                                @error('jenis_bantuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Anggota Keluarga -->
                    @if($kk->anggota->count() > 0)
                        <hr>
                        <h6 class="mb-3">Anggota Keluarga Terdaftar</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kk->anggota as $anggota)
                                        <tr>
                                            <td>{{ $anggota->nik }}</td>
                                            <td>{{ $anggota->nama_lengkap }}</td>
                                            <td>{{ $anggota->status_keluarga }}</td>
                                            <td>
                                                <span class="badge {{ $anggota->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }}">
                                                    {{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <hr>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada anggota keluarga yang terdaftar untuk KK ini.
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.kk.index') }}" class="btn btn-secondary">
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
@endsection