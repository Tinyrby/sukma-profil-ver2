<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kk;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class KkController extends Controller
{
    public function index(): View
    {
        $kk = Kk::withCount('anggota')->latest()->paginate(10);
        return view('admin.kk.index', compact('kk'));
    }

    public function create(): View
    {
        return view('admin.kk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'no_kk' => 'required|digits:16|unique:kk,no_kk',
            'kepala_keluarga' => 'required|string|max:255',
            'jenis_bangunan' => 'required|string|max:255',
            'pemakaian_air' => 'required|string|max:255',
            'kategori_keluarga' => 'required|string|max:255',
            'jenis_bantuan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Kk::create($request->all());

        return redirect()->route('admin.kk.index')
            ->with('success', 'Data Kartu Keluarga berhasil ditambahkan.');
    }

    public function edit(Kk $kk): View
    {
        $kk->load(['anggota' => function($query) {
            $query->orderBy('status_keluarga', 'desc');
        }]);

        return view('admin.kk.edit', compact('kk'));
    }

    public function update(Request $request, Kk $kk): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'no_kk' => 'required|digits:16|unique:kk,no_kk,' . $kk->no_kk . ',no_kk',
            'kepala_keluarga' => 'required|string|max:255',
            'jenis_bangunan' => 'required|string|max:255',
            'pemakaian_air' => 'required|string|max:255',
            'kategori_keluarga' => 'required|string|max:255',
            'jenis_bantuan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kk->update($request->all());

        return redirect()->route('admin.kk.index')
            ->with('success', 'Data Kartu Keluarga berhasil diperbarui.');
    }

    public function destroy(Kk $kk): RedirectResponse
    {
        // Cek apakah ada penduduk yang terkait
        if ($kk->anggota()->count() > 0) {
            return redirect()->route('admin.kk.index')
                ->with('error', 'Tidak dapat menghapus KK yang masih memiliki anggota.');
        }

        $kk->delete();

        return redirect()->route('admin.kk.index')
            ->with('success', 'Data Kartu Keluarga berhasil dihapus.');
    }

    public function show(Kk $kk): View
    {
        $kk->load(['anggota' => function($query) {
            $query->orderBy('status_keluarga', 'desc');
        }]);

        return view('admin.kk.show', compact('kk'));
    }
}