<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Fakultas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramStudi>
 */
class ProgramStudiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_program_studi' => $this->faker->jobTitle(),
            'kode_prodi' => strtoupper($this->faker->bothify('PRD###')),
            'fakultas_id' => Fakultas::factory(),
        ];
    }
}
