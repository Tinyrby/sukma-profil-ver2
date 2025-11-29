<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class DusunController extends Controller
{
    public function index(): View
    {
        $dusun = Dusun::withCount('penduduk')->latest()->paginate(10);
        return view('admin.dusun.index', compact('dusun'));
    }

    public function create(): View
    {
        return view('admin.dusun.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama_dusun' => 'required|string|max:255|unique:dusun,nama_dusun',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Dusun::create($request->all());

        return redirect()->route('admin.dusun.index')
            ->with('success', 'Data dusun berhasil ditambahkan.');
    }

    public function edit(Dusun $dusun): View
    {
        $dusun->load('penduduk');
        return view('admin.dusun.edit', compact('dusun'));
    }

    public function update(Request $request, Dusun $dusun): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama_dusun' => 'required|string|max:255|unique:dusun,nama_dusun,' . $dusun->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dusun->update($request->all());

        return redirect()->route('admin.dusun.index')
            ->with('success', 'Data dusun berhasil diperbarui.');
    }

    public function destroy(Dusun $dusun): RedirectResponse
    {
        // Cek apakah ada penduduk yang terkait
        if ($dusun->penduduk()->count() > 0) {
            return redirect()->route('admin.dusun.index')
                ->with('error', 'Tidak dapat menghapus dusun yang masih memiliki penduduk.');
        }

        $dusun->delete();

        return redirect()->route('admin.dusun.index')
            ->with('success', 'Data dusun berhasil dihapus.');
    }
}