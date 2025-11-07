<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mahasiswa;    // <-- IMPORT MODEL
use App\Models\MataKuliah;  // <-- IMPORT MODEL

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // PERUBAHAN:
            // Ini akan secara otomatis membuat Mahasiswa baru 
            // dan mengambil NIM-nya untuk diisi di sini.
            'NIM' => Mahasiswa::factory(), 

            // Ini akan mengambil id_mk acak dari MataKuliah yang sudah ada
            // (diasumsikan MataKuliahSeeder sudah berjalan)
            'id_mk' => function () {
                return MataKuliah::inRandomOrder()->first()->id_mk;
            },

            'nilai' => $this->faker->randomFloat(2, 50, 100), // Nilai 50-100
            'berkas' => null,
        ];
    }
}