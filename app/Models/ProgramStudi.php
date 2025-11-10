<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $fillable = ['nama_program_studi', 'kode_prodi', 'fakultas_id'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class);
    }
}
