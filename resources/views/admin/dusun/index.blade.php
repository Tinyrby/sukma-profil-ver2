@extends('admin.layouts.app')

@section('title', 'Data Dusun - Admin Panel SideS')
@section('page-title', 'Data Dusun')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Dusun</h6>
                <a href="{{ route('admin.dusun.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Dusun
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dusun</th>
                                <th>Jumlah Penduduk</th>
                                <th>Jumlah KK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dusun as $index => $item)
                                <tr>
                                    <td>{{ $dusun->firstItem() + $index }}</td>
                                    <td>
                                        <strong>{{ $item->nama_dusun }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $item->penduduk_count ?? $item->penduduk->count() }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">{{ $item->total_kk ?? 0 }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.dusun.edit', $item->id) }}"
                                               class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.dusun.destroy', $item->id) }}" method="POST"
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
                                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                {{ $dusun->links() }}
            </div>
        </div>
    </div>
</div>
@endsection