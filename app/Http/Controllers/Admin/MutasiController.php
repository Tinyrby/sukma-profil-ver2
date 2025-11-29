<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MutasiPenduduk;
use App\Models\Penduduk;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    public function index(Request $request): View
    {
        $query = MutasiPenduduk::with(['penduduk.dusun']);

        // Filter
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }
        if ($request->jenis_mutasi) {
            $query->where('jenis_mutasi', 'like', '%' . $request->jenis_mutasi . '%');
        }
        if ($request->id_dusun) {
            $query->whereHas('penduduk', function($q) use ($request) {
                $q->where('id_dusun', $request->id_dusun);
            });
        }

        $mutasi = $query->latest()->paginate(10);
        $dusun = Dusun::all();
        $tahunList = MutasiPenduduk::distinct('tahun')->pluck('tahun')->sort()->reverse();

        return view('admin.mutasi.index', compact('mutasi', 'dusun', 'tahunList'));
    }

    public function create(): View
    {
        $penduduk = Penduduk::with(['dusun', 'rt'])->get();
        return view('admin.mutasi.create', compact('penduduk'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'id_penduduk' => 'required|exists:penduduk,id',
            'jenis_mutasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        MutasiPenduduk::create([
            'id_penduduk' => $request->id_penduduk,
            'jenis_mutasi' => $request->jenis_mutasi,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'tahun' => date('Y', strtotime($request->tanggal)),
        ]);

        return redirect()->route('admin.mutasi.index')
            ->with('success', 'Data mutasi berhasil ditambahkan.');
    }

    public function edit(MutasiPenduduk $mutasi): View
    {
        $penduduk = Penduduk::with(['dusun', 'rt'])->get();
        return view('admin.mutasi.edit', compact('mutasi', 'penduduk'));
    }

    public function update(Request $request, MutasiPenduduk $mutasi): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'id_penduduk' => 'required|exists:penduduk,id',
            'jenis_mutasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mutasi->update([
            'id_penduduk' => $request->id_penduduk,
            'jenis_mutasi' => $request->jenis_mutasi,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'tahun' => date('Y', strtotime($request->tanggal)),
        ]);

        return redirect()->route('admin.mutasi.index')
            ->with('success', 'Data mutasi berhasil diperbarui.');
    }

    public function destroy(MutasiPenduduk $mutasi): RedirectResponse
    {
        $mutasi->delete();
        return redirect()->route('admin.mutasi.index')
            ->with('success', 'Data mutasi berhasil dihapus.');
    }
}