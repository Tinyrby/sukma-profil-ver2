@extends('admin.layouts.app')

@section('title', 'Tambah Dusun - Admin Panel SideS')
@section('page-title', 'Tambah Dusun')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Dusun</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dusun.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_dusun" class="form-label">Nama Dusun <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_dusun') is-invalid @enderror"
                               name="nama_dusun" id="nama_dusun" value="{{ old('nama_dusun') }}"
                               placeholder="Contoh: Dusun Sukamaju" required>
                        @error('nama_dusun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Masukkan nama dusun tanpa awalan "Dusun"</small>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Informasi:</strong>
                        <ul class="mb-0 mt-2">
                            <li>Nama dusun harus unik (tidak boleh sama dengan dusun lain)</li>
                            <li>Setelah menambah dusun, Anda dapat menambah RT terkait</li>
                            <li>Dusun yang sudah memiliki RT atau penduduk tidak dapat dihapus</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.dusun.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection