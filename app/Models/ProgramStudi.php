<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';
    protected $fillable = ['nama_program_studi', 'kode_prodi', 'fakultas_id'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class);
    }
}
