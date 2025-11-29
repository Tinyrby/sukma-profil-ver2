<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\MutasiPenduduk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    public function index(Request $request): View
    {
        $query = Penduduk::with(['dusun', 'kk']);

        // Filter
        if ($request->id_dusun) {
            $query->where('id_dusun', $request->id_dusun);
        }
        if ($request->jenis_kelamin) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
        if ($request->status_keluarga) {
            $query->where('status_keluarga', $request->status_keluarga);
        }

        $penduduk = $query->latest()->paginate(10);
        $dusun = Dusun::all();

        return view('admin.penduduk.index', compact('penduduk', 'dusun'));
    }

    public function create(): View
    {
        $dusun = Dusun::all();
        return view('admin.penduduk.create', compact('dusun'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Debug: Log request
        \Log::info('Penduduk store method called', $request->all());

        try {
            $validator = Validator::make($request->all(), [
                'nik' => 'required|digits:16|unique:penduduk,nik',
                'no_kk' => 'required|digits:16',
                'nama_lengkap' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string|max:255',
                'agama' => 'required|string|max:255',
                'pendidikan' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'status_keluarga' => 'required|string|max:255',
                'alamat' => 'required|string',
                'id_dusun' => 'nullable|exists:dusun,id',
                'status_perkawinan' => 'required|string|max:255',
                'tambah_mutasi' => 'sometimes|boolean',
                'jenis_mutasi' => 'required_if:tambah_mutasi,1|string|max:255',
                'tanggal_mutasi' => 'required_if:tambah_mutasi,1|date',
                'keterangan_mutasi' => 'required_if:tambah_mutasi,1|string',
            ]);

            if ($validator->fails()) {
                \Log::error('Validation failed:', $validator->errors()->toArray());
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Simpan data penduduk
            \Log::info('Creating penduduk with data:', $request->except([
                'tambah_mutasi',
                'jenis_mutasi',
                'tanggal_mutasi',
                'keterangan_mutasi'
            ]));

            $penduduk = Penduduk::create($request->except([
                'tambah_mutasi',
                'jenis_mutasi',
                'tanggal_mutasi',
                'keterangan_mutasi'
            ]));

            \Log::info('Penduduk created successfully with ID: ' . $penduduk->id);

            // Jika checkbox mutasi dicentang, buat data mutasi
            if ($request->tambah_mutasi) {
                MutasiPenduduk::create([
                    'id_penduduk' => $penduduk->id,
                    'jenis_mutasi' => $request->jenis_mutasi,
                    'tanggal' => $request->tanggal_mutasi,
                    'keterangan' => $request->keterangan_mutasi,
                    'tahun' => date('Y', strtotime($request->tanggal_mutasi)),
                ]);

                \Log::info('Mutasi created for penduduk ID: ' . $penduduk->id);
            }

            return redirect()->route('admin.penduduk.index')
                ->with('success', 'Data penduduk berhasil ditambahkan.');

        } catch (\Exception $e) {
            \Log::error('Error creating penduduk: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Penduduk $penduduk): View
    {
        $dusun = Dusun::all();
        return view('admin.penduduk.edit', compact('penduduk', 'dusun'));
    }

    public function update(Request $request, Penduduk $penduduk): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|digits:16|unique:penduduk,nik,' . $penduduk->id,
            'no_kk' => 'required|digits:16',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'agama' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_keluarga' => 'required|string|max:255',
            'alamat' => 'required|string',
            'id_dusun' => 'nullable|exists:dusun,id',
            'status_perkawinan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $penduduk->update($request->all());

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk): RedirectResponse
    {
        $penduduk->delete();
        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus.');
    }
}