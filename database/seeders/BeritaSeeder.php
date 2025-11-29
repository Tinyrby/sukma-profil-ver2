<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data berita sample untuk Desa Sukma
        $beritas = [
            [
                'judul' => 'Peresmian Kantor Desa Sukma yang Baru',
                'slug' => 'peresmian-kantor-desa-sukma-yang-baru',
                'excerpt' => 'Bupati Gorontalo meresmikan gedung kantor desa baru yang lebih modern dan representatif untuk pelayanan masyarakat.',
                'konten' => '<p>Pada hari Senin, 20 November 2024, Bupati Gorontalo telah meresmikan gedung kantor Desa Sukma yang baru. Gedung ini dibangun dengan tujuan untuk meningkatkan kualitas pelayanan publik kepada masyarakat Desa Sukma.</p>

                <p>Gedung kantor desa yang baru dilengkapi dengan berbagai fasilitas modern seperti ruang pelayanan terpadu, ruang pertemuan, perpustakaan desa, serta fasilitas teknologi informasi yang memadai. Hal ini sejalan dengan komitmen pemerintah desa untuk mewujudkan birokrasi yang bersih dan transparan.</p>

                <p>Dalam sambutannya, Bupati Gorontalo menyampaikan apresiasinya kepada seluruh masyarakat Desa Sukma yang telah mendukung pembangunan gedung kantor desa ini. "Ini adalah bukti nyata komitmen kita bersama untuk memajukan desa," ujarnya.</p>

                <p>Kepala Desa Sukma juga menambahkan bahwa dengan fasilitas baru ini, diharapkan pelayanan kepada masyarakat dapat lebih optimal dan efisien. "Mari kita manfaatkan fasilitas ini dengan sebaik-baiknya untuk kemajuan bersama," tuturnya.</p>',
                'kategori' => 'berita',
                'gambar' => null, // Akan menggunakan default image
                'tanggal' => Carbon::parse('2024-11-20'),
                'is_active' => true,
                'urutan' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Pengumuman: Jadwal Vaksinasi COVID-19 dosis 3',
                'slug' => 'pengumuman-jadwal-vaksinasi-covid-19-dosis-3',
                'excerpt' => 'Pemerintah Desa Sukma akan menyelenggarakan vaksinasi COVID-19 dosis 3 bagi seluruh warga yang telah memenuhi syarat.',
                'konten' => '<p>Berdasarkan instruksi dari Dinas Kesehatan Kabupaten, Pemerintah Desa Sukma akan menyelenggarakan vaksinasi COVID-19 dosis 3 (booster) pada:</p>

                <p><strong>Tanggal:</strong> 25-26 November 2024<br>
                <strong>Waktu:</strong> 08:00 - 12:00 WITA<br>
                <strong>Tempat:</strong> Kantor Desa Sukma</p>

                <p><strong>Syarat Peserta:</strong></p>
                <ul>
                    <li>Warga Desa Sukma yang memiliki KTP</li>
                    <li>Sudah menerima vaksin dosis 2 minimal 3 bulan yang lalu</li>
                    <li>Membawa kartu vaksinasi dosis 1 dan 2</li>
                    <li>Dalam kondisi sehat (tidak demam)</li>
                </ul>

                <p><strong>Membawa:</strong></p>
                <ul>
                    <li>KTP asli dan fotokopi</li>
                    <li>Kartu vaksinasi</li>
                    <li>Ballpoint</li>
                </ul>

                <p>Vaksinasi gratis untuk seluruh warga yang memenuhi syarat. Mari kita sukseskan program vaksinasi nasional untuk mewujudkan herd immunity di Desa Sukma!</p>

                <p>Informasi lebih lanjut hubungi Kantor Desa Sukma atau nomor telepon: (021) 1234567.</p>',
                'kategori' => 'pengumuman',
                'gambar' => null,
                'tanggal' => Carbon::parse('2024-11-19'),
                'is_active' => true,
                'urutan' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) 2025',
                'slug' => 'musyawarah-perencanaan-pembangunan-desa-musrenbangdes-2025',
                'excerpt' => 'Partisipasi aktif masyarakat dalam merencanakan pembangunan desa tahun 2025 melalui Musrenbangdes.',
                'konten' => '<p>Pemerintah Desa Sukma akan menyelenggarakan Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) untuk merencanakan program pembangunan tahun 2025.</p>

                <p><strong>Jadwal Acara:</strong></p>
                <p><strong>Tanggal:</strong> 28 November 2024<br>
                <strong>Waktu:</strong> 09:00 - Selesai<br>
                <strong>Tempat:</strong> Aula Kantor Desa Sukma</p>

                <p><strong>Tema Musrenbangdes 2025:</strong><br>
                "Peningkatan Kualitas Infrastruktur dan Pemberdayaan Masyarakat untuk Desa Sukma yang Lebih Baik"</p>

                <p><strong>Ajuan Pembangunan yang akan dibahas:</strong></p>
                <ul>
                    <li>Peningkatan jalan desa sepanjang 2 km</li>
                    <li>Pembangunan drainase di kawasan pemukiman</li>
                    <li>Program pemberdayaan UMKM desa</li>
                    <li>Pengembangan wisata desa</li>
                    <li>Peningkatan fasilitas pendidikan PAUD</li>
                </ul>

                <p>Seluruh warga Desa Sukma diundang untuk hadir dan memberikan masukan serta usulan program pembangunan yang dianggap penting bagi kemajuan desa. Partisipasi aktif masyarakat adalah kunci keberhasilan pembangunan desa.</p>

                <p>Demikian pengumuman ini, atas perhatian dan partisipasinya diucapkan terima kasih.</p>',
                'kategori' => 'agenda',
                'gambar' => null,
                'tanggal' => Carbon::parse('2024-11-18'),
                'is_active' => true,
                'urutan' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Gerakan Literasi Desa: "Ayo Membaca untuk Masa Depan"',
                'slug' => 'gerakan-literasi-desa-ayo-membaca-untuk-masa-depan',
                'excerpt' => 'Desa Sukma meluncurkan program literasi untuk meningkatkan minat baca masyarakat terutama anak-anak dan remaja.',
                'konten' => '<p>Pemerintah Desa Sukma bekerja sama dengan Perpustakaan Daerah meluncurkan program "Gerakan Literasi Desa: Ayo Membaca untuk Masa Depan". Program ini bertujuan untuk meningkatkan minat baca masyarakat Desa Sukma.</p>

                <p><strong>Kegiatan dalam Program:</strong></p>
                <ul>
                    <li>Safari literasi ke sekolah-sekolah desa</li>
                    <li>Lomba menulis cerita pendek untuk pelajar</li>
                    <li>Bedah buku setiap bulan</li>
                    <li>Program tukar buku antar warga</li>
                    <li>Pelatihan menulis kreatif</li>
                </ul>

                <p><strong>Jadwal Kegiatan:</strong></p>
                <ul>
                    <li><em>Senin:</em> Safari literasi di SDN 1 Sukma</li>
                    <li><em>Rabu:</em> Bedah buku di perpustakaan desa</li>
                    <li><em>Jumat:</em> Tukar buku di halaman kantor desa</li>
                    <li><em>Sabtu:</em> Pelatihan menaja untuk remaja</li>
                </ul>

                <p>Kepala Desa Sukma menyampaikan bahwa literasi adalah investasi jangka panjang untuk masa depan anak-anak. "Melalui membaca, kita membuka jendela dunia dan mempersiapkan generasi yang lebih baik," ujarnya.</p>

                <p>Program ini juga didukung oleh sumbangan buku dari berbagai pihak yang peduli dengan pendidikan di Desa Sukma. Mari bersama-sama menciptakan budaya membaca di desa kita tercinta!</p>',
                'kategori' => 'kegiatan',
                'gambar' => null,
                'tanggal' => Carbon::parse('2024-11-17'),
                'is_active' => true,
                'urutan' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Penting! Penertiban Administrasi Kependudukan Desa Sukma',
                'slug' => 'penting-penertiban-administrasi-kependudukan-desa-sukma',
                'excerpt' => 'Pemerintah desa akan melakukan penertiban data kependudukan. Warga diimbau untuk melengkapi dokumen kependudukan.',
                'konten' => '<p><strong>PEMBERITAHUAN PENTING</strong></p>

                <p>Berdasarkan instruksi dari Dinas Kependudukan dan Pencatatan Sipil Kabupaten, Pemerintah Desa Sukma akan melakukan penertiban administrasi kependudukan secara menyeluruh.</p>

                <p><strong>Dokumen yang harus dilengkapi:</strong></p>
                <ul>
                    <li>Kartu Keluarga (KK) yang masih berlaku</li>
                    <li>KTP Elektronik untuk warga yang sudah 17 tahun</li>
                    <li>Akta Kelahiran untuk anak-anak</li>
                    <li>Akta Nikah/Kawin/Cerai untuk yang sudah menikah</li>
                    <li>Kartu Identitas Anak (KIA) untuk anak di bawah 17 tahun</li>
                </ul>

                <p><strong>Jadwal Pelayanan:</strong></p>
                <p><strong>Tanggal:</strong> 1-15 Desember 2024<br>
                <strong>Waktu:</strong> Senin - Sabtu, 08:00 - 14:00 WITA<br>
                <strong>Tempat:</strong> Kantor Desa Sukma</p>

                <p><strong>Persyaratan:</strong></p>
                <ol>
                    <li>Membawa fotokopi dokumen kependudukan yang ada</li>
                    <li>Membawa pas foto 3x4 (2 lembar) berwarna</li>
                    <li>Membawa surat keterangan dari RT/RW (jika diperlukan)</li>
                    <li>Melengkapi formulir yang tersedia di kantor desa</li>
                </ol>

                <p><em>Demikian pemberitahuan ini. Kepada seluruh warga Desa Sukma diharapkan dapat memanfaatkan pelayanan ini dengan baik. Data kependudukan yang lengkap akan memudahkan akses pelayanan publik lainnya.</em></p>

                <p>Informasi lebih lanjut hubungi Sekretariat Desa Sukma.</p>',
                'kategori' => 'penting',
                'gambar' => null,
                'tanggal' => Carbon::parse('2024-11-16'),
                'is_active' => true,
                'urutan' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Panen Raya Padi Organik Desa Sukma: Hasil Memuaskan!',
                'slug' => 'panen-raya-padi-organik-desa-sukma-hasil-memuaskan',
                'excerpt' => 'Petani Desa Sukma merayakan panen raya padi organik dengan hasil yang melampaui target tahun ini.',
                'konten' => '<p>Suasana kegembiraan menyelimuti Desa Sukka saat para petani merayakan panen raya padi organik. Hasil panen tahun ini melampaui target dengan produktivitas mencapai 7,5 ton per hektar.</p>

                <p>Kepala Desa Sukma, Bapak H. Ahmad Wijaya, menyampaikan rasa syukurnya atas keberhasilan ini. "Ini adalah bukti bahwa pertanian organik yang kita kembangkan selama ini memang memberikan hasil yang maksimal," ujarnya saat memimpin panen raya.</p>

                <p><strong>Kebun Padi Organik Desa Sukma:</strong></p>
                <ul>
                    <li>Luas area: 50 hektar</li>
                    <li>Jumlah petani: 75 orang</li>
                    <li>Produktivitas: 7,5 ton/hektar (target 6,5 ton/hektar)</li>
                    <li>Kualitas beras: Premium Grade</li>
                </ul>

                <p>Berbeda dengan pertanian konvensional, padi organik Desa Sukma dibudidayakan tanpa pestisida kimia. Sebagai gantinya, petani menggunakan:</p>
                <ul>
                    <li>Pupuk kompos dari limbah pertanian</li>
                    <li>Pestisida nabati dari tanaman lokal</li>
                    <li>Sistem irigasi tetes yang efisien</li>
                    <li>Tanaman pagar sebagai pengendali hama alami</li>
                </ul>

                <p>Selain hasil yang memuaskan, harga jual padi organik juga lebih tinggi 25% dibandingkan padi konvensional. "Ini membantu meningkatkan kesejahteraan petani kita," tambah Kepala Desa.</p>

                <p>Produk beras organik Desa Sukma sudah dipasarkan ke beberapa kota besar dan mendapat sertifikat organik dari Badan Pertanian Nasional. Rencananya, tahun depan akan ada ekspansi ke area seluas 20 hektar lagi.</p>',
                'kategori' => 'berita',
                'gambar' => null,
                'tanggal' => Carbon::parse('2024-11-15'),
                'is_active' => true,
                'urutan' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data berita
        foreach ($beritas as $berita) {
            DB::table('beritas')->insert($berita);
        }

        $this->command->info('✅ Data berita sample berhasil disimpan!');
    }
}