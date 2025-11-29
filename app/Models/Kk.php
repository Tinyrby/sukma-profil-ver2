<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;

    protected $table = 'kk';
    protected $primaryKey = 'no_kk';
    protected $guarded = ['no_kk'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function anggota()
    {
        return $this->hasMany(Penduduk::class, 'no_kk', 'no_kk');
    }

    public function kepalaKeluarga()
    {
        return $this->hasOne(Penduduk::class, 'no_kk', 'no_kk')
            ->where('status_keluarga', 'kepala keluarga');
    }
}