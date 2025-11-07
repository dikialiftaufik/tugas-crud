<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;
use App\Models\Dosen; // Import model Dosen

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua NIP dosen yang ada untuk di-assign ke mata kuliah
        // Pastikan DosenSeeder sudah dijalankan sebelumnya
        $dosens = Dosen::pluck('NIP')->all();

        // Jika tidak ada dosen, tampilkan peringatan dan hentikan seeder
        if (empty($dosens)) {
            $this->command->warn('Tidak ada data dosen ditemukan. Harap jalankan DosenSeeder terlebih dahulu.');
            return;
        }

        $mataKuliahData = [
            // Fakultas Informatika
            ['id_mk' => 'IF101', 'nama_mk' => 'Dasar Pemrograman', 'sks' => 4, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'IF102', 'nama_mk' => 'Struktur Data', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'IF201', 'nama_mk' => 'Basis Data', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'IF202', 'nama_mk' => 'Pemrograman Berorientasi Objek', 'sks' => 4, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'IF301', 'nama_mk' => 'Kecerdasan Buatan', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            
            // Fakultas Rekayasa Industri
            ['id_mk' => 'TI101', 'nama_mk' => 'Pengantar Teknik Industri', 'sks' => 2, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'TI201', 'nama_mk' => 'Statistika Industri', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'SI101', 'nama_mk' => 'Algoritma & Pemrograman', 'sks' => 4, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'SI201', 'nama_mk' => 'Analisis & Perancangan Sistem', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],

            // Fakultas Teknik Elektro
            ['id_mk' => 'TT101', 'nama_mk' => 'Dasar Teknik Elektro', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'TT201', 'nama_mk' => 'Sistem Komunikasi', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'TK101', 'nama_mk' => 'Sistem Digital', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],

            // Fakultas Ekonomi dan Bisnis
            ['id_mk' => 'EB101', 'nama_mk' => 'Pengantar Bisnis', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            ['id_mk' => 'AK101', 'nama_mk' => 'Pengantar Akuntansi', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],

            // Fakultas Industri Kreatif
            ['id_mk' => 'DKV101', 'nama_mk' => 'Dasar Desain', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
            
            // Fakultas Komunikasi dan Bisnis
            ['id_mk' => 'IK101', 'nama_mk' => 'Teori Komunikasi', 'sks' => 3, 'NIP' => $dosens[array_rand($dosens)]],
        ];

        // Masukkan data ke database
        foreach ($mataKuliahData as $mk) {
            MataKuliah::create($mk);
        }
    }
}