<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'nip',
        'foto',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope untuk mengambil data aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan berdasarkan urutan
    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'asc');
    }

    // Mendapatkan URL foto
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }

        // Default foto jika tidak ada
        return asset('assets/img/team/team-1.jpg');
    }
}
