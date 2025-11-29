<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiPenduduk extends Model
{
    use HasFactory;

    protected $table = 'mutasi_penduduk';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
        'tahun' => 'integer',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk');
    }

    // Auto extract year from date before saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($mutasi) {
            if ($mutasi->tanggal) {
                $mutasi->tahun = $mutasi->tanggal->year;
            }
        });
    }
}