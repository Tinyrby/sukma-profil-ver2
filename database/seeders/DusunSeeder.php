<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dusun;

class DusunSeeder extends Seeder
{
    public function run()
    {
        $dusun = [
            ['nama_dusun' => 'Dusun 1'],
            ['nama_dusun' => 'Dusun 2'],
            ['nama_dusun' => 'Dusun 3'],
        ];

        foreach ($dusun as $item) {
            Dusun::create($item);
        }
    }
}