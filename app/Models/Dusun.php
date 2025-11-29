<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusun';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    
    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'id_dusun');
    }

    public function getTotalPendudukAttribute()
    {
        return $this->penduduk()->count();
    }

    public function getTotalKkAttribute()
    {
        return $this->penduduk()
            ->where('status_keluarga', 'kepala keluarga')
            ->count();
    }
}