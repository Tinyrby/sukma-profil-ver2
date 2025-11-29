@extends('admin.layouts.app')

@section('title', 'Data Kartu Keluarga - Admin Panel SideS')
@section('page-title', 'Data Kartu Keluarga')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Kartu Keluarga</h6>
                <a href="{{ route('admin.kk.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah KK
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Jenis Bangunan</th>
                                <th>Pemakaian Air</th>
                                <th>Kategori Keluarga</th>
                                <th>Jumlah Anggota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kk as $index => $item)
                                <tr>
                                    <td>{{ $kk->firstItem() + $index }}</td>
                                    <td>{{ $item->no_kk }}</td>
                                    <td>{{ $item->kepala_keluarga }}</td>
                                    <td>{{ $item->jenis_bangunan }}</td>
                                    <td>{{ $item->pemakaian_air }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $item->kategori_keluarga }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $item->anggota->count() }} Orang</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.kk.show', $item->no_kk) }}"
                                               class="btn btn-info" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.kk.edit', $item->no_kk) }}"
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.kk.destroy', $item->no_kk) }}" method="POST"
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
                {{ $kk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection