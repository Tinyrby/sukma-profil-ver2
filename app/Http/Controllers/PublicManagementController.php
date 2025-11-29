<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublicManagementController extends Controller
{
    // Public News Management
    public function newsIndex()
    {
        $beritas = Berita::orderBy('urutan', 'asc')->orderBy('tanggal', 'desc')->get();
        return view('public.management.news.index', compact('beritas'));
    }

    public function newsCreate()
    {
        return view('public.management.news.create');
    }

    public function newsStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:beritas,slug',
            'excerpt' => 'required|string',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,pengumuman,agenda,kegiatan,penting,lainnya',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . Str::slug($request->judul) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('berita', $imageName, 'public');
            $data['gambar'] = 'berita/' . $imageName;
        }

        // Set is_active based on checkbox (true if checked, false if not checked)
        $data['is_active'] = $request->boolean('is_active');

        Berita::create($data);

        return redirect()->route('public.management.news.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function newsEdit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('public.management.news.edit', compact('berita'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:beritas,slug,' . $id,
            'excerpt' => 'required|string',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,pengumuman,agenda,kegiatan,penting,lainnya',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $berita = Berita::findOrFail($id);
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
                Storage::delete('public/' . $berita->gambar);
            }

            $image = $request->file('gambar');
            $imageName = time() . '_' . Str::slug($request->judul) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('berita', $imageName, 'public');
            $data['gambar'] = 'berita/' . $imageName;
        }

        $data['is_active'] = $request->boolean('is_active');

        $berita->update($data);

        return redirect()->route('public.management.news.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function newsDestroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Delete image if exists
        if ($berita->gambar && Storage::exists('public/' . $berita->gambar)) {
            Storage::delete('public/' . $berita->gambar);
        }

        $berita->delete();

        return redirect()->route('public.management.news.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    // Public Organizational Structure Management
    public function strukturIndex()
    {
        $struktur = StrukturOrganisasi::orderBy('urutan', 'asc')->get();
        return view('public.management.struktur.index', compact('struktur'));
    }

    public function strukturCreate()
    {
        return view('public.management.struktur.create');
    }

    public function strukturStore(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . Str::slug($request->nama_lengkap) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/struktur', $imageName);
            $data['foto'] = 'struktur/' . $imageName;
        }

        $data['is_active'] = $request->has('is_active') ? true : true;

        StrukturOrganisasi::create($data);

        return redirect()->route('public.management.struktur.index')
            ->with('success', 'Struktur organisasi berhasil ditambahkan!');
    }

    public function strukturEdit($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        return view('public.management.struktur.edit', compact('struktur'));
    }

    public function strukturUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $struktur = StrukturOrganisasi::findOrFail($id);
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('foto')) {
            // Delete old image if exists
            if ($struktur->foto && Storage::exists('public/' . $struktur->foto)) {
                Storage::delete('public/' . $struktur->foto);
            }

            $image = $request->file('foto');
            $imageName = time() . '_' . Str::slug($request->nama_lengkap) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/struktur', $imageName);
            $data['foto'] = 'struktur/' . $imageName;
        }

        $data['is_active'] = $request->has('is_active');

        $struktur->update($data);

        return redirect()->route('public.management.struktur.index')
            ->with('success', 'Struktur organisasi berhasil diperbarui!');
    }

    public function strukturDestroy($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);

        // Delete image if exists
        if ($struktur->foto && Storage::exists('public/' . $struktur->foto)) {
            Storage::delete('public/' . $struktur->foto);
        }

        $struktur->delete();

        return redirect()->route('public.management.struktur.index')
            ->with('success', 'Struktur organisasi berhasil dihapus!');
    }
}