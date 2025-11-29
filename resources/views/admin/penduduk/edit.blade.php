@extends('admin.layouts.app')

@section('title', 'Edit Penduduk - Admin Panel SideS')
@section('page-title', 'Edit Penduduk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Penduduk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.penduduk.update', $penduduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                       name="nik" id="nik" value="{{ old('nik', $penduduk->nik) }}" maxlength="16" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_kk" class="form-label">No. KK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                       name="no_kk" id="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" maxlength="16" required>
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
                                       name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" required>
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
                                    <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
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
                                        <option value="{{ $d->id }}" {{ old('id_dusun', $penduduk->id_dusun) == $d->id ? 'selected' : '' }}>
                                            {{ $d->nama_dusun }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_dusun')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Field lainnya disederhanakan -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="status_keluarga" class="form-label">Status Keluarga <span class="text-danger">*</span></label>
                                <select class="form-select" name="status_keluarga" required>
                                    <option value="kepala keluarga" {{ $penduduk->status_keluarga == 'kepala keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                    <option value="istri" {{ $penduduk->status_keluarga == 'istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="anak" {{ $penduduk->status_keluarga == 'anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" value="{{ old('pendidikan', $penduduk->pendidikan) }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">
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

@section('scripts')
<script>
    $(document).ready(function() {
        // Tidak ada AJAX RT yang diperlukan
    });
</script>
@endsection