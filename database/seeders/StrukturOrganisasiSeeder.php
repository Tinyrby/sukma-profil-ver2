<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data struktur organisasi Pemerintah Desa Sukma
        $strukturOrganisasi = [
            [
                'nama_lengkap' => 'Dr. H. Ahmad Wijaya, S.Sos., M.M.',
                'jabatan' => 'Kepala Desa Sukma',
                'nip' => '197503152005011001',
                'foto' => null, // Akan menggunakan default image
                'urutan' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Siti Aminah, S.Pd.',
                'jabatan' => 'Sekretaris Desa',
                'nip' => '198004212008012002',
                'foto' => null,
                'urutan' => 2,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Budi Santoso, S.E.',
                'jabatan' => 'Kasi Pemerintahan',
                'nip' => '198506152010011003',
                'foto' => null,
                'urutan' => 3,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Diana Permata Sari, A.Md.',
                'jabatan' => 'Kasi Kesejahteraan',
                'nip' => '198801152012012004',
                'foto' => null,
                'urutan' => 4,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Rudi Hermawan, S.T.',
                'jabatan' => 'Kasi Pelayanan',
                'nip' => '198709152011011005',
                'foto' => null,
                'urutan' => 5,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Intan Permata Hati',
                'jabatan' => 'Kaur Keuangan',
                'nip' => '199002152014012006',
                'foto' => null,
                'urutan' => 6,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Ahmad Fadli, S.Kom.',
                'jabatan' => 'Kaur Perencanaan',
                'nip' => '199005152014011007',
                'foto' => null,
                'urutan' => 7,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Siti Nurhaliza',
                'jabatan' => 'Kaur Tata Usaha dan Umum',
                'nip' => '199103152015012008',
                'foto' => null,
                'urutan' => 8,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'M. Iqbal Ramadhan',
                'jabatan' => 'Kadus Dusun I',
                'nip' => null,
                'foto' => null,
                'urutan' => 9,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Hasanuddin',
                'jabatan' => 'Kadus Dusun II',
                'nip' => null,
                'foto' => null,
                'urutan' => 10,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Fatmawati',
                'jabatan' => 'Kadus Dusun III',
                'nip' => null,
                'foto' => null,
                'urutan' => 11,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Joko Prasetyo',
                'jabatan' => 'Kadus Dusun IV',
                'nip' => null,
                'foto' => null,
                'urutan' => 12,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data struktur organisasi
        foreach ($strukturOrganisasi as $data) {
            DB::table('struktur_organisasi')->insert($data);
        }

        $this->command->info('✅ Data struktur organisasi Desa Sukma berhasil disimpan!');
        $this->command->info('📋 Total data: ' . count($strukturOrganisasi) . ' anggota');
    }
}