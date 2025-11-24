<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'role' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        // Dosen
        User::updateOrCreate(
            ['email' => 'dosen@example.com'],
            [
                'name' => 'Dosen',
                'role' => 'Dosen',
                'password' => Hash::make('dosen123'),
            ]
        );

        // Mahasiswa
        User::updateOrCreate(
            ['email' => 'mahasiswa@example.com'],
            [
                'name' => 'Mahasiswa',
                'role' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
            ]
        );

        // Mahasiswa
        User::updateOrCreate(
            ['email' => 'spranowo@example.com'],
            [
                'name' => 'Puji Zulaika Ismail',
                'role' => 'Mahasiswa',
                'password' => Hash::make('mahasiswa123'),
            ]
        );

        // $this->call([
        //     ProdiSeeder::class, 
        //     DosenSeeder::class,
        //     MataKuliahSeeder::class, 
        //     FakultasSeeder::class, 
        //     PerpustakaanSeeder::class, 
        // ]);
    }
}