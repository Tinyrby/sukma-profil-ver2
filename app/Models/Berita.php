<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'excerpt',
        'konten',
        'kategori',
        'gambar',
        'tanggal',
        'is_active',
        'urutan'
    ];

    // Accessor untuk kompatibilitas dengan view
    public function getDeskripsiSingkatAttribute()
    {
        return $this->excerpt;
    }

    protected $casts = [
        'tanggal' => 'date',
        'is_active' => 'boolean',
    ];

    // Scope untuk mengambil berita aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengambil berita berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk mengurutkan berita
    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('tanggal', 'desc');
    }

    // Mendapatkan badge color berdasarkan kategori
    public function getBadgeColorAttribute()
    {
        $colors = [
            'berita' => 'primary',
            'pengumuman' => 'success',
            'agenda' => 'info',
            'kegiatan' => 'warning',
            'penting' => 'danger',
            'lainnya' => 'secondary'
        ];

        return $colors[$this->kategori] ?? 'secondary';
    }

    // Mendapatkan format tanggal Indonesia
    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal->locale('id')->translatedFormat('d F Y');
    }

    // Mendapatkan URL gambar
    public function getGambarUrlAttribute()
    {
        // Jika ada gambar yang diupload, gunakan gambar tersebut
        if ($this->gambar) {
            // Pastikan path benar untuk gambar yang diupload
            if (str_starts_with($this->gambar, 'berita/')) {
                return asset('storage/' . $this->gambar);
            }
            return asset($this->gambar);
        }

        // Default gambar jika tidak ada gambar yang diupload
        $defaultImages = [
            'berita' => 'assets/img/masonry-portfolio/masonry-portfolio-1.jpg',
            'pengumuman' => 'assets/img/masonry-portfolio/masonry-portfolio-2.jpg',
            'agenda' => 'assets/img/masonry-portfolio/masonry-portfolio-3.jpg',
            'kegiatan' => 'assets/img/masonry-portfolio/masonry-portfolio-4.jpg',
            'penting' => 'assets/img/masonry-portfolio/masonry-portfolio-5.jpg',
            'lainnya' => 'assets/img/masonry-portfolio/masonry-portfolio-6.jpg'
        ];

        return asset($defaultImages[$this->kategori] ?? 'assets/img/masonry-portfolio/masonry-portfolio-1.jpg');
    }
}