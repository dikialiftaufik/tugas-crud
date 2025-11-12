<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perpustakaan;
use App\Models\Buku;

class PerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perpustakaan::factory()
            ->count(5)
            ->has(Buku::factory()->count(5), 'buku')
            ->create();
    }
}
