<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data berdasarkan https://smb.telkomuniversity.ac.id/program/ (Kampus Bandung)

        // Fakultas Teknik Elektro (FTE)
        Prodi::create(['nama_prodi' => 'S1 Teknik Telekomunikasi', 'fakultas' => 'Fakultas Teknik Elektro']);
        Prodi::create(['nama_prodi' => 'S1 Teknik Elektro', 'fakultas' => 'Fakultas Teknik Elektro']);
        Prodi::create(['nama_prodi' => 'S1 Teknik Komputer', 'fakultas' => 'Fakultas Teknik Elektro']);
        Prodi::create(['nama_prodi' => 'S1 Teknik Biomedis', 'fakultas' => 'Fakultas Teknik Elektro']);
        Prodi::create(['nama_prodi' => 'S1 Smart Science & Technology', 'fakultas' => 'Fakultas Teknik Elektro']);

        // Fakultas Rekayasa Industri (FRI)
        Prodi::create(['nama_prodi' => 'S1 Teknik Industri', 'fakultas' => 'Fakultas Rekayasa Industri']);
        Prodi::create(['nama_prodi' => 'S1 Sistem Informasi', 'fakultas' => 'Fakultas Rekayasa Industri']);
        Prodi::create(['nama_prodi' => 'S1 Digital Supply Chain', 'fakultas' => 'Fakultas Rekayasa Industri']);
        Prodi::create(['nama_prodi' => 'S1 Manajemen Rekayasa Industri', 'fakultas' => 'Fakultas Rekayasa Industri']);
        Prodi::create(['nama_prodi' => 'S1 Teknologi Pangan', 'fakultas' => 'Fakultas Rekayasa Industri']);

        // Fakultas Informatika (FIF)
        Prodi::create(['nama_prodi' => 'S1 Informatika', 'fakultas' => 'Fakultas Informatika']);
        Prodi::create(['nama_prodi' => 'S1 Rekayasa Perangkat Lunak', 'fakultas' => 'Fakultas Informatika']);
        Prodi::create(['nama_prodi' => 'S1 Teknologi Informasi', 'fakultas' => 'Fakultas Informatika']);
        Prodi::create(['nama_prodi' => 'S1 Sains Data', 'fakultas' => 'Fakultas Informatika']);

        // Fakultas Ekonomi dan Bisnis (FEB)
        Prodi::create(['nama_prodi' => 'S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)', 'fakultas' => 'Fakultas Ekonomi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Akuntansi', 'fakultas' => 'Fakultas Ekonomi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Bisnis Digital', 'fakultas' => 'Fakultas Ekonomi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Manajemen Bisnis Syariah', 'fakultas' => 'Fakultas Ekonomi dan Bisnis']);

        // Fakultas Komunikasi dan Bisnis (FKB)
        Prodi::create(['nama_prodi' => 'S1 Ilmu Komunikasi', 'fakultas' => 'Fakultas Komunikasi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Administrasi Bisnis', 'fakultas' => 'Fakultas Komunikasi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Hubungan Masyarakat', 'fakultas' => 'Fakultas Komunikasi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Komunikasi Bisnis Digital', 'fakultas' => 'Fakultas Komunikasi dan Bisnis']);
        Prodi::create(['nama_prodi' => 'S1 Psikologi', 'fakultas' => 'Fakultas Komunikasi dan Bisnis']);

        // Fakultas Industri Kreatif (FIK)
        Prodi::create(['nama_prodi' => 'S1 Desain Komunikasi Visual', 'fakultas' => 'Fakultas Industri Kreatif']);
        Prodi::create(['nama_prodi' => 'S1 Desain Interior', 'fakultas' => 'Fakultas Industri Kreatif']);
        Prodi::create(['nama_prodi' => 'S1 Desain Produk & Inovasi', 'fakultas' => 'Fakultas Industri Kreatif']);
        Prodi::create(['nama_prodi' => 'S1 Kriya (Fashion & Textile Design)', 'fakultas' => 'Fakultas Industri Kreatif']);
        Prodi::create(['nama_prodi' => 'S1 Creative Arts (Seni Rupa)', 'fakultas' => 'Fakultas Industri Kreatif']);
        Prodi::create(['nama_prodi' => 'S1 Film dan Animasi', 'fakultas' => 'Fakultas Industri Kreatif']);

        // Fakultas Ilmu Terapan (FIT)
        Prodi::create(['nama_prodi' => 'D3 Teknik Telekomunikasi', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Teknik Informatika', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Sistem Informasi', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Teknik Komputer', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Digital Accounting (SIA)', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Hospitality & Culinary Art', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'D3 Digital Marketing', 'fakultas' => 'Fakultas Ilmu Terapan']);
        Prodi::create(['nama_prodi' => 'S1 Terapan Digital Creative Multimedia', 'fakultas' => 'Fakultas Ilmu Terapan']);
    }
}