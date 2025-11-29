<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan semua berita di halaman utama
    public function index()
    {
        // Ambil data dari database untuk ditampilkan di slider 3D
        $berita = Berita::active()
            ->urutan()
            ->take(10) // Ambil 10 berita terbaru
            ->get();

        // Kirim variabel $berita ke view 'index'
        return view('index', compact('berita'));
    }

    // Menampilkan detail berita
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Berita terkait
        $relatedBeritas = Berita::where('id', '!=', $berita->id)
            ->where('kategori', $berita->kategori)
            ->where('is_active', true)
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'relatedBeritas'));
    }

    // Menampilkan semua berita (halaman daftar)
    public function all(Request $request)
    {
        $query = Berita::active();

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->kategori($request->kategori);
        }

        $beritas = $query->urutan()->paginate(12);
        return view('berita.index', compact('beritas'));
    }

    // Admin: Menampilkan daftar berita
    public function adminIndex(Request $request)
    {
        $query = Berita::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->kategori($request->kategori);
        }

        $beritas = $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    // Admin: Form tambah berita
    public function create()
    {
        return view('admin.berita.create');
    }

    // Admin: Simpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,pengumuman,agenda,kegiatan,penting,lainnya',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'is_active' => 'boolean',
            'urutan' => 'integer|min:0'
        ]);

        $data = $request->except('gambar');
        $data['slug'] = Str::slug($request->judul);
        $data['is_active'] = $request->has('is_active');
        $data['urutan'] = $request->urutan ?? 0;

        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('berita', 'public');
            $data['gambar'] = $gambarPath;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    // Admin: Form edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // Admin: Update berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|in:berita,pengumuman,agenda,kegiatan,penting,lainnya',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'is_active' => 'boolean',
            'urutan' => 'integer|min:0'
        ]);

        $data = $request->except('gambar');
        $data['slug'] = Str::slug($request->judul);
        $data['is_active'] = $request->has('is_active');
        $data['urutan'] = $request->urutan ?? 0;

        // Handle hapus gambar
        if ($request->has('remove_image')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = null;
        }

        // Handle upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('berita', 'public');
            $data['gambar'] = $gambarPath;
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    // Admin: Hapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar jika ada
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    // Toggle status aktif/nonaktif
    public function toggleStatus($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->is_active = !$berita->is_active;
        $berita->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berita berhasil diperbarui!',
            'is_active' => $berita->is_active
        ]);
    }

    // API: Menampilkan semua berita aktif untuk frontend
    public function apiIndex()
    {
        $beritas = Berita::active()
            ->urutan()
            ->take(10) // Ambil 10 berita terbaru
            ->get()
            ->map(function ($berita) {
                return [
                    'id' => $berita->id,
                    'judul' => $berita->judul,
                    'slug' => $berita->slug,
                    'excerpt' => $berita->excerpt,
                    'kategori' => $berita->kategori,
                    'gambar' => $berita->gambar_url,
                    'tanggal' => $berita->tanggal_formatted,
                    'konten' => $berita->konten,
                    'badge_color' => $berita->badge_color
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $beritas
        ]);
    }

    // API: Menampilkan detail berita tertentu
    public function apiShow($id)
    {
        $berita = Berita::active()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $berita->id,
                'judul' => $berita->judul,
                'slug' => $berita->slug,
                'excerpt' => $berita->excerpt,
                'kategori' => $berita->kategori,
                'gambar' => $berita->gambar_url,
                'tanggal' => $berita->tanggal_formatted,
                'konten' => $berita->konten,
                'badge_color' => $berita->badge_color
            ]
        ]);
    }
}