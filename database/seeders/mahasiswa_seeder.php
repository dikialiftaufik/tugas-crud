<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mahasiswa_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'NIM' => '003',
            'Nama' => 'Ega Fiandra',
            'Email' => 'ega@gmail.com',
            'prodi' => 'Sistem Informasi'
        ]);
    }
}
