<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'id_dusun');
    }

    
    public function kk()
    {
        return $this->belongsTo(Kk::class, 'no_kk', 'no_kk');
    }

    public function mutasi()
    {
        return $this->hasMany(MutasiPenduduk::class, 'id_penduduk');
    }

    public function getUmurAttribute()
    {
        return $this->tanggal_lahir ? $this->tanggal_lahir->age : 0;
    }
}